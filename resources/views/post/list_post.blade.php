@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Posts</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-file-text"></i> Post <a class="btn btn-primary btn-sm" href="post/add">Add more</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='post' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Published list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='post' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unpublished list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('post')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>
    <table class='table' id='post'>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Tags</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        </tr>
        @foreach($ls_post as $key => $post)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$post->title}}</td>
            <td>
                @foreach($ls_postdetail as $postdetail)
                    @if ($postdetail->post_id == $post->id)
                        {{$postdetail->tag_name}},
                    @endif
                @endforeach
            </td>
            <td>{{substr(strip_tags($post->content),0,30)}}</td>
            <td><a href="post/edit/{{$post->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="post/delete/{{$post->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
            <td><a href="post/change-use/{{$post->id}}" class="btn {{($post->is_using == 1) ? 'btn-success' : 'btn-danger'}}">{{($post->is_using == 1) ? 'Published' : 'Unpublished'}}</a></td>
        </tr>
        
        @endforeach

    </table>
</div>
      
    </div>
  </div>
</div>
@endsection