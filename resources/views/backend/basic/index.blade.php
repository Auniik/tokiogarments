@extends('backend._partial.dashboard')

@section('title','Edit Basic Information')
@section('PageHead','Edit Basic Information')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="#">Edit Basic Info</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('basic.update',$basic->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                    <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Change Company Logo</label>
                        <img class="small-img" src="{{ url($basic->logo) }}">
                        <input class="form-control" type="file" name="logo">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input class="form-control" type="text" name="title" value="{{ $basic->title }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input class="form-control" type="phone" name="phone" value="{{ $basic->phone }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $basic->email }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Discription</label>
                        <textarea name="meta_discription" class="form-control" rows="5">{{ $basic->meta_discription }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Keywords</label>
                        <input class="form-control" type="text" name="keywords" value="{{ $basic->keywords }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slogan</label>
                        <input class="form-control" type="text" name="slogan" value="{{ $basic->slogan }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input class="form-control" type="text" name="address" value="{{ $basic->address }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map</label>
                        <textarea name="location" class="form-control" rows="5">{{ $basic->location }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Facebook Page</label>
                        <input class="form-control" type="text" name="facebook_page" value="{{ $basic->facebook_page }}">
                    </div>


            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Now</button>
            </div>
            </form>
        </div>
    </div>


@endsection
