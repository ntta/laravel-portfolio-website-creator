@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('post')}}">Posts</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>

    <h1>Edit a post <a href="{{route('post')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="../edit-done/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th>Post thumbnail<sup>*</sup></th>
          <td>
            <img src="{{asset($post->img)}}" alt="" style="width: 200px;">
            <input type="file" name="img" />
          </td>
        </tr>
        <tr>
          <th>Title<sup>*</sup></th>
          <td>
            <input class="form-control" id="title" name="title" type="text" value="{{$post->title}}">
            
          </td>
        </tr>
        <tr>
          <th>Tags</th>
          <td>
            <div class="row">
              @foreach($ls_tag as $tag)
              <div class="form-check"><label class="form-check-label"><input type="checkbox" name="tag[]" value="{{$tag->id}}" {{(in_array($tag->id, $exist_tags)) ? 'checked' : ''}}> {{$tag->name}}</label></div>
              @endforeach
            </div>
          </td>
        </tr>
        <tr>
          <th>Content<sup>*</sup></th>
          <td><textarea cols="60" name='content'>{!!$post->content!!}</textarea></td>
        </tr>        
        <tr>
          <th colspan="2"><div class="form-check"><label class="form-check-label"><input type="checkbox" name="is_using" value="1" {{($post->is_using == 1) ? 'checked' : ''}}> Publish to your page</label></div></th>
        </tr>
      </table>
      
      <button type="submit" class="btn btn-primary">Apply changes</button>
      </form>

    </div>


@endsection