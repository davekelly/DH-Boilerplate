@extends('layout.layout_main')
  
  <?php 
  //    Single catalogue item view
  //    /catalogue/{id}
  //    
  ?>

@section('content')

  <div class="container">
   
    <form class="form-signin form-horizontal" method="post" action="/user/login">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <h2 class="">Please sign in</h2>
      <div class="form-group ">
        <label class="col-sm-2 col-lg-2 col-sm-2 col-lg-2 control-label" for="email">
          Email:
        </label>
        <div class="col-sm-6 col-lg-4">
          <input type="text" id="email" name="email" class="form-control" placeholder="Email address" value="">
        </div>
      </div>
      <div class="form-group ">
          <label class="col-sm-2 col-lg-2 col-sm-2 col-lg-2 control-label" for="password">
            Password:
          </label>
          <div class="col-sm-6 col-lg-4">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="">
            
          </div>
      </div>
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
      
    </form>
  </div> <!-- /container -->
@stop