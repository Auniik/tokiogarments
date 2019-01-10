@extends('frontend._partial.app')
@section('title', 'Printing')
@section('body')
<div class="single-banner">
	<img src="{{ asset('/') }}frontend/images/banner/01.PNG">
		<div class="banner-content">
	         <h1>Printing</h1>
	         <ol class="banner-list">
	            <li>Home</li>
	            <li><i class="fa fa-angle-right"></i></li>
	            <li><a href="#">printing</a></li>
	         </ol>
        </div>
</div>
<div class="item-discription section-padding ">
	<div class="container">
		<div class="row">
				<div class="col-lg-7">
					<div class="item-content">
						<h2>Our Prnting Facility</h2>
						<p><strong>Flooar Space :</strong>10,000 Square Feet</p>
						<p><strong>Capacity :</strong>Approx. Capacity : 10,000 Pcs / Day</p>
						<p class="printing-equi text-center">
							<span> <strong>:: Producing Prints ::</strong></span>
							<ul class="product-item">
								<li>Pigment</li>
								<li>Rubber</li>
								<li>Glitter</li>
								<li>Plastisol</li>
								<li>Discharge</li>
							</ul>
							<ul class="product-item">
								<li>Aquarrel</li>
								<li>Foil</li>
								<li>Pearl</li>
								<li>Puff</li>
								<li>Flock</li>
							</ul>
							<ul class="product-item">
								<li>High Density</li>
								<li>Heat Transfer</li>
								<li>Embossed</li>
								<li>Radium</li>
								<li>And so on..</li>
							</ul>
						</p>
						<p class="printing-equi text-center">
							<strong>:: Equipments ::</strong>
							<table class="table table-bordered table-striped">
								<thead>
									<th>Item</th>
									<th>Quality</th>
								</thead>
								<tr>
									<td>Printing Table - 65 X 5.5 Feet</td>
									<td>02</td>
								</tr>
								<tr>
									<td>Printing Table - 56 X 5.5 Feet</td>
									<td>02</td>
								</tr>
								<tr>
									<td>Printing Table - 55 X 4.5 Feet</td>
									<td>01</td>
								</tr>
								<tr>
									<td>Belt Curing Machine - 22 Feet</td>
									<td>01</td>
								</tr>
								<tr>
									<td>Auto Heatpress Curing Machine</td>
									<td>02</td>
								</tr>
							</table>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="feature-item">
						<img src="{{ asset('/') }}frontend/images/product/01.jpg">
						<h2><strong>Image:</strong>Our Printing  Product</h2>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection