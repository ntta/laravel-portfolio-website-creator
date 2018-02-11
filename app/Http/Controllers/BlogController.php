<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class BlogController extends Controller
{
    public function index($id)
    {
    	$user = $id;
    	$general_information = \App\GeneralInformation::where('user_id','=',$user)->first();
    	$ls_hobby = \App\Hobby::where('user_id','=',$user)->where('is_using', 1)->get();
    	$ls_job = \App\Job::where('user_id','=',$user)->where('is_using', 1)->get();
    	$ls_qualification = \App\Qualification::where('user_id','=',$user)->where('is_using', 1)->get();
    	$ls_skill = \App\Skill::where('user_id','=',$user)->where('is_using', 1)->get();
    	$ls_speciality = \App\Speciality::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_post = \App\Post::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_tag = \App\Tag::where('user_id','=',$user)->where('number_of_posts','>','0')->get();
        //dd($ls_tag);
        return view('welcome')->with('general_information', $general_information)
        ->with('ls_hobby',$ls_hobby)
        ->with('ls_job',$ls_job)
        ->with('ls_qualification',$ls_qualification)
        ->with('ls_skill',$ls_skill)
        ->with('ls_speciality',$ls_speciality)
        ->with('ls_post',$ls_post)
        ->with('ls_tag',$ls_tag);
    }

    public function show($id)
    {
        $post = \App\Post::find($id);
        return view('viewpost')->with('post',$post);
    }

    public function downloadCV($id)
    {
        $user = $id;
        $general_information = \App\GeneralInformation::where('user_id','=',$user)->first();
        $ls_hobby = \App\Hobby::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_job = \App\Job::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_qualification = \App\Qualification::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_skill = \App\Skill::where('user_id','=',$user)->where('is_using', 1)->get();
        $ls_speciality = \App\Speciality::where('user_id','=',$user)->where('is_using', 1)->get();
        $pdf = PDF::loadView('CV',compact('general_information','ls_hobby','ls_job','ls_qualification','ls_skill','ls_speciality'))->setPaper('a4','potrait');
        return $pdf->download('cv-'.$general_information->name.'.pdf');
        return view('CV')->with('general_information', $general_information)
        ->with('ls_hobby',$ls_hobby)
        ->with('ls_job',$ls_job)
        ->with('ls_qualification',$ls_qualification)
        ->with('ls_skill',$ls_skill)
        ->with('ls_speciality',$ls_speciality);
    }
}
