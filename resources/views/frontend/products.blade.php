@extends('frontend._partial.app')
@section('title', 'Products')
@section('body')
<div class="single-banner">
	<img src="{{ asset('/') }}frontend/images/banner/01.PNG">
		<div class="banner-content">
	         <h1>All Products</h1>
	         <ol class="banner-list">
	            <li>Home</li>
	            <li><i class="fa fa-angle-right"></i></li>
	            <li><a href="#">products</a></li>
	         </ol>
        </div>
</div>	

<div class="all-product">
	<?php $product=DB::table('products')->get();  ?>

		@foreach(json_decode($product->product_image,true) as $image)
			{{ $image }}
		@endforeach

</div>
@endsection