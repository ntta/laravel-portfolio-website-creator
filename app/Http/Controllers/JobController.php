<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
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
            $ls_job = \App\Job::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_job = \App\Job::where('user_id','=',Auth::user()->id)->paginate(5);
        }


        return view('job.list_job')->with('ls_job', $ls_job)->with('sort_by',$sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.add_job');
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
            'position' => 'Required|max:191',
            'place' => 'Required|max:191',
            'time_begin' => 'Required|date'
        ]);

        $position = $request->input('position');
        $place = $request->input('place');
        $time_begin = date('M Y', strtotime($request->input('time_begin')));

        if ($request->input('time_end') != '') {
            $time_end = date('M Y', strtotime($request->input('time_end')));
        } else {
            $time_end = '';
        }
        $is_using = $request->input('is_using');
        
        $new_job = new \App\Job();
        $new_job->position = $position;
        $new_job->place = $place;
        $new_job->time_begin = $time_begin;
        $new_job->time_end = $time_end;
        $new_job->user_id = Auth::user()->id;
        $new_job->is_using = ($is_using == 1) ? 1 : 0;
        $new_job->save();
        
        $request->session()->flash("success_msg", "Successful add a job.");
        return redirect("/home/job");
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
        $job = \App\Job::find($id);
        return view('job.edit_job')->with('job', $job);
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
            'position' => 'Required|max:191',
            'place' => 'Required|max:191',
            'time_begin' => 'Required|date'
        ]);

        $position = $request->input('position');
        $place = $request->input('place');
        $time_begin = date('M Y', strtotime($request->input('time_begin')));
        if ($request->input('time_end') != '') {
            $time_end = date('M Y', strtotime($request->input('time_end')));
        } else {
            $time_end = '';
        }
        $is_using = $request->input('is_using');
        
        $new_job = \App\Job::find($id);
        $new_job->position = $position;
        $new_job->place = $place;
        $new_job->time_begin = $time_begin;
        $new_job->time_end = $time_end;
        $new_job->user_id = Auth::user()->id;
        $new_job->is_using = ($is_using == 1) ? 1 : 0;
        $new_job->save();
        
        $request->session()->flash("success_msg", "Successful change a job.");
        return redirect("/home/job");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = \App\Job::find($id);
        $job->delete();

        Session::flash("success_msg", "Successful delete a job");

        return back();
    }

    public function change($id) {
        $job = \App\Job::find($id);
        $job->is_using = ($job->is_using == 1) ? 0 : 1;
        $job->save();

        Session::flash("success_msg", "Successful change the state of a job");

        return back();
    }
}
