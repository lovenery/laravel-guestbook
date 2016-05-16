<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Message;
use App\Note;

class NotesController extends Controller
{
    public function store(Request $request, Message $message)
    {
        $message->notes()->create([
            'body' => $request->body
        ]);
        return back();
    }
}
