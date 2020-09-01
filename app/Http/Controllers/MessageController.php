<?php


namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        return view('message.index');

    }

    public function post(Request $request)
    {
        $validatedArr = $this->validate($request,[
            'name' => 'required|max:25',
            'content' => 'required|string|max:500',
        ]);
        $message = new Message();
        $message->name = $validatedArr['name'];
        $message->content = $validatedArr['content'];
        $message->save();
        return redirect("/message")->with('message', '留言成功');
    }

}