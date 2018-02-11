@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('hobby')}}">Hobbies</a></li>
  <li class="breadcrumb-item active">Add</li>
</ol>

    <h1>Add a hobby <a href="{{route('hobby')}}" class="btn btn-light">Go back</a></h1>
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
          <th>Image<sup>*</sup></th>
          <td>
            <input class="form-control" id="img" name="img" type="text" style="width:50%;" readonly>
            <br>
            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#myModal">Select </button><span id="imgValue" style="font-size: 30px;padding-left: 10px;"></span>
            
          </td>
        </tr>
        <tr>
          <th>Name<sup>*</sup></th>
          <td>
            <input class="form-control" id="name" name="name" type="text">
          </td>
        </tr>   
        <tr>
          <th><div class="form-check"><label class="form-check-label"><input type="checkbox" name="is_using" value="1"> Publish to your page</label></div></th>
        </tr>     
      </table>
      
      <button type="submit" class="btn btn-primary">Add to the list</button>
      </form>

    </div>


@endsection