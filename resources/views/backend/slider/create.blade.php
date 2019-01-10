@extends('backend._partial.dashboard')

@section('title','Add Slider')
@section('PageHead','Add Slider')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('slider.index') }}">All Slider</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input class="form-control" type="file" name="slider_image">
                        @if($errors->has('slider_image'))
                            <strong class="text-danger">{{ $errors->first('slider_image') }}</strong>
                        @endif
                        <div class="help">[ image size width = 1920 pixels x height = 450 pixels ]</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
