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
			<ul class="col-md-8 policy-list">
				<h2>Our Policy</h2>
				<p>We have designed our QC process as per international standards to meet customer's requirements and committed to provide the satisfactory quality level to our customers.</p>
				<ol style="list-style: lower-alpha;" class="policy">
					<h3>There are following 4 steps in our QC process:</h3>
					<li>a.Sampling QC</li>
					<li>b.Received Materials QC</li>
					<li>c.Production/In-Line QC</li>
					<li>d.Finished product/Final QC</li>
				</ol>
				<span>Each QC process needs to check various points based on different criteria as per customer requirements.</span>
			</ul>
			<ul class="col-md-8 policy-discription">
				<li>
					<h3>a.Sampling QC:</h3>
					<p>Samples are checked at the different stages of production like Salesman sample, Fitting sample, Pre-Production sample and Production sample etc.</p>
				</li>
				<li>
					<h3>b.Received Materials QC:</h3>
					<p>Upon receipt the raw material we check it to make sure it is as per the requirement. For the fabric quality generally Yarn fault, Shading, Weight (gsm), Shrinkage etc. are checked. Different accessories and other raw materials are also checked as per requirements.</p>
				</li>
				<li>
					<h3>c.Production QC:</h3>
					<p>Production QC is performed in following steps:
						<ul>
							<li>Procurement:- In-house inventory is performed as per approved sample.</li>
							<li>Pre-production:- Pattern, Marker, Consumption, Fabrics, Accessories and all approved samples are checked.</li>
							<li>Cutting:- Fabric is inspected and all cutting parts are checked.</li>
							<li> Sewing:- Front part, back part and other parts are checked and randomly assembling process are inspected. At the end of line final table inspection is performed. At the check point faulty bundle is returned to the responsible worker to redo the operation.</li>
							<li><img src="{{ asset('/') }}frontend/images/policy/01.jpg"></li>
						</ul>
					</p>
				</li>
				<li>
					<h3>d.Finished product QC:</h3>
					<p>In this final step generally following points are checked workmanship process, measurement, getup, folding, broken-needle, ironing and packing.</p>
					<span>Finally, only the qualified garments are get ready to dispatch for shipment.</span>
					<img src="{{ asset('/') }}frontend/images/policy/02.jpg">
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection