<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index()
    {
        // $rooms = auth()->user()->rooms()->with('messages')->paginate();

        $rooms = ChatRoom::where('user_id', auth()->id())->orWhere('receiver_id', auth()->id())->with(['messages', 'owner', 'receiver'])->paginate();

        // dd($rooms);
        return Inertia::render('Messenger/Index', [
            'rooms' => $rooms,
        ]);
    }

    public function show(ChatRoom $chatroom)
    {
        $messages = $chatroom->messages()->with(['sender','receiver'])->orderBy('created_at', 'DESC')->paginate();
        $room = $chatroom->with(['owner','receiver'])->first();

        // dd($room);

        return Inertia::render('Messenger/Show', [
            'messages' => $messages,
            'room' => $room,
        ]);
    }

    public function store(ChatRoom $chatroom, Request $request)
    {
        if((auth()->id()) == ($chatroom->owner->id))
        {
            $receiver = $chatroom->receiver->id;
        }
        else
        {
            $receiver = $chatroom->owner->id;
        }

        $request->validate([
            'content' => ['required', 'max:255'],
        ]);

        $chatroom->messages()->create([
            'user_id' => auth()->id(),
            'receiver_id' => $receiver,
            'content' => $request->input('content'),
            'read_at' => null,
        ]);

        return redirect()->back();
    }

    public function users()
    {
        $users = User::all();

        return $users;
    }
}
