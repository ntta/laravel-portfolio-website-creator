<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class GeneralInformationController extends Controller
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
        $general_information = \App\GeneralInformation::where('user_id','=',Auth::user()->id)->first();
        return view('general-information.list_general-information')->with('general_information', $general_information);
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
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $general_information = \App\GeneralInformation::where('user_id','=',Auth::user()->id)->first();
        return view('general-information.edit_general-information')->with('general_information', $general_information);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'Required|max:191',
            'job' => 'Required',
            'dob' => 'Required',
            'address' => 'Required',
            'phone' => 'Required',
            'email' => 'Required'
        ]);
        
        $name = $request->input('name');
        $job = $request->input('job');
        $dob = $request->input('dob');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $googleplus = $request->input('googleplus');
        $about = $request->input('about');

        $general_information = \App\GeneralInformation::find(Auth::user()->id);
        $directory = public_path("images");

        $fileImg = $request->file('img');

        if ($general_information->img == null && $fileImg != null && $fileImg != '') {
            $imgName = 'img_'.Auth::user()->id.'.'.$fileImg->getClientOriginalExtension();
            $fileImg->move($directory, $imgName);
            $general_information->img = 'images/'.$imgName;
        } else if ($fileImg != null && $fileImg != '') {
            unlink(public_path($general_information->img));
            Storage::delete(public_path($general_information->img));
            $imgName = 'img_'.Auth::user()->id.'.'.$fileImg->getClientOriginalExtension();
            $fileImg->move($directory, $imgName);            
            $general_information->img = 'images/'.$imgName;
        } else {
            $general_information->img = $general_information->img;
        }

        $fileBanner = $request->file('banner');
        if ($general_information->banner == null && $fileBanner != null && $fileBanner != '') {
            $bannerName = 'banner_'.Auth::user()->id.'.'.$fileBanner->getClientOriginalExtension();
            $fileBanner->move($directory, $bannerName);
            $general_information->banner = 'images/'.$bannerName;
        } else if ($fileBanner != null && $fileBanner != '') {
            unlink(public_path($general_information->banner));
            Storage::delete(public_path($general_information->banner));
            $bannerName = 'banner_'.Auth::user()->id.'.'.$fileBanner->getClientOriginalExtension();
            $fileBanner->move($directory, $bannerName);        
            
            $general_information->banner = 'images/'.$bannerName;
        } else {
            $general_information->banner = $general_information->banner;
        }
        
        $general_information->name = $name;
        $general_information->job = $job;
        $general_information->dob = $dob;
        $general_information->address = $address;
        $general_information->phone = $phone;
        $general_information->email = $email;
        $general_information->facebook = $facebook;
        $general_information->twitter = $twitter;
        $general_information->googleplus = $googleplus;
        $general_information->about = $about;
        $general_information->save();
        
        $request->session()->flash("success_msg", "Successful information change");
        return redirect("/home/general-information");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editCustomCss()
    {
        return view('customcss');
    }
}
