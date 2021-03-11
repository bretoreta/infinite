<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use App\Notifications\LikedTweetNotification;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {

        $tweets = $user->tweets()
                        ->with(['user', 'media'])
                        ->withCount(['likes as likes'])
                        ->withCount(['likes as liked'=> function($q){
                            $q->where('user_id', auth()->id());
                            }
                        ])
                        ->withCasts(['liked' => 'boolean'])
                        ->latest()
                        ->paginate();

        if($request->wantsJson())
        {
            return $tweets;
        }
        return Inertia::render('Tweets/Index', [
            'person' => $user,
            'tweets' => $tweets,
        ]);
    }

    public function toggle(Tweet $tweet)
    {
        $result = $tweet->likes()->toggle(auth()->user());

        if(count($result['attached']))
        {
            if(! ($tweet->user->id == auth()->id()))
            {
                $tweet->user->notify(new LikedTweetNotification($tweet, auth()->user()));
            }
        }

        return redirect()->back();
    }

    public function followings(Request $request, User $user)
    {
        $followings =  $user->followings()
                            ->withCount([
                                'followers as following' => function($q)
                                            {
                                                return $q->where('follower_id', auth()->id());
                                            }
                            ])
                            ->withCasts(['following' => 'boolean'])
                            ->paginate();

        if($request->wantsJson())
        {
            return $followings;
        }

        return Inertia::render('Follow/Following',[
            'followings' => $followings,
            'profile' => [
                'user' => $user,
            ],
        ]);
    }

    public function followers(Request $request, User $user)
    {
        $followers = $user->followers()
                        ->withCount([
                            'followers as following' => function($q)
                                        {
                                            return $q->where('follower_id', auth()->id());
                                        }
                        ])
                        ->withCasts(['following' => 'boolean'])
                        ->paginate();

        if($request->wantsJson())
        {
            return $followers;
        }

        return Inertia::render('Follow/Followers',[
            'followers' => $followers,
            'profile' => [
                'user' => $user,
            ],
        ]);
    }

    public function follow(User $user, $id)
    {
        $user->followings()->attach($id);

        return redirect()->back();
    }

    public function unfollow(User $user, $id)
    {
        $user->followings()->detach($id);

        return redirect()->back();
    }
}
