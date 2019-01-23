@extends('backend._partial.dashboard')

@section('title','Add Image to Slider')
@section('PageHead','Add Image Slider')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('slider.index') }}">Slider Images</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input class="form-control" type="file" name="slider_image">
                        @if($errors->has('slider_image'))
                            <strong class="text-danger">{{ $errors->first('slider_image') }}</strong>
                        @endif
                        <div class="text-secondary">Note: image size width = 1600 pixels x height = 800 pixels</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
