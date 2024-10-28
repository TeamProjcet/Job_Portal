<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Seeker;
use App\Models\User;
use App\Supports\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    use Helper;

//    public function index()
//    {
//        if (Auth::guard('seeker')->check()) {
//            $currentUserId = Auth::guard('seeker')->user()->id;
//            $currentUserType = 'App\Models\Seeker';
//        } else {
//            $currentUserId = Auth::id();
//            $currentUserType = 'App\Models\User';
//        }
//
//        $messages = Message::where(function ($query) use ($currentUserId, $currentUserType) {
//            $query->where('receiver_id', $currentUserId)
//                ->where('receiver_type', $currentUserType);
//        })
//            ->orWhere(function ($query) use ($currentUserId, $currentUserType) {
//                $query->where('sender_id', $currentUserId)
//                    ->where('sender_type', $currentUserType);
//            })
//            ->with(['sender', 'receiver'])
//            ->get();
//
//        return $this->returnData(2000,$messages);
//
//    }


    public function index()
    {
        $messages = Message::where('sender_type', 'App\Models\Seeker')
            ->with(['sender', 'receiver'])
            ->get();
        return $this->returnData(2000,$messages);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer',
            'message_content' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message_content' => $request->message_content,
            'sender_type' => 'App\Models\User',
            'receiver_type' => 'App\Models\Seeker',
        ]);

        return $this->returnData(2000,$message,'Message sent successfully!');
    }

    public function seekerstore(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer',
            'message_content' => 'required|string',
        ]);


        // Create message
        $message = Message::create([
            'sender_id' =>  Auth::guard('seeker')->user()->id,
            'receiver_id' => $request->receiver_id,
            'message_content' => $request->message_content,
            'sender_type' => 'App\Models\Seeker',
            'receiver_type' => 'App\Models\User',
        ]);

        return $this->returnData(2000,$message,'Message sent successfully!');

    }


    public function getMessagesByReceiver($receiverId)
    {
        $currentUserId = auth()->id();
        $currentUserType = 'App\Models\User';

        $messages = Message::where(function ($query) use ($receiverId, $currentUserId) {
            $query->where('sender_id', $currentUserId)
            ->where('receiver_id', $receiverId)
            ->where('sender_type', 'App\Models\User');
        })
            ->orWhere(function ($query) use ($receiverId, $currentUserId) {
                $query->where('sender_id', $receiverId)
                ->where('receiver_id', $currentUserId)
                ->where('sender_type', 'App\Models\Seeker');
            })
            ->with(['sender', 'receiver'])
            ->get();

        if ($messages->isEmpty()) {
            return response()->json(['result' => [], 'message' => 'No messages found'], 200);
        }

        return response()->json([
            'result' => $messages,
        ]);
    }


    public function show(Message $message)
    {
        //
    }


    public function edit(Message $message)
    {
        //
    }


    public function update(Request $request, Message $message)
    {
        //
    }


    public function destroy($id)
    {
        $message = Message::find($id);
        if ($message) {
            $message->delete();
            return response()->json(['message' => 'Message deleted successfully']);
        }
        return response()->json(['message' => 'Message not found'], 404);
    }
}
