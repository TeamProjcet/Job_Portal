<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Supports\Helper;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    use Helper;
    public function __construct()
    {
        $this->model = new Messages();
    }
    public function index($senderId, $receiverId)
    {
        $messages = $this->model->where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->orderBy('sent_at', 'asc')->get();

        return response()->json($messages);
    }

    public function create()
    {
        // Code for showing the form to create a new message
    }
    public function markAsRead($messageId)
    {
        $message =$this->model->findOrFail($messageId);
        $message->update(['read_at' => now()]);

        return response()->json($message);
    }
    public function store(Request $request)
    {
        // Code for storing a newly created message
    }

    public function show(Messages $messages)
    {
        // Code for displaying a specific message
    }

    public function edit(Messages $messages)
    {
        // Code for showing the form to edit a specific message
    }

    public function update(Request $request, Messages $messages)
    {
        // Code for updating a specific message
    }

    public function destroy(Messages $messages)
    {
        // Code for deleting a specific message
    }
}
