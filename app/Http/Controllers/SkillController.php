<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
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
            $ls_skill = \App\Skill::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_skill = \App\Skill::where('user_id','=',Auth::user()->id)->paginate(5);
        }

        return view('skill.list_skill')->with('ls_skill', $ls_skill)->with('sort_by', $sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.add_skill');
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
            'percent' => 'Required|numeric|max:100|min:0'
        ]);

        $name = $request->input('name');
        $percent = $request->input('percent');
        $is_using = $request->input('is_using');
        
        $new_skill = new \App\Skill();
        $new_skill->name = $name;
        $new_skill->percent = $percent;
        $new_skill->user_id = Auth::user()->id;
        $new_skill->is_using = ($is_using == 1) ? 1 : 0;
        $new_skill->save();
        
        $request->session()->flash("success_msg", "Successful add a skill.");
        return redirect("/home/skill");
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
        $skill = \App\Skill::find($id);
        return view('skill.edit_skill')->with('skill', $skill);
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
            'percent' => 'Required'
        ]);

        $name = $request->input('name');
        $percent = $request->input('percent');
        $is_using = $request->input('is_using');
        

        $new_skill = \App\Skill::find($id);
        $new_skill->name = $name;
        $new_skill->percent = $percent;
        $new_skill->is_using = ($is_using == 1) ? 1 : 0;
        $new_skill->save();

        $request->session()->flash("success_msg", "Successful change a skill.");
        return redirect("/home/skill");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = \App\Skill::find($id);
        $skill->delete();

        Session::flash("success_msg", "Successful delete a skill");

        return back();
    }

    public function change($id) {
        $skill = \App\Skill::find($id);
        $skill->is_using = ($skill->is_using == 1) ? 0 : 1;
        $skill->save();

        Session::flash("success_msg", "Successful change the state of a skill");

        return back();
    }
}