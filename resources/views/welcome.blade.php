<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<!-- Title -->
<title>{{$general_information->name}}</title>

<!-- Favicons -->
<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('img/favicon_60x60.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon_76x76.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicon_120x120.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicon_152x152.png')}}">

<!-- Google Web Fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300,100' rel='stylesheet' type='text/css'>

<!-- CSS Styles -->
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />

<!-- CSS Template -->
<link rel="stylesheet" href="{{asset('css/theme.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/color/brown-beige.css')}}" id="color" />

</head>

<body class="header-vertical">

<!-- Loader -->
<div id="page-loader" class="bg-white"></div>
<!-- Loader / End -->

<!-- Header -->
<header id="header" class="bg-secondary dark hidden-sm hidden-xs">

    <!-- Photo -->
    <div class="photo">
        <img src="{{asset($general_information->img)}}" alt="...">
    </div>

    <!-- Navigation -->
    <nav id="main-menu">
        <ul class="nav nav-vertical">
            <li><a href="#start"><span>Start</span></a></li>
            <li><a href="#resume"><span>Resume</span></a></li>
            <li><a href="#portfolio"><span>Portfolio</span></a></li>
            <li><a href="#contact"><span>Contact</span></a></li>
        </ul>
    </nav>

    <!-- Social Media -->
    <div class="social-media">
        <strong class="text-sm">Check my social media!</strong>
        <ul class="list-inline margin-t-10">
            <li><a href="#" class="icon icon-xs"><i class="fa fa-facebook text-muted"></i></a></li>
            <li><a href="#" class="icon icon-xs"><i class="fa fa-twitter text-muted"></i></a></li>
            <li><a href="#" class="icon icon-xs"><i class="fa fa-google-plus text-muted"></i></a></li>
        </ul>
    </div>

</header>
<!-- Header / End -->

