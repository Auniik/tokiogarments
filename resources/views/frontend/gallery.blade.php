@extends('frontend._partial.app')
@section('title', 'Printing')
@section('body')
<div class="single-banner">
	<img src="{{ asset('/') }}frontend/images/banner/01.PNG">
		<div class="banner-content">
	         <h1>gallery</h1>
	         <ol class="banner-list">
	            <li>Home</li>
	            <li><i class="fa fa-angle-right"></i></li>
	            <li><a href="#">kids item</a></li>
	         </ol>
        </div>
</div>
<div class="item-discription section-padding ">
	<div class="container">
		<div class="row">
				<div class="col-lg-7">
					<div class="item-content">
						<h2>New Born Baby</h2>
						<table class="table table-striped table-bordered">
							<thead>
								<th>Items</th>
								<th>Composition</th>
								<th>Construction</th>
							</thead>
							<tr>
								<td>
									<ul class="gallery-facility">
										<li>T-Shirt</li>
										<li>High Neck Shirt</li>
										<li>Roll Neck Shirt</li>
										<li>Romper</li>
										<li>Tanktop</li>
										<li>Suntop</li>
										<li>Polo Shirt</li>
										<li>Dress</li>
										<li>Jacket</li>
										<li>Cardigan</li>
										<li>Pullover</li>
										<li>Hoodie</li>
										<li>Trouser</li>
										<li>Capri Pant</li>
										<li>Scarf</li>
									</ul>
								</td>
								<td>
									<ul class="gallery-facility">
										<li>100% Cotton</li>
										<li>100% Polyester</li>
										<li>95% Cotton, 5% Ealsthan</li>
										<li>90% Cotton, 10% Ealsthan</li>
										<li>95% Cotton, 5% Viscose</li>
										<li>90% Cotton, 10% Viscose</li>
										<li>85% Cotton, 15% Viscose</li>
										<li>90% Cot., 7% Visc., 3% Ela</li>
										<li>60% Cotton, 40% Polyester</li>
										<li>80% Cotton, 20% Polyester</li>
										<li>And So On...</li>
									</ul>
								</td>
								<td>
									<ul class="gallery-facility">
										<li>Single Jersey</li>
										<li>1x1 Rib</li>
										<li>2x1 Rib</li>
										<li>2x2 Rib</li>
										<li>Interlock</li>
										<li>Pique</li>
										<li>Lacoste</li>
										<li>French Terry</li>
										<li>Baby Terry</li>
										<li>Cotton Fleece</li>
										<li>Sweat Fleece</li>
										<li>Polar Fleece</li>
									</ul>
								</td>
								
							</tr>
						</table>
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
<section class="ts-services solid-bg" id="ts-services">
     <div class="container">
        <div class="row text-center">
           <div class="col-md-12">
              <h2 class="section-title"><span>All Baby Product</span>Our baby product</h2>
           </div>
        </div>
        <!-- Title row end-->
        <div class="row ts-service-row-box">
           <div class="col-lg-3 col-md-3">
              <div class="gallery">
                 <div class="ts-service-image-wrapper">
                    <img class="img-fluid" src="{{asset('/')}}frontend/images/services/01.jpg" alt="">
                 </div>
                 <div class="gallery-content">
                    <a href="#"><h3>Air Freight</h3></a>
                 </div>
              </div>
              <!-- Service1 end-->
           </div>
           <div class="col-lg-3 col-md-3">
              <div class="gallery">
                 <div class="ts-service-image-wrapper">
                    <img class="img-fluid" src="{{asset('/')}}frontend/images/services/02.jpg" alt="">
                 </div>
                 <div class="gallery-content">
                    <a href="#"><h3>Air Freight</h3></a>
                 </div>
              </div>
              <!-- Service1 end-->
           </div>
           <div class="col-lg-3 col-md-3">
              <div class="gallery">
                 <div class="ts-service-image-wrapper">
                    <img class="img-fluid" src="{{asset('/')}}frontend/images/services/03.jpg" alt="">
                 </div>
                 <div class="gallery-content">
                    <a href="#"><h3>Air Freight</h3></a>
                 </div>
              </div>
              <!-- Service1 end-->
           </div>
           <div class="col-lg-3 col-md-3">
              <div class="gallery">
                 <div class="ts-service-image-wrapper">
                    <img class="img-fluid" src="{{asset('/')}}frontend/images/services/04.jpg" alt="">
                 </div>
                 <div class="gallery-content">
                    <a href="#"><h3>Air Freight</h3></a>
                 </div>
              </div>
              <!-- Service1 end-->
           </div>

           
        </div>
        <!-- Content row end-->
     </div>
	<!-- Container end-->
</section>
      <!-- Service end-->
@endsection