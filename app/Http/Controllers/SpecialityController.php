<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class SpecialityController extends Controller
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
            $ls_speciality = \App\Speciality::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_speciality = \App\Speciality::where('user_id','=',Auth::user()->id)->paginate(5);
        }
        return view('speciality.list_speciality')->with('ls_speciality', $ls_speciality)->with('sort_by', $sort_by);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speciality.add_speciality');
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
            'title' => 'Required|max:191',
            'img' => 'Required'
        ]);

        $img = $request->input('img');
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $is_using = $request->input('is_using');
        
        $new_speciality = new \App\Speciality();
        $new_speciality->img = $img;
        $new_speciality->title = $title;
        $new_speciality->subtitle = $subtitle;
        $new_speciality->user_id = Auth::user()->id;
        $new_speciality->is_using = ($is_using == 1) ? 1 : 0;
        $new_speciality->save();
        
        $request->session()->flash("success_msg", "Successful add a speciality.");
        return redirect("/home/speciality");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_published()
    {
        $ls_speciality = \App\Speciality::where('user_id','=',Auth::user()->id)->orderBy('is_using','desc')->get();
        return view('speciality.list_speciality')->with('ls_speciality', $ls_speciality);
    }

    public function show_unpublished()
    {
        $ls_speciality = \App\Speciality::where('user_id','=',Auth::user()->id)->orderBy('is_using','asc')->get();
        return view('speciality.list_speciality')->with('ls_speciality', $ls_speciality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speciality = \App\Speciality::find($id);
        return view('speciality.edit_speciality')->with('speciality', $speciality);
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
            'title' => 'Required|max:191',
            'img' => 'Required'
        ]);

        $img = $request->input('img');
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $is_using = $request->input('is_using');
        
        $new_speciality = \App\Speciality::find($id);
        $new_speciality->img = $img;
        $new_speciality->title = $title;
        $new_speciality->subtitle = $subtitle;
        $new_speciality->is_using = ($is_using == 1) ? 1 : 0;
        $new_speciality->save();
        
        $request->session()->flash("success_msg", "Successful change a speciality.");
        return redirect("/home/speciality");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speciality = \App\Speciality::find($id);
        $speciality->delete();

        Session::flash("success_msg", "Successful delete a speciality");

        return back();
    }

    public function change($id)
    {
        $speciality = \App\Speciality::find($id);
        $speciality->is_using = ($speciality->is_using == 1) ? 0 : 1;
        $speciality->save();

        Session::flash("success_msg", "Successful change the state of a speciality");

        return back();
    }

    public function popupimage() {
        return view('list_image');
    }
}
