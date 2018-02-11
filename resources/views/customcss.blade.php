
@extends('layouts.app_home')
@section('content')


<ol class="breadcrumb">
  <li class="breadcrumb-item active">Custom CSS</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1><i class="fa fa-institution"></i> Custom CSS</h1>
    <div class="container" style="padding-top: 25px;">
      @if(session('success_msg'))
        <div class="alert alert-info">{{session('success_msg')}} </div>
    @endif
	<textarea name="customcss" id="myCpWindow" class="codepress css linenumbers-off"></textarea>
</div>
      
    </div>



  </div>
</div>
@endsection