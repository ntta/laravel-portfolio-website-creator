@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"> <a href="{{route('skill')}}">Skills</a></li>
  <li class="breadcrumb-item active">Add</li>
</ol>

    <h1>Add a skill <a href="{{route('skill')}}" class="btn btn-light">Go back</a></h1>
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
          <th>Skill name<sup>*</sup></th>
          <td>
            <input class="form-control" id="name" name="name" type="text">
            
          </td>
        </tr>
        <tr>
          <th>Percent (%)<sup>*</sup></th>
          <td>
            <input class="form-control" id="percent" name="percent" type="number">
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