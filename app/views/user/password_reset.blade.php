@extends('layout.layout_main')
  
  <?php 
  //    Single catalogue item view
  //    /catalogue/{id}
  //    
  ?>

@section('content')

	@if (Session::has('error'))
		<div class="alert alert-danger">
	    	{{ trans(Session::get('reason')) }}
	    </div>
	@endif

	<form class="form-signin form-horizontal well" method="post" action="/user/password-reset/{{ $token }}">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="hidden" name="token" value="{{ $token }}">
		<input type="text" name="email" placeholder="Email address...">
		<input type="password" name="password">
		<input type="password" name="password_confirmation">
		<input type="submit" value="Reset Password" />
	</form>

@stop
