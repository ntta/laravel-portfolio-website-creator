<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_by = $request->input('sort_by');


        if ($sort_by != null && $sort_by != "") {
            $ls_message = \App\Message::where('user_id','=',Auth::user()->id)
                    ->where('read', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_message = \App\Message::where('user_id','=',Auth::user()->id)->paginate(5);
        }

        return view('message.list_message')->with('ls_message', $ls_message)->with('sort_by', $sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $msg = [
            'required' => 'Please enter your :attribute'           
        ];
        $this->validate($request, [
            'name' => 'Required|max:191',
            'email' => 'Required|email',
            'content' => 'Required'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $content = $request->input('content');
        
        $new_message = new \App\Message();
        $new_message->name = $name;
        $new_message->email = $email;
        $new_message->content = $content;
        $new_message->user_id = $id;
        $new_message->save();
        
        $request->session()->flash("success_msg", "Done! Thank for your message - You will get you an answer as fast as possible!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = \App\Message::find($id);
        $message->delete();

        Session::flash("success_msg", "Successful delete a message");

        return back();
    }

    public function change($id) {
        $message = \App\Message::find($id);
        $message->read = ($message->read == 1) ? 0 : 1;
        $message->save();

        Session::flash("success_msg", "Successful change the state of a message");

        return back();
    }
}
