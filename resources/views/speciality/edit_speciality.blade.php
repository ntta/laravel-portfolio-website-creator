@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('speciality')}}">Specialities</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>

    <h1>Edit a speciality <a href="{{route('speciality')}}" class="btn btn-light">Go back</a></h1>
    <div class="container" style="padding-top: 25px;">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        </div>
        @endif
      <form action="../edit-done/{{$speciality->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <table class='table'>
        <tr>
          <th>Image<sup>*</sup></th>
          <td>
            <input class="form-control" id="img" name="img" type="text" value="{{$speciality->img}}" style="width:50%;" readonly>
            <br>
            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#myModal">Select</button><span id="imgValue" class="{{$speciality->img}}" style="font-size: 30px;padding-left: 10px;"></span>            
          </td>
        </tr>
        <tr>
          <th>Title<sup>*</sup></th>
          <td>
            <input class="form-control" id="title" name="title" type="text" value="{{$speciality->title}}">
          </td>
        </tr>
        <tr>
          <th>Subtitle</th>
          <td>
            <input class="form-control" id="subtitle" name="subtitle" type="text" value="{{$speciality->subtitle}}">
          </td>
        </tr>    
        <tr>
          <th><div class="form-check"><label class="form-check-label"><input type="checkbox" name="is_using" value="1" {{($speciality->is_using == 1) ? 'checked' : ''}}> Publish to your page</label></div></th>
        </tr>     
      </table>
      
      <button type="submit" class="btn btn-info">Apply changes</button>
      </form>

    </div>


@endsection