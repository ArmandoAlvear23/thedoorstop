<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Show all messages
    public function index() {
        return view('messages.index', [
            'messages' => Message::latest()->filter(request(['search']))->paginate(25),
            'search' => request(['search'])
        ]);
    }

    //Store message
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'message' => 'required',
            'phone' => ''
        ]);

        Message::create($formFields);

        return redirect('/')->with('message', 'Message sent successfully!');
    }

}
