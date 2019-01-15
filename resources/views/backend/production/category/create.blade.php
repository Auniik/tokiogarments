@extends('backend._partial.dashboard')

@section('title','Add Category for Production Unit')
@section('PageHead','Add Category for Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('categories.index')}}">Categories</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control  {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Category Name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label></label>
                        <select class="form-control" name="category">
                            <option value=""> --SELECT-- </option>
                            @foreach($categories as $category)
                                <option value="{{$category->productionUnit->id}}"> {{$category->productionUnit->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Category</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
