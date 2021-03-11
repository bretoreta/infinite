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
}
