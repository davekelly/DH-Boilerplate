@extends('layout.layout_main')
	
	<?php 
	// 		Single catalogue item view
	// 		/catalogue/{id}
	// 		
	?>

@section('content')

	<?php 
		// check if we have a model to bind to the form
		if( isset($item) && ($item instanceof Catalogue) ){
			echo Form::model($item, array('url' => $formData['url'], 'method' => 'PUT', 'files' => true, 'class' => 'form form-horizontal'));
		}else{ 
			// if not, we're creating a new entry => open clean form
			echo Form::open(array('url' => '/catalogue', 'method' => 'POST', 'files' => true, 'class' => 'form form-horizontal') );
		}
		?>


		<div class="control-group">
			<?php echo Form::label('title', Lang::get('catalogue.label_title'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::text('title', null, array('class' => 'input-xxlarge')); ?>
				
				<?php if( $errors->has('title')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('title') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('description', Lang::get('catalogue.label_description'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::textarea('description', null, array('class' => 'input-xxlarge')); ?>
				
				<?php if( $errors->has('description')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('description') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('image_url', Lang::get('catalogue.label_image_url'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::file('image_url'); ?>

				<?php if( $errors->has('image_url')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('image_url') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('thumb_url', Lang::get('catalogue.label_thumb_url'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::file('thumb_url'); ?>

				<?php if( $errors->has('thumb_url')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('thumb_url') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo Form::label('location', Lang::get('catalogue.label_location'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::text('location', null, array('class' => 'input-large')); ?>

				<?php if( $errors->has('location')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('location') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('geo_lat', Lang::get('catalogue.label_geo_lat'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::text('geo_lat', null, array('class' => 'input-large')); ?>

				<?php if( $errors->has('geo_lat')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('geo_lat') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('geo_lon', Lang::get('catalogue.label_geo_lon'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::text('geo_lon', null, array('class' => 'input-large')); ?>

				<?php if( $errors->has('geo_lon')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('geo_lon') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo Form::label('active', Lang::get('catalogue.label_active'), array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo Form::checkbox('active', '1'); ?>

				<?php if( $errors->has('active')): ?>
					<div class="alert alert-error help-block">
						@foreach($errors->get('active') as $message)
							 <p>{{ $message }}</p>
						@endforeach
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="form-actions">
			<div class="control-group">
				<?php echo Form::submit(Lang::get('catalogue.label_submit'), array('class' => 'btn btn-primary') ); ?>
			</div>
		</div>

	{{ Form::close() }}

@stop