@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Tags</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-tags"></i> Tag <a class="btn btn-primary btn-sm" href="tag/add">Add more</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <table class='table' id='tag'>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Number of Posts</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($ls_tag as $key => $tag)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$tag->name}}</td>
            <td>{{$tag->number_of_posts}}</td>
            <td><a href="tag/edit/{{$tag->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="tag/delete/{{$tag->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
        </tr>
        
        @endforeach

    </table>
    {{$ls_tag->links()}}
</div>
      
    </div>
  </div>
</div>
@endsection