<?php


namespace App\Http\Controllers;

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
        //todo 入库逻辑

        return redirect("/message")->with('message', 'Message sent!');
    }

}