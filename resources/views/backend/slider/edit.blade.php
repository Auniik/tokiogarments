@extends('backend._partial.dashboard')

@section('title','Edit Slider Image')
@section('PageHead','Edit Slider Image')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('slider.index') }}">Slider</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input class="form-control" type="file" name="slider_image">
                        <img class="large-img" src="{{ url($slider->slider_image) }}">
                        <div class="text-secondary">Note: image size width = 1600 pixels x height = 800 pixels</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
