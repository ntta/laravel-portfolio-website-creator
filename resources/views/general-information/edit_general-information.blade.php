@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('general-information')}}">General Information</a></li>
  <li class="breadcrumb-item active">Change</li>
</ol>

    <h1>Change your general information <a href="{{route('general-information')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="edit-done" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th><i class="fa fa-id-badge" aria-hidden="true"></i> Profile photo</th>
          <td><input type="file" name="img" /></td>
        </tr>
        <tr>
          <th><i class="fa fa-vcard" aria-hidden="true"></i> Profile banner</th>
          <td><input type="file" name="banner" /></td>
        </tr>
        <tr>
          <th><i class="fa fa-user-o" aria-hidden="true"></i> Fullname<sup>*</sup></th>
          <td>
            <input class="form-control" id="name" name="name" type="text" value="{{$general_information->name}}">
            
          </td>
        </tr>
        <tr>
          <th><i class="fa fa-briefcase" aria-hidden="true"></i> Job<sup>*</sup></th>
          <td>
            <input class="form-control" id="job" name="job" type="text" value="{{$general_information->job}}">
          </td>
        </tr>
        <tr>
          <th><i class="fa fa-calendar" aria-hidden="true"></i> Date of Birth<sup>*</sup></th>
          <td>
            <input class="form-control" id="dob" name="dob" type="date" value="{{$general_information->dob}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-location-arrow" aria-hidden="true"></i> Address<sup>*</sup></th>
          <td>
            <input class="form-control" id="address" name="address" type="text" value="{{$general_information->address}}">
          </td>
        </tr>
        <tr>
          <th><i class="fa fa-phone" aria-hidden="true"></i> Phone No.<sup>*</sup></th>
          <td>
          <input class="form-control" id="phone" name="phone" type="text" value="{{$general_information->phone}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email<sup>*</sup></th>
          <td><input class="form-control" id="email" name="email" type="text" value="{{$general_information->email}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</th>
          <td><input class="form-control" id="facebook" name="facebook" type="text" value="{{$general_information->facebook}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</th>
          <td><input class="form-control" id="twitter" name="twitter" type="text" value="{{$general_information->twitter}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus</th>
          <td><input class="form-control" id="googleplus" name="googleplus" type="text" value="{{$general_information->googleplus}}"></td>
        </tr>
        <tr>
          <th><i class="fa fa-pencil" aria-hidden="true"></i> About you</th>
          <td><textarea cols="60" name='about'>{{$general_information->about}}</textarea></td>
        </tr>
      </table>
      <button type="submit" class="btn btn-primary"> Apply Changes</button>
      </form>

    </div>


@endsection