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

						<table class="table" id="catalogue-table">
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
											{{ link_to('/catalogue/' . $item->id , $title = $item->title) }}
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
@stop