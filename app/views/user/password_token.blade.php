@extends('layout.layout_main')
  
  <?php 
  //    Single catalogue item view
  //    /catalogue/{id}
  //    
  ?>

@section('content')

	@if (Session::has('error'))
		<div class="alert">
	    	{{ trans(Session::get('reason')) }}
	    </div>
	@elseif (Session::has('success'))
		<div class="alert alert-success">
	    	An e-mail with the password reset has been sent.
	    </div>
	@endif

	<div class="row">
		<div class="col-lg-offset-2 col-lg-6">
			<form class="form-signin form-horizontal well row" method="post" action="/user/password-remind">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="email" class="col-lg-6" class="form-control" name="email" placeholder="Email address...">
				<input type="submit" class="btn btn-primary col-lg-4 col-lg-offset-1" value="Send Reminder" />
			</form>
		</div>
	</div>

@stop