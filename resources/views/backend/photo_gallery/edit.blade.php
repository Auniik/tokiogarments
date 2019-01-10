@extends('backend._partial.dashboard')

@section('title','Add Photo Gallery')
@section('PageHead','Add photo Gallery')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('gallery_name.index') }}">All Photo Gallery</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('gallery_name.update',$category) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Gallery Name</label>
                        <input class="form-control" type="text" name="gallery_name" value="{{ $category->category_name }}">
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection