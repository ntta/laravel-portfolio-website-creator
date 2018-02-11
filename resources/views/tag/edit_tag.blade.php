@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('tag')}}">Tags</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>

    <h1>Edit a tag <a href="{{route('tag')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="../edit-done/{{$tag->id}}" method="POST">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th>Tag name<sup>*</sup></th>
          <td>
            <input class="form-control" id="name" name="name" type="text" value="{{$tag->name}}">
            
          </td>
        </tr>
        <tr>
          <th>Posts are using this tag</th>
          <td>
            <ul>
              @foreach($ls_postdetail as $postdetail)
              <li>
                <a href="{{asset('home/post/edit/').'/'.$postdetail->post->id}}">{{$postdetail->post->title}}</a>
              </li>
              @endforeach
            </ul>
          </td>
        </tr>
      </table>
      
      <button type="submit" class="btn btn-info">Apply changes</button>
      </form>

    </div>


@endsection