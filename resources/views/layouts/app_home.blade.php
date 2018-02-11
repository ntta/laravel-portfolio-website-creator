<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{ config('app.name', 'CV Creator') }}</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
  <style>
        #myModal .row i:hover{
          color:blue;
          cursor: pointer;
        }
      </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'CV Creator') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item {{ (\Request::route()->getName() == 'general-information') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="General Information">
          <a class="nav-link" href="{{ route('general-information') }}">
            <i class="fa fa-address-book"></i>
            <span class="nav-link-text">General Information</span>
          </a>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'speciality') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Specialities">
          <a class="nav-link" href="{{ route('speciality') }}">
            <i class="fa fa-rocket"></i>
            <span class="nav-link-text">Specialities</span>
          </a>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'skill') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Skills">
          <a class="nav-link" href="{{ route('skill') }}">
            <i class="fa fa-trophy"></i>
            <span class="nav-link-text">Skills</span>
          </a>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'qualification') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Qualifications">
          <a class="nav-link" href="{{ route('qualification') }}">
            <i class="fa fa-mortar-board"></i>
            <span class="nav-link-text">Qualifications</span>
          </a>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'job') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Jobs">
          <a class="nav-link" href="{{ route('job') }}">
            <i class="fa fa-institution"></i>
            <span class="nav-link-text">Jobs</span>
          </a>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'hobby') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Qualifications">
          <a class="nav-link" href="{{ route('hobby') }}">
            <i class="fa fa-music"></i>
            <span class="nav-link-text">Hobbies</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Portfolio">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-address-card"></i>
            <span class="nav-link-text">Portfolio</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li class="{{ (\Request::route()->getName() == 'post') ? 'active' : '' }}">
              <a href="{{ route('post') }}"><i class="fa fa-file-text"></i> Posts</a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'tag') ? 'active' : '' }}">
              <a href="{{ route('tag') }}"><i class="fa fa-tags"></i> Tags</a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ (\Request::route()->getName() == 'message') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Qualifications">
          <a class="nav-link" href="{{ route('message') }}">
            <i class="fa fa-comment"></i>
            <span class="nav-link-text">Messages</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Qualifications">
          <a class="nav-link" href="{{asset('/blog/').'/'.Auth::user()->id}}">
            <i class="fa fa-list-alt"></i>
            <span class="nav-link-text">Your blog</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!--<li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>-->
        <li class="nav-item">
          <a class="nav-link">
            Hi, {{ Auth::user()->name }}!</a>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="content-wrapper">
        <div class="container-fluid" style="padding-bottom: 30px;"">
          @yield('content')
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer"">
          <div class="container">
            <div class="text-center">
              <small>Copyright © Your Website 2018</small>
            </div>
          </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin.min.js')}}"></script>
        <script src="{{asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('../vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
        
        

        <script>
          var options = {            
            filebrowserImageBrowseUrl: "{{asset('laravel-filemanager?type=Images')}}",
            filebrowserImageUploadUrl: 'http://localhost/project/public/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: "{{asset('laravel-filemanager?type=Files')}}",
            filebrowserUploadUrl: 'http://localhost/project/public/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
          };
          //CKEDITOR.replace( 'about' , options);
        $('textarea').ckeditor(options);
        // $('.textarea').ckeditor(); // if class is prefered.
      </script>


      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Font Awesome Icon</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body" style="font-size: 30px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-bus" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-building" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-film" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-language" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-glass" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-magic" ></i></div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-pie-chart" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-rocket" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-lock" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-fax" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-gamepad" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-dashboard" ></i></div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-camera" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-bank" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-code" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-flag" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-paint-brush" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-soccer-ball-o" ></i></div>
          </div>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-ship" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-signal" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-leaf" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-gift" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-gear" ></i></div>
            <div class="col-lg-2 col-md-2 col-sm-2"><i class="fa fa-desktop" ></i></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
      </div>
      <div class="modal-body" style="text-align: center;">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12"><img src="" alt="" id="biggerImg" style="width: 100%;"></div>
            
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
$(document).on("click", ".fa", function () {
     //var myBookId = $(this).data('id');
     //$(".modal-body #bookId").val( myBookId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
     var faCode = $(this).attr('class');
     $("#img").val(faCode);
     $("#imgValue").attr('class', faCode);
     $('#myModal').modal('hide');
});

$(document).on("click", "img", function () {
    var imgSource = $(this).attr('src');
    $("#biggerImg").attr('src', imgSource);
    $('#imgModal').modal('show');
});
</script>
<!-- End Modal -->
    </div>
  </body>

  </html>
