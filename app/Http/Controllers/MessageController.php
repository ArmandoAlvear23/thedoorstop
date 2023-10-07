<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Show all messages
    public function index() {
        return view('internal.messages.index', [
            'messages' => Message::latest()->filter(request(['search']))->paginate(25),
            'search' => request(['search'])
        ]);
    }

    // Show single message
    public function show(Message $message) {
        return view('internal.messages.show', [
            'message' => $message
        ]);
    }
}