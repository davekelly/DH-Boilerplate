@extends('layout.layout_main')
	
	<?php 
	// 		/catalogue/index
	?>

@section('content')

	<article>
		<?php if( isset($item) ): ?>
			<div class="row">
				<header class="span12">
					<h1>
						{{{ $item->title }}}
					</h1>
				</header>
			</div>

			<div class="row">
				<section class="span6">
				
					<table class="table">
						
						<tbody>
							<tr>
								<th scope="row">
									Description
								</th>
								<td>
									{{{ $item->description }}}
								</td>
							</tr>
							<?php if($item->location): ?>
								<tr>
									<th scope="row">Location</th>
									<td>{{{ $item->location }}}</td>
								</tr>
							<?php endif; ?>

							<tr>
								<th scope="row">Etc...</th>
								<td>Etc...</td>
							</tr>
						</tbody>
					</table>
				</section>

				<aside class="span5">
					<figure>
						<img src="{{{ $item->image_url }}}" alt="" />
						<figcaption>{{{ $item->title }}}</figcaption>
					</figure>
				</aside>

			</div>
		<?php else: ?>
			<div class="alert alert-error span12">
				<h4>{{ Lang::get('messages.error_heading') }}</h4>
				<p>
					{{ Lang::get('messages.empty_listing') }}
				</p>
			</div>
		<?php endif; ?>

	</article>

@stop