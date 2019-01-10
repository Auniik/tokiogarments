@extends('backend._partial.dashboard')

@section('title','Edit Slider')
@section('PageHead','Edit Slider')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('slider.index') }}">All Slider</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Slider Image</label>
                        <input class="form-control" type="file" name="slider_image">
                        <img class="large-img" src="{{ url($slider->slider_image) }}">
                        <div class="help">[ image size width = 1920 pixels x height = 450 pixels ]</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
