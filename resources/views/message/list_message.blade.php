@extends('layouts.app_home')
@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Messages</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-comment"></i> Message </h1>
    <div class="container" style="padding-top: 25px;">
        @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
    <div class="row pull-right">
      <span style="padding-right: 20px;">View: </span>
        <form action='message' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="1" hidden="true" "/>
        <input type="submit" value="Read list" class="btn btn-light btn-sm"/>
    </form>
    
    <form action='message' method='get' style="padding-right: 20px;">
        <input type="text" name="sort_by" value="0" hidden="true" "/>
        <input type="submit" value="Unread list" class="btn btn-light btn-sm"/>
    </form>
    <a href="{{route('message')}}" class="btn btn-light btn-sm">Clear view</a>
      </div>

    <table class='table' id='message'>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>View</th>
            <th>Read</th>
            <th>Delete</th>
        </tr>
      @foreach($ls_message as $key => $message)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{substr($message->content,0,30)}}</td>
            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#messageModal{{$message->id}}">View </button></td>

            <div id="messageModal{{$message->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">        
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"><h5>Name:</h5></div>
                        <div class="col-lg-9 col-md-9 col-sm-9">{{$message->name}}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"><h5>Email:</h5></div>
                        <div class="col-lg-9 col-md-9 col-sm-9"><a href="mailto:{{$message->email}}">{{$message->email}}</a></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"><h5>Message:</h5></div>
                        <div class="col-lg-9 col-md-9 col-sm-9">{{$message->content}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="message/change-use/{{$message->id}}" class="btn btn-primary">Close</a>
                  </div>
                </div>

              </div>
            </div>

            <td><a href="message/change-use/{{$message->id}}" class="btn {{($message->read == 1) ? 'btn-success' : 'btn-danger'}}">{{($message->read == 1) ? 'Read' : 'Unread'}}</a></td>
            <td>
                <form action="message/delete/{{$message->id}}" method="get" onsubmit="return confirm('Are you sure?')">
                    {{csrf_field()}}
                    <input type="Submit" value="Delete" class="btn btn-warning" />
                </form>
            </td>
        </tr>
        
        @endforeach
    </table>
    {{$ls_message->appends(['sort_by'=> $sort_by])->links()}}
</div>
      
    </div>



  </div>
</div>
@endsection