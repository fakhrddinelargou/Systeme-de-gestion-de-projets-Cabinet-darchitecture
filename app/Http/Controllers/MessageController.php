<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $contact = User::where('id', '!=', $user->id)
            ->when($user->role_id == 3, function ($query) {
                return $query->where('role_id', 1);
            })
            ->when($user->role_id == 2, function ($query) {
                return $query->whereIn('role_id', [1, 2]);
            })
            ->get();


        $direction = 'chat.message';
        $body = 'chat.empty';
        return view('layout.app', compact('direction', 'contact', 'body'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function openChat(string $id)
    {
        $user = auth()->user();
        $contact = User::where('id', '!=', $user->id)
            ->when($user->role_id == 3, function ($query) {
                return $query->where('role_id', 1);
            })
            ->when($user->role_id == 2, function ($query) {
                return $query->whereIn('role_id', [1, 2]);
            })
            ->get();


        $ids = [$user->id, $id];

        $messages = Message::whereIn('sender_id', $ids)
            ->whereIn('receiver_id', $ids)
            ->orderBy('created_at', 'asc')
            ->get();

        $receiver = DB::table('users')
            ->where('id', $id)
            ->select('fullname', 'id')
            ->first();

        $chat = [
            'messages' => $messages,
            'receiver' => $receiver->fullname,
            'receiver_id' => $receiver->id
        ];

        $direction = 'chat.message';
        $body = 'chat.body';
        return view('layout.app', compact('direction', 'contact', 'body', 'chat'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'body' => 'required|min:1',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        broadcast(new MessageSent($message))->toOthers;

        return response()->json($message);
    }
}
