@extends('backend._partial.dashboard')

@section('title','All Photo Gallery')
@section('PageHead','All photo Gallery')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('gallery.create') }}">Add New Photo</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Gallery Image</label>
                        <input class="form-control" type="file" name="image">
                        @if($errors->has('image'))
                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                        @endif
                        <div class="help">[ image size width = 640 pixels x height = 320 pixels ]</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" name="title">
                        @if($errors->has('title'))
                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sub Category</label>
                        <select class="form-control" name="sub_category_id">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Discription</label>
                        <textarea name="discription" id="trumbowyg-demo" cols="30" rows="10" class="form-control"></textarea>
                        @if($errors->has('discription'))
                            <strong class="text-danger">{{ $errors->first('discription') }}</strong>
                        @endif
                    </div>



                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection