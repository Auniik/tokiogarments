@extends('backend._partial.dashboard')

@section('title','Edit config Information')
@section('PageHead','Edit config Information')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{url('config/policy')}}">Edit Policy</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('config.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Company Logo</label>
                        <img class="small-img" src="{{ url($config->logo) }}">
                        <input class="form-control" type="file" name="logo">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input class="form-control" type="text" name="title" value="{{ $config->title }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{ $config->phone }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Additional Phone Numbers</label>
                        <input class="form-control" type="text" name="additional_phones" value="{{ $config->additional_phones }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $config->email }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="5">{{ $config->meta_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Keywords</label>
                        <input class="form-control" type="text" name="keywords" value="{{ $config->keywords }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slogan</label>
                        <input class="form-control" type="text" name="slogan" value="{{ $config->slogan }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input class="form-control" type="text" name="address" value="{{ $config->address }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map</label>
                        <textarea name="location" class="form-control" rows="5">{{ $config->location }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Facebook Page</label>
                        <input class="form-control" type="text" name="facebook_page" value="{{ $config->facebook_page }}">
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
