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

						<table class="table">
							<thead>
								<tr>	
									<?php
										/**
										 * @todo Add these to the language file...
										 */
									?>
									<th>Title</th>
									<th>Location</th>
									<th>Etc...</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item): ?>
									<tr>
										<td>
											{{ HTML::link('/catalogue/' . $item->id , $title = $item->title) }}
										</td>
										<td>
											{{{ $item->location }}}
										</td>
										<td>
											etc...
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
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

	<?php 
		// Templates for backbone... 
		// can be deleted if not using backbone for 
		// a front-end application
		// see /public/js/app
	?>
	<script type="text/template" id="item-template">
	    <article id="catalogue-item">
				<div class="row">
					<header class="col-12">
						<h1>
							<%= title %>
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
										<%= description %>
									</td>
								</tr>
								
								<tr>
									<th scope="row">
										{{ Lang::get('catalogue.label_location') }}
									</th>
									<td>
										<%= location %>
									</td>
								</tr>

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

						
						<figure>
							<img src="<%= image_url %>" alt="<%= title %>" />
							<figcaption><%= title %></figcaption>
						</figure>
		

						<?php 
						// check for lat & long
						?>
							<div id="map">
								<h3>
									{{ Lang::get('catalogue.heading_map') }}
								</h3>

								<img src="http://maps.googleapis.com/maps/api/staticmap?zoom=12&size=570x300&maptype=roadmap&markers=color:blue%7Clabel:%7C<%= geo_lon %>,<%= geo_lat %>&sensor=false" />
							</div>

					</aside>

				</div>

		</article>
  </script>

  <script type="text/template" id="empty-listing-alert">
  	<div class="alert alert-danger">
		<h4>{{ Lang::get('messages.error_heading') }}</h4>
		<p>
			{{ Lang::get('messages.empty_listing') }}
		</p>
	</div>
  </script>
@stop