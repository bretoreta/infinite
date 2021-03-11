<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tweets = Tweet::where(function ($q){
                        $q->where('user_id', auth()->id())
                            ->orWhereIn('user_id', auth()->user()->followings->pluck('id'));
                    })
                    ->withCount([
                        'likes as likes',
                        'likes as liked' => function($b){
                            $b->where('user_id', auth()->id());
                        }
                    ])
                    ->withCasts(['liked' => 'boolean'])
                    ->with(['user', 'media'])
                    ->latest()
                    ->paginate();

        if($request->wantsJson())
        {
            return $tweets;
        }
        return Inertia::render('Dashboard', [
            'tweets' => $tweets,
            'profile' => [
                'user' => $request->user(),
            ]
        ]);
    }

    public function notifications(Request $request)
    {
        $notifications = auth()->user()->notifications()->latest()->paginate();
        auth()->user()->unreadNotifications->markAsRead();

        if($request->wantsJson())
        {
            return $notifications;
        }
        
        return Inertia::render('Notifications',[
            'notifications' => $notifications,
        ]);
    }

    public function hydrate(Request $request)
    {
        $request->validate([
            'content' => ['required', 'max:270'],
            'mediaIds.*' => [
                Rule::exists('media', 'id')->where(function($q) use ($request){
                  $q->where('user_id', $request->user()->id);  
                })
            ]
        ]);

        $tweet = Tweet::create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        Media::find($request->mediaIds)->each->update([
            'model_id' => $tweet->id,
            'model_type' => Tweet::class,
        ]);

        return redirect()->back();
    }
}
