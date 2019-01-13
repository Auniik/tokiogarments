@extends('frontend._partial.app')
@section('title', 'Policy')
@section('body')
<div class="single-banner">
	<img src="{{ asset('/') }}frontend/images/banner/01.PNG">
		<div class="banner-content">
	         <h1>Policy</h1>
	         <ol class="banner-list">
	            <li>Home</li>
	            <li><i class="fa fa-angle-right"></i></li>
	            <li><a href="#">policy</a></li>
	         </ol>
        </div>
</div>
<div class="our-policy section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-8 policy-list">
				<h2>{{ is_null($policy) ? 'Page heading here' : $policy->heading }}</h2>
				<p>{{ is_null($policy) ? 'Meta description here' : $policy->meta_description }}</p>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<img class="img-fluid card-img" src="{{is_null($policy) ? '' : url($policy->image)}}" alt=""><br><br>
				{!! is_null($policy) ? 'Description starts here' : $policy->policy_description !!}
			</div>
		</div>
	</div>
</div>
@endsection
