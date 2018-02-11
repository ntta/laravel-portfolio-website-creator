<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class QualificationController extends Controller
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
            $ls_qualification = \App\Qualification::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_qualification = \App\Qualification::where('user_id','=',Auth::user()->id)->paginate(5);
        }


        return view('qualification.list_qualification')->with('ls_qualification', $ls_qualification)->with('sort_by',$sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualification.add_qualification');
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
            'course' => 'Required|max:191',
            'place' => 'Required|max:191',
            'time_begin' => 'Required|date'
        ]);

        $course = $request->input('course');
        $place = $request->input('place');
        $time_begin = date('M Y', strtotime($request->input('time_begin')));

        if ($request->input('time_end') != '') {
            $time_end = date('M Y', strtotime($request->input('time_end')));
        } else {
            $time_end = '';
        }
        $is_using = $request->input('is_using');
        
        $new_qualification = new \App\Qualification();
        $new_qualification->course = $course;
        $new_qualification->place = $place;
        $new_qualification->time_begin = $time_begin;
        $new_qualification->time_end = $time_end;
        $new_qualification->user_id = Auth::user()->id;
        $new_qualification->is_using = ($is_using == 1) ? 1 : 0;
        $new_qualification->save();
        
        $request->session()->flash("success_msg", "Successful add a qualification.");
        return redirect("/home/qualification");
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
        $qualification = \App\Qualification::find($id);
        
        return view('qualification.edit_qualification')->with('qualification', $qualification);
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
            'course' => 'Required|max:191',
            'place' => 'Required|max:191',
            'time_begin' => 'Required|date'
        ]);

        $course = $request->input('course');
        $place = $request->input('place');
        $time_begin = date('M Y', strtotime($request->input('time_begin')));
        if ($request->input('time_end') != '') {
            $time_end = date('M Y', strtotime($request->input('time_end')));
        } else {
            $time_end = '';
        }
        $is_using = $request->input('is_using');
        
        $new_qualification = \App\Qualification::find($id);
        $new_qualification->course = $course;
        $new_qualification->place = $place;
        $new_qualification->time_begin = $time_begin;
        $new_qualification->time_end = $time_end;
        $new_qualification->user_id = Auth::user()->id;
        $new_qualification->is_using = ($is_using == 1) ? 1 : 0;
        $new_qualification->save();
        
        $request->session()->flash("success_msg", "Successful change a qualification.");
        return redirect("/home/qualification");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualification = \App\Qualification::find($id);
        $qualification->delete();

        Session::flash("success_msg", "Successful delete a qualification");

        return back();
    }

    public function change($id) {
        $qualification = \App\Qualification::find($id);
        $qualification->is_using = ($qualification->is_using == 1) ? 0 : 1;
        $qualification->save();

        Session::flash("success_msg", "Successful change the state of a qualification");

        return back();
    }
}
