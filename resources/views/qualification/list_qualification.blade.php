@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Qualifications</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-mortar-board"></i> Qualification <a class="btn btn-primary btn-sm" href="qualification/add">Add more</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='qualification' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Published list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='qualification' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unpublished list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('qualification')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>
    <table class='table' id='qualification'>
        <tr>
            <th>No.</th>
            <th>Course</th>
            <th>Place</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        </tr>

        @foreach($ls_qualification as $key => $qualification)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$qualification->course}}</td>
            <td>{{$qualification->place}}</td>
            <td>{{$qualification->time_begin}}</td>
            <td>{{$qualification->time_end}}</td>
            <td><a href="qualification/edit/{{$qualification->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="qualification/delete/{{$qualification->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
            <td><a href="qualification/change-use/{{$qualification->id}}" class="btn {{($qualification->is_using == 1) ? 'btn-success' : 'btn-danger'}}">{{($qualification->is_using == 1) ? 'Published' : 'Unpublished'}}</a></td>
        </tr>
        
        @endforeach
    </table>
    {{$ls_qualification->appends(['sort_by'=> $sort_by])->links()}}
</div>
      
    </div>



  </div>
</div>
@endsection