<!-- Content -->
<div id="content" class="bg-white">

    <!-- Section - Home -->
    <section id="start" class="section fullheight bg-secondary dark padding-v-60">

        <!-- BG Image -->
        <div class="bg-image animated infinite zooming"><img src="{{asset($general_information->banner)}}" alt="..."></div>

        <!-- Top 
        <div class="container container-wide text-md">
            <i class="icon-before fa fa-comments text-primary"></i>Have you got any questions? Write to me at <a href="#" class="text-primary">hello@suelo.pl</a>
        </div>-->

        <!-- Middle -->
        <div class="container container-wide v-bottom padding-v-80">
            <h1 class="text-lg margin-b-0">Hi! I’m <strong>{{$general_information->name}}</strong></h1>
            <h5 class="text-tertiary margin-b-40">{{$general_information->job}}</h5>
            <span data-target="local-scroll"><a href="#resume" class="btn btn-lg btn-primary"><span>Go to my resume!</span><i class="ti-arrow-down"></i></a></span>
            <a href="{{'download-cv/'.$general_information->user_id}}" class="btn btn-lg btn-primary"><span>Download my CV</span><i class="ti-file"></i></a>         
        </div>
        
    </section>
    <!-- Section - Home / End -->

    <!-- Section - Resume -->
    <section id="resume" class="section padding-v-60">

        <!-- Content -->
        <div class="container container-wide">

            <h6 class="margin-b-50">Resume</h6>
            
            <div class="row padding-lg">
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / About -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-comment-alt text-tertiary"></i></span>
                        <h4><strong>About</strong> Me</h4>
                        {!!$general_information->about!!}
                    </div>

                    <!-- Resume Box / Skills -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-cup text-tertiary"></i></span>
                        <h4><strong>Skills</strong> &amp; abilities</h4>
                        @foreach ($ls_skill as $skill)
                        <!-- Skill -->
                        <div class="skill">
                            <div class="progress progress-animated">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100">
                                    <span></span>
                                </div>
                            </div>
                            <strong>{{$skill->name}}</strong>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / Specilities -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-mouse-alt text-tertiary"></i></span>
                        <h4>My <strong>Specialities</strong></h4>
                        @foreach ($ls_speciality as $speciality)
                        <!-- Speciality -->
                        <div class="speciality">
                            <span class="speciality-icon"><i class="{{$speciality->img}}" style="color: #b7b7b7;"></i></span>
                            <div class="speciality-content">
                                <h5 class="margin-b-0">{{$speciality->title}}</h5>
                                <p class="speciaity-description">{{$speciality->subtitle}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Resume Box / Education and Jobs -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-marker-alt text-tertiary"></i></span>
                        <h4><strong>Education</strong> &amp; qualifications</h4>
                        <div class="timeline">
                            @foreach ($ls_qualification as $qualification)
                            <!-- Single event -->
                            <div class="timeline-event te-primary">
                                <span class="event-date">{{$qualification->time_begin}} - {{$qualification->time_end}}</span>
                                <span class="event-name">{{$qualification->course}}</span>
                                <span class="event-description">{{$qualification->place}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- Resume Box / Jobs -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-briefcase text-tertiary"></i></span>
                        <h4><strong>Jobs</strong> &amp; positions</h4>
                        <div class="timeline">
                            @foreach ($ls_job as $job)
                            <!-- Single event -->
                            <div class="timeline-event te-primary">
                                <span class="event-date">{{$job->time_begin}} - {{$job->time_end}}</span>
                                <span class="event-name">{{$job->position}}</span>
                                <span class="event-description">{{$job->place}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Resume Box / Hobbies -->
                    <div class="resume-box">
                        <span class="icon animated" data-animation="fadeInDown"><i class="ti-music-alt text-tertiary"></i></span>
                        <h4><strong>Hobbies</strong> &amp; Interests</h4>
                            <ul class="list-inline">
                            @foreach($ls_hobby as $hobby)
                            <li>
                                <div class="icon-box text-center">
                                    <span class="icon icon-sm icon-circle icon-primary icon-filled"><i class="{{$hobby->img}}"></i></span>
                                    <span class="title">{{$hobby->name}}</span>
                                </div> 
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>     

        </div>
        
    </section>
    <!-- Section - Resume / End -->
    
    <!-- Section - Portfolio -->
    <section id="portfolio" class="section bg-primary dark padding-v-60">

        <!-- Content -->
        <div class="container container-wide">

            <h6 class="margin-b-50">Portfolio</h6>

            <!-- Filters -->
            <nav class="text-center">
                <ul class="nav nav-filter nav-pills margin-b-40" data-filter-grid="#portfolio-list">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
                    @foreach ($ls_tag as $tag)
                    <li><a href="#" data-filter=".{{$tag->id.'-'.str_replace(' ', '', $tag->name)}}">{{$tag->name}}</a></li>
                    @endforeach
                    <!--
                        <li><a href="#" data-filter=".webdesign">Webdesign</a></li>
                    <li><a href="#" data-filter=".development">Development</a></li>
                    <li><a href="#" data-filter=".graphic">Graphic Design</a></li>
                    -->
                </ul>
            </nav>
            
            <div id="portfolio-list" class="row masonry">
                <!-- Masonry Sizer -->
                <div class="masonry-sizer col-lg-3 col-sm-6 col-xs-12"></div>    
                @foreach ($ls_post as $post)
                <!-- Masonry Element -->
                <?php
                foreach ($post->postdetail as $post_tag_id) {
                    $taglist[] = $post_tag_id->tag_id.'-'.str_replace(' ', '', $post_tag_id->tag_name);
                }
                ?>
                <div class="<?php foreach($taglist as $tagitem) {echo $tagitem.' ';} $taglist=array();?> masonry-item margin-b-30 col-lg-6 col-sm-12 col-xs-12">
                    <div class="gallery-item">
                        <div class="item-photo">
                            <a href="{{'viewpost/'.$post->id}}" data-target="ajax-modal"><img src="{{asset($post->img)}}" alt="" /></a>
                            <div class="item-hover bg-dark dark">
                                <div class="item-hover-content">
                                    <a href="{{'viewpost/'.$post->id}}" data-target="ajax-modal" class="icon icon-sm icon-hover icon-circle icon-primary"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-title">
                            <a href="{{'viewpost/'.$post->id}}" data-target="ajax-modal" class="title">{{$post->title}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>    

        </div>
        
    </section>
    <!-- Section - Portfolio / End -->   

    <!-- Section - Contact -->
    <section id="contact" class="section padding-v-60 min-fullheight">

        <!-- BG Map -->
        <div id="google-map" class="bg-image" data-latitude="21.0339527" data-longitude="105.7850022" data-style="light"></div>

        <!-- Contact Box -->
        <div class="contact-box bg-secondary dark animated" data-animation="flipInY">
            <h1>Don’t hesitate to <strong>contact me</strong>!</h1>
            <!-- Contact List -->
            <ul class="list-unstyled list-unstyled-icons">
                <li><i class="inline-icon icon-before-and-after text-primary fa fa-map-marker"></i>{{$general_information->address}}</li>
                <li><i class="inline-icon icon-before-and-after text-primary fa fa-comment"></i><a href="mailto:{{$general_information->email}}">{{$general_information->email}}</a></li>
                <li><i class="inline-icon icon-before-and-after text-primary fa fa-phone"></i>{{$general_information->phone}}</li>
            </ul>
            <a href="#" class="btn btn-primary" data-target="messenger"><span>Use Contact Form</span><i class="ti-email"></i></a>
            <h5 class="margin-t-60">Check my social media!</h5>
            <ul class="list-inline">
                <li><a href="{{$general_information->facebook}}" class="icon icon-circle icon-xs icon-facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{$general_information->twitter}}" class="icon icon-circle icon-xs icon-twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{$general_information->googleplus}}" class="icon icon-circle icon-xs icon-google-plus"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>

    </section>
    <!-- Section - Contact / End -->

</div>
<!-- Content / End -->

<!-- Messanger -->
<a href="#" id="messenger-toggle" data-target="messenger" class="icon icon-sm icon-circle animated" data-animation="bounceIn" data-animation-delay="300"><i class="fa fa-comments"></i></a>
<div id="messenger" class="dark">
    <div id="messenger-box">
        <div class="messenger-box-content">
            <!-- Close -->
            <a href="#" class="messenger-close icon icon-hover icon-xs icon-circle icon-white" data-target="messenger"><i class="fa fa-times"></i></a>
            <!-- Avatar 
            <img src="{{asset($general_information->img)}}" alt="..." class="img-circle margin-b-30" style="width: 100px;">-->
            <br>
            <br>
            <h3>Please fill the <strong>form</strong> - I will response as fast as I can!</h3>
            <!-- Contact Form -->
            <form id="contact-form" action="send-your-message/{{$general_information->user_id}}" method="POST">
                {{ csrf_field() }}

                <div class="form-alert"></div>
                <div class="form-error alert alert-default"><ul></ul></div>
                <div class="form-group">
                    <label>Name:</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input id="email" class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label>Message:</label>
                    <textarea id="message" class="form-control" name="content" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary"><span>Send a message!</span><i class="ti-email"></i></button>
            </form>
        </div>
    </div>
</div>

<!-- Mobile Navigation -->
<a href="#" id="mobile-nav-toggle" class="icon icon-circle icon-sm icon-primary icon-hover visible-xs visible-sm" data-target="mobile-nav">
    <i class="ti-menu"></i>
</a>
<nav id="mobile-nav" class="bg-secondary dark">
    <div class="mobile-nav-wrapper">
        <!-- Avatar -->
        <img src="{{asset($general_information->img)}}" alt="..." class="img-circle margin-b-30">
        <!-- Nav -->
        <ul class="nav nav-vertical">
            <li><a href="#start"><span>Start</span></a></li>
            <li><a href="#resume"><span>Resume</span></a></li>
            <li><a href="#portfolio"><span>Portfolio</span></a></li>
            <li><a href="#contact"><span>Contact</span></a></li>
        </ul>
        <!-- Social Media -->
        <div class="margin-t-20">
            <strong class="text-sm">Check my social media!</strong>
            <ul class="list-inline margin-t-10">
                <li><a href="{{$general_information->facebook}}" class="icon icon-xs"><i class="fa fa-facebook text-muted"></i></a></li>
                <li><a href="{{$general_information->twitter}}" class="icon icon-xs"><i class="fa fa-twitter text-muted"></i></a></li>
                <li><a href="{{$general_information->googleplus}}" class="icon icon-xs"><i class="fa fa-google-plus text-muted"></i></a></li>
            </ul>
        </div>
    </div>
    <a href="#" class="mobile-nav-close icon icon-hover icon-xs icon-circle icon-primary" data-target="mobile-nav"><i class="fa fa-times"></i></a>
</nav>

<!-- Ajax Wrapper & Loader -->
<div id="ajax-modal"></div>
<div id="ajax-loader"><i class="fa fa-spinner fa-spin"></i></div>




<!-- JS Libraries -->
<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
<!-- JS Plugins -->
<script>
window.paceOptions = {
    target: '#page-loader',
    ajax: false
};
</script>

<script>
   $(document).ready(function (){
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
});
</script>

<script src="{{asset('js/plugins.js')}}"></script>

<!-- JS Core -->
<script src="{{asset('js/core.js')}}"></script>

<!-- Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmdPfFFxvVI3fDVrCYZDumh0Jz7zDY-0k"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
<!--
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
-->

</body>

</html>
