@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">General Information</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-address-book"></i> General Information <a class="btn btn-primary btn-sm" href="general-information/edit">Change</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
      <div class="alert alert-info">{{session('success_msg')}} </div>
      @endif
      <div class="row" style="padding-bottom: 20px;">
        <div class="col-lg-4 col-md-4" style="text-align: center;">
          <p>Your personal photo</p>
          <img src="../{{$general_information->img}}" style="width: 200px;">
        </div>
        <div class="col-lg-8 col-md-8" style="text-align: center;">
          <p>Your personal banner</p>
          <img src="../{{$general_information->banner}}" style="width: 500px;">
        </div>
      </div>
      <table class='table'>
        <tr>
          <th><i class="fa fa-user-o" aria-hidden="true"></i> Fullname</th>
          <td>{{$general_information->name}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-briefcase" aria-hidden="true"></i> Job</th>
          <td>{{$general_information->job}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-calendar" aria-hidden="true"></i> Date of Birth</th>
          <td>{{$general_information->dob}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-location-arrow" aria-hidden="true"></i> Address</th>
          <td>{{$general_information->address}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-phone" aria-hidden="true"></i> Phone No.</th>
          <td>{{$general_information->phone}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</th>
          <td>{{$general_information->email}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</th>
          <td>{{$general_information->facebook}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</th>
          <td>{{$general_information->twitter}}</td>
        </tr>
        <tr>
          <th><i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus</th>
          <td>{{$general_information->googleplus}}</td>
        </tr>
        
      </table>
      <table>
        <tr><th style="text-align: center;"> <h2><i class="fa fa-pencil" aria-hidden="true"></i> About you</h2></th></tr>
        <tr>
          <td>{!!$general_information->about!!}</td>
        </tr>
      </table>
    </div>



  </div>
</div>
@endsection