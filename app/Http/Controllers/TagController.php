<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
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
    public function index()
    {
        $ls_tag = \App\Tag::where('user_id','=',Auth::user()->id)->paginate(5);
        return view('tag.list_tag')->with('ls_tag', $ls_tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'Required|max:191'
        ]);

        $name = $request->input('name');

        $new_tag = new \App\Tag();
        $new_tag->name = $name;
        $new_tag->user_id = Auth::user()->id;
        $new_tag->save();
        
        $request->session()->flash("success_msg", "Successful add a tag.");
        return redirect("/home/tag");
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
        $tag = \App\Tag::find($id);
        $ls_postdetail = $tag->postdetail;
        return view('tag.edit_tag')->with('tag', $tag)->with('ls_postdetail',$ls_postdetail);
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
        $this->validate($request, [
            'name' => 'Required|max:191'
        ]);

        $name = $request->input('name');

        $new_tag = \App\Tag::find($id);
        $new_tag->name = $name;
        $new_tag->user_id = Auth::user()->id;
        $new_tag->save();
        
        $request->session()->flash("success_msg", "Successful change a tag.");
        return redirect("/home/tag");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = \App\Tag::find($id);
        $tag->delete();

        $postdetails = \App\PostDetail::where('user_id','=',Auth::user()->id)->where('tag_id', '=', $id)->get();

        foreach ($postdetails as $postdetail) {
            $postdetail->delete();
        }

        Session::flash("success_msg", "Successful delete a tag");

        return back();
    }
}
