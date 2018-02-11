@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('job')}}">Jobs</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>

    <h1>Edit a job <a href="{{route('job')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="../edit-done/{{$job->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th>Position name<sup>*</sup></th>
          <td>
            <input class="form-control" id="position" name="position" type="text" value="{{$job->position}}">
            
          </td>
        </tr>
        <tr>
          <th>Place<sup>*</sup></th>
          <td>
            <input class="form-control" id="place" name="place" type="text" value="{{$job->place}}">
          </td>
        </tr>
        <tr>
          <th>Begin time<sup>*</sup></th>
          <td>
            <input class="form-control" id="time_begin" name="time_begin" type="month" value="{{date('Y-m', strtotime($job->time_begin))}}">
            
          </td>
        </tr>
        <tr>
          <th>End time</th>
          <td>
            <input class="form-control" id="time_end" name="time_end" type="month" value="{{($job->time_end == '') ? $job->time_end : date('Y-m', strtotime($job->time_end))}}">
            
          </td>
        </tr> 
        <tr>
          <th><div class="form-check"><label class="form-check-label"><input type="checkbox" name="is_using" value="1" {{($job->is_using == 1) ? 'checked' : ''}}> Publish to your page</label></div></th>
        </tr>     
      </table>
      
      <button type="submit" class="btn btn-info">Apply changes</button>
      </form>

    </div>


@endsection