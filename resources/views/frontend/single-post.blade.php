@extends('frontend._partial.app')
@section('title', 'Post')
@section('body')

	<section class="single-banner" style="background:url({{asset('/')}}frontend/images/banner/01.png)fixed no-repeat;">
		<div class="container">
			<div class="row">
				<h2 class="single-banner-title">{!! $pages->page_url !!}</h2>
			</div>
		</div>
	</section>

	<section class="discription" style="padding: 30px 0px">
		<div class="container">
			<div class="row">
				{!! $pages->page_discription !!}
			</div>
		</div>
		
	</section>

@endsection