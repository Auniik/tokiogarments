@extends('backend._partial.dashboard')

@section('title','Add Equipment')
@section('PageHead','Add Equipment')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('equipment.index') }}">All Equipment</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('equipment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Equipment Image</label>
                        <input class="form-control" type="file" name="image">
                        @if($errors->has('image'))
                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                        @endif
                        <div class="text-secondary">Note: Width and Height of Image should be in 530px * 300px</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Equipment Name</label>
                        <input type="text" class="form-control" name="title" placeholder="Equipment Name">
                        @if($errors->has('title'))
                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Equipment Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Equipment Brand">
                        @if($errors->has('brand'))
                            <strong class="text-danger">{{ $errors->first('brand') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="number" min="0" class="form-control" name="quantity" placeholder="Quantity">
                        @if($errors->has('quantity'))
                            <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                        @endif
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Equipment</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
