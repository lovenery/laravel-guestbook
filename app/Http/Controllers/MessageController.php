<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User; // 新增
use App\Message; // 新增
use App\Repositories\MessageRepository; // 新增

class MessageController extends Controller
{

    protected $messages;


    public function __construct()//MessageRepository $messages)
    {
       $this->middleware('auth');
       //$this->messages = $messages;
    }

    public function index(Request $request)
    {
        // 等同於$messages = Message::where('user_id', $request->user()->id)->get();
        //$messages = $request->user()->messages()->get();
        $messages = Message::all();
        return view('messages.index', [
            'messages' => $messages,
        ]);
        // 資源庫的寫法
//        return view('messages.index', [
//            'messages' => $this->messages->forUser($request->user()),
//        ]);


    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->messages()->create([
            'name' => $request->name,
        ]);

        return redirect('/messages');
    }
    public function destroy(Request $request, Message $message)
    {
        $this->authorize('destroy', $message);

        $message->delete();

        return redirect('/messages');
    }
    public function show(Message $message)//$id)
    {
        //$message = Message::find($id);
        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function edit(Message $message)
    {
        return view('messages.edit',compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $this->authorize('update', $message);

        $message->update([
            'name' => $request->name
        ]);
        
        return redirect('/messages');
    }
}
