@extends('backend._partial.dashboard')

@section('title','Add Photo Sub Gallery')
@section('PageHead','Add photo Sub Gallery')
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

                    @if( session()->has('update') )
                        <div class="alert-success notify"> <p>{{ Session::get('update') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Sub Category Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $subcategory->sub_category_name }}">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="category_id" value="{{ $subcategory->category_id }}">
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection