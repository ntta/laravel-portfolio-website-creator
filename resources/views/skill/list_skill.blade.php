@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Skills</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-trophy"></i> Skill <a class="btn btn-primary btn-sm" href="skill/add">Add more</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='skill' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Published list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='skill' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unpublished list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('skill')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>

    <table class='table' id='skill'>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Percent (%)</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        </tr>
      @foreach($ls_skill as $key => $skill)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$skill->name}}</td>
            <td>{{$skill->percent}}</td>
            <td><a href="skill/edit/{{$skill->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="skill/delete/{{$skill->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
            <td><a href="skill/change-use/{{$skill->id}}" class="btn {{($skill->is_using == 1) ? 'btn-success' : 'btn-danger'}}">{{($skill->is_using == 1) ? 'Published' : 'Unpublished'}}</a></td>
        </tr>
        
        @endforeach
    </table>
    {{$ls_skill->appends(['sort_by'=> $sort_by])->links()}}
</div>
      
    </div>



  </div>
</div>
@endsection