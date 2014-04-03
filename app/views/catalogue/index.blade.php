@extends('layout.layout_main')
	
	<?php 
	// 		/catalogue/index
	?>

@section('content')
	
	<div id="catalogue-holder">
		<article id="catalogue-list">
			<div class="row">
				<header class="col-12">
					<h1>
						{{ Lang::get('catalogue.listing_title') }}
					</h1>
				</header>
			</div>

			<div class="row">
				<section class="col-12">
					<?php if( isset($items) ): ?>
						
						<?php // output number of results ?>
						<p>
							<strong>
								{{ count( $items ) }} {{ Lang::choice('catalogue.listing_count', count($items)) }}
							</strong>
						</p>

						@include('catalogue.partial.listing_table')
						
					<?php else: ?>
						<div class="alert alert-danger">
							<h4>{{ Lang::get('messages.error_heading') }}</h4>
							<p>
								{{ Lang::get('messages.empty_listing') }}
							</p>
						</div>
					<?php endif; ?>
				</section>
			</div>

		</article>
	</div>
@stop