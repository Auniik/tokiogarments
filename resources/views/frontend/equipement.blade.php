@extends('frontend._partial.app')
@section('title', 'Equipment')
@section('body')
<div class="single-banner">
	<img src="{{ asset('/') }}frontend/images/banner/01.PNG">
		<div class="banner-content">
	         <h1>Equipment</h1>
	         <ol class="banner-list">
	            <li>Home</li>
	            <li><i class="fa fa-angle-right"></i></li>
	            <li><a href="#">Equipment</a></li>
	         </ol>
        </div>
</div>
<div class="equipment section-padding">
	<div class="container">
		<div class="row text-center">
           <div class="col-md-12">
              <h2 class="section-title"><span>Our Equipment</span>Our Equipment</h2>
           </div>
        </div>
        @foreach($equipments as $equipment)
        	<div class="col-md-4">
        		<div class="equipment-item">
        			<div class="equipment-thumb">
        				<img src="{{ asset('/') }}frontend/images/equipment/02.jpeg">
        			</div>
        			<div class="equipment-content">
        				<h4>PLAIN MACHINE (1 NEEDLE)</h4>
        				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
						  Details
						</button>
        			</div>
        		</div>
        	</div>
		@endforeach
        </div>
	</div>
</div>
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<img src="{{ asset('/') }}frontend/images/equipment/01.jpeg">
        <h3><strong>Category :</strong> Machinery</h3>
        <h3><strong>Name :</strong> PLAIN MACHINE (1 NEEDLE)</h3>
        <h3><strong>Brand Name / Model :</strong>SIRUBA / PEGASUS / JUKI / BROTHERS</h3>
        <h3><strong>Quantity :</strong> 110</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection