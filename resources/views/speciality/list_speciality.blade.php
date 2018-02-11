@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Specialities</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-rocket"></i> Speciality <a class="btn btn-primary btn-sm" href="speciality/add">Add more</a></h1>
    
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='speciality' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Published list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='speciality' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unpublished list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('speciality')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>
    <table class='table' id='speciality'>
        <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        </tr>

        @foreach($ls_speciality as $key => $speciality)
        <tr>
            <td>{{$key+1}}</td>
            <td><i class="{{$speciality->img}}" style="font-size: 30px;"></i></td>
            <td>{{$speciality->title}}</td>
            <td>{{$speciality->subtitle}}</td>
            <td><a href="speciality/edit/{{$speciality->id}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="speciality/delete/{{$speciality->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
            <td><a href="speciality/change-use/{{$speciality->id}}" class="btn {{($speciality->is_using == 1) ? 'btn-success' : 'btn-danger'}}">{{($speciality->is_using == 1) ? 'Published' : 'Unpublished'}}</a></td>
        </tr>
        
        @endforeach
    </table>
    {{$ls_speciality->appends(['sort_by'=> $sort_by])->links()}}
</div>
      
    </div>



  </div>
</div>

@endsection