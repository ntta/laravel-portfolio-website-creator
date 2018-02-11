@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Jobs</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-institution"></i> Job <a class="btn btn-primary btn-sm" href="job/add">Add more</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='job' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Published list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='job' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unpublished list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('job')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>
    <table class='table' id='job'>
        <tr>
            <th>No.</th>
            <th>Position</th>
            <th>Place</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        </tr>

        @foreach($ls_job as $key => $job)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$job->position}}</td>
            <td>{{$job->place}}</td>
            <td>{{$job->time_begin}}</td>
            <td>{{$job->time_end}}</td>
            <td><a href="job/edit/{{$job->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="job/delete/{{$job->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
            <td><a href="job/change-use/{{$job->id}}" class="btn {{($job->is_using == 1) ? 'btn-success' : 'btn-danger'}}">{{($job->is_using == 1) ? 'Published' : 'Unpublished'}}</a></td>
        </tr>
        
        @endforeach
    </table>
    {{$ls_job->appends(['sort_by'=> $sort_by])->links()}}
</div>
      
    </div>



  </div>
</div>
@endsection