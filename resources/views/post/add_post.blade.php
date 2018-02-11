@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('post')}}">Posts</a></li>
  <li class="breadcrumb-item active">Add</li>
</ol>

    <h1>Add a post <a href="{{route('post')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="add-done" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th>Post thumbnail<sup>*</sup></th>
          <td><input type="file" name="img" /></td>
        </tr>
        <tr>
          <th>Title<sup>*</sup></th>
          <td>
            <input class="form-control" id="title" name="title" type="text">
            
          </td>
        </tr>
        <tr>
          <th>Tags</th>
          <td>
            <div class="row">
              @foreach($ls_tag as $tag)
              <div class="form-check"><label class="form-check-label"><input type="checkbox" name="tag[]" value="{{$tag->id}}"> {{$tag->name}}</label></div>
              @endforeach
            </div>
          </td>
        </tr>
        <tr>
          <th>Content<sup>*</sup></th>
          <td><textarea cols="60" name='content'></textarea></td>
        </tr>        
        <tr>
          <th colspan="2">
            <div class="form-check"><label class="form-check-label"><input type="checkbox" name="is_using" value="1"> Publish to your page</label></div>
          </th>
        </tr> 
      </table>
      
      <button type="submit" class="btn btn-primary">Add to the list</button>
      </form>

    </div>


@endsection