@extends('layout.layout_main')
	
	<?php 
	// 		Single catalogue item view
	// 		/catalogue/{id}
	// 		
	?>

@section('content')

	<article id="catalogue-item">
		<?php if( isset($item) ): ?>
			<div class="row">
				<header class="col-12">
					<h1>
						{{{ $item->title }}}
					</h1>
				</header>
			</div>

			<div class="row">
				<section class="col-12 col-sm-6 col-lg-6">
				
					<?php
					// listing of item attributes
					?>
					<table class="table">
						<tbody>
							<tr>
								<th scope="row">
									<?php 
									/**
									 * @todo  add your labels to language file and
									 *        output here...
									 */
									?>
									{{ Lang::get('catalogue.label_description') }}
								</th>
								<td>
									{{{ $item->description }}}
								</td>
							</tr>
							<?php if($item->location): ?>
								<tr>
									<th scope="row">
										{{ Lang::get('catalogue.label_location') }}
									</th>
									<td>
										{{{ $item->location }}}
									</td>
								</tr>
							<?php endif; ?>

							<tr>
								<th scope="row">Etc...</th>
								<td>Etc...</td>
							</tr>
						</tbody>
					</table>
				</section>

				<aside class="col-12 col-sm-6 col-lg-6">
					<?php 
					//
					// related item info (image & map ) 
					// 
					?>

					<?php if( $item->image_url ): ?>
						<figure>
							<img src="{{{ $item->image_url }}}" alt="{{{ $item->title }}}" />
							<figcaption>{{{ $item->title }}}</figcaption>
						</figure>
					<?php endif; ?>

					<?php 
					// check for lat & long
					if(  ($item->geo_lat !== '0.000000') && (  $item->geo_long !== '0.000000')): ?>
						<div id="map">
							<h3>
								{{ Lang::get('catalogue.heading_map') }}
							</h3>

							<img src="http://maps.googleapis.com/maps/api/staticmap?zoom=12&size=570x300&maptype=roadmap&markers=color:blue%7Clabel:%7C{{ $item->geo_lon }},{{ $item->geo_lat }}&sensor=false" />
						</div>

					<?php endif; ?>
				</aside>

			</div>
		<?php else: ?>
			<div class="alert alert-error">
				<h4>{{ Lang::get('messages.error_heading') }}</h4>
				<p>
					{{ Lang::get('messages.empty_listing') }}
				</p>
			</div>
		<?php endif; ?>

	</article>

@stop