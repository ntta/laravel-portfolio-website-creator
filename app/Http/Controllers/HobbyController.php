<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class HobbyController extends Controller
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
            $ls_hobby = \App\Hobby::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_hobby = \App\Hobby::where('user_id','=',Auth::user()->id)->paginate(5);
        }

        return view('hobby.list_hobby')->with('ls_hobby', $ls_hobby)->with('sort_by', $sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.add_hobby');
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
            'name' => 'Required|max:191',
            'img' => 'Required'
        ]);

        $img = $request->input('img');
        $name = $request->input('name');
        $is_using = $request->input('is_using');
        
        $new_hobby = new \App\Hobby();
        $new_hobby->img = $img;
        $new_hobby->name = $name;
        $new_hobby->user_id = Auth::user()->id;
        $new_hobby->is_using = ($is_using == 1) ? 1 : 0;
        $new_hobby->save();
        
        $request->session()->flash("success_msg", "Successful add a hobby.");
        return redirect("/home/hobby");
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
        $hobby = \App\Hobby::find($id);
        return view('hobby.edit_hobby')->with('hobby', $hobby);
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
            'name' => 'Required|max:191',
            'img' => 'Required'
        ]);

        $img = $request->input('img');
        $name = $request->input('name');
        $is_using = $request->input('is_using');
        
        $new_hobby = \App\Hobby::find($id);
        $new_hobby->img = $img;
        $new_hobby->name = $name;
        $new_hobby->is_using = ($is_using == 1) ? 1 : 0;
        $new_hobby->save();
        
        $request->session()->flash("success_msg", "Successful change a hobby.");
        return redirect("/home/hobby");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobby = \App\Hobby::find($id);
        $hobby->delete();

        Session::flash("success_msg", "Successful delete a hobby");

        return redirect("/home/hobby");
    }

    public function change($id)
    {
        $hobby = \App\Hobby::find($id);
        $hobby->is_using = ($hobby->is_using == 1) ? 0 : 1;
        $hobby->save();

        Session::flash("success_msg", "Successful change the state of a hobby");

        return redirect("/home/hobby");
    }
}
