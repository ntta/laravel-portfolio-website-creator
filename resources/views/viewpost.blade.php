<div class="ajax-body section bg-secondary dark">
	
	<div class="container container-wide">
		<div class="row margin-b-50">
			<div class="col-lg-8 col-lg-offset-1">
				<h1>{{$post->title}}</h1>
			</div>
		</div>
		<div class="row">  
			{!!$post->content!!}
        </div>
	</div>
	
	<!-- Close -->
	<a href="#" class="ajax-close icon icon-hover icon-primary icon-circle icon-sm" data-dismiss="close"><i class="fa fa-close"></i></a>
</div>