@extends('backend._partial.dashboard')

@section('title','Edit Photo Gallery')
@section('PageHead','Edit Photo Gallery')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('gallery-categories.index') }}">All Photo Gallery</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('gallery-categories.update',$category) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Gallery Category Name</label>
                        <input class="form-control" type="text" name="gallery_name" value="{{ $category->category_name }}">
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
