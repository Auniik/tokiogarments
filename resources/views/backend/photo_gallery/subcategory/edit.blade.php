@extends('backend._partial.dashboard')

@section('title','Edit Photo Sub Gallery')
@section('PageHead','Edit Photo Sub Gallery')
@section('PageName','Tokio Garments Limited')

@section('PageUrl')
    <a href="{{ route('gallery_name.index') }}">All Photo Gallery</a>
@endsection


@section('content')


    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('sub_category_name.update',$subcategory->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Sub Category Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $subcategory->sub_category_name }}">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="category_id" value="{{ $subcategory->category_id }}">
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
