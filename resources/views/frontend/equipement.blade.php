@extends('frontend._partial.app')
@section('title', 'Equipments')
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
			<div class="row">

				@foreach($equipments as $equipment)
				<div class="col-md-4">
						<div class="equipment-item">
							<div class="equipment-thumb">
								<img src="{{ url($equipment->image)}}">
							</div>
							<div class="equipment-content">
								<h4>{{$equipment->title}}</h4>
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal-{{$equipment->id}}">
									Details
								</button>
							</div>
						</div>

				</div>
				@endforeach
			</div>

        </div>
	</div>
</div>
	<!-- Modal -->
@foreach($equipments as $equipment)
<div class="modal fade" id="myModal-{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

          <div class="modal-body">
            <img src="{{ url($equipment->image)}}">
            {{--<h3><strong>Category :</strong> Machinery</h3>--}}
            <h3><strong>Name :</strong> {{ $equipment->title}}</h3>
            <h3><strong>Brand Name / Model :</strong> {{ $equipment->brand}}</h3>
            <h3><strong>Quantity : </strong> {{ $equipment->quantity }}</h3>
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection