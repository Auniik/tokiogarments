@extends('backend._partial.dashboard')

@section('title','Edit Equipment')
@section('PageHead','Edit Equipment')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('equipment.index') }}">All Equipment</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('equipment.update',$equipment->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Equipment Image</label>
                        <input class="form-control" type="file" name="equipment_image">
                        <div class="help">[ image size width = 530 pixels x height = 300 pixels ]</div>
                        <img src="{{ url($equipment->image) }}" class="large-img">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Equipment Name</label>
                        <input type="text" class="form-control" name="title" value="{{ $equipment->title }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Equipment Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{ $equipment->brand }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $equipment->quantity }}">
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection