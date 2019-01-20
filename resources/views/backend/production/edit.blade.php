@extends('backend._partial.dashboard')

@section('title','Edit Production Unit')
@section('PageHead','Edit Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-units.index')}}">Production Unit</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{route('production-units.update', $productionUnit)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control  {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Unit Name. example: Cutting/Embroidery" value="{{$productionUnit->name}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input class="form-control  {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" name="slug" placeholder="Enter slug. example: cutting" value="{{$productionUnit->slug}}">
                        <div class="text-primary">Note: Slug must be unique</div>
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">{{$errors->first('slug')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Floor Space</label>
                        <input class="form-control  {{($errors->has('space')) ? 'is-invalid' : ''}}" type="text" name="space" placeholder="Enter Floor Space for this unit" value="{{$productionUnit->space}}">
                        @if($errors->has('space'))
                            <div class="invalid-feedback">{{$errors->first('space')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Capacity</label>
                        <input class="form-control  {{($errors->has('capacity')) ? 'is-invalid' : ''}}" type="text" name="capacity" placeholder="Enter Capacity" value="{{$productionUnit->capacity}}">
                        @if($errors->has('capacity'))
                            <div class="invalid-feedback">{{$errors->first('capacity')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Image Details</label>
                        <textarea class="form-control {{($errors->has('image_details')) ? 'is-invalid' : ''}}" name="image_details" placeholder="Enter Images short description.(Max 190 characters)">{{$productionUnit->image_details}}</textarea>
                        @if($errors->has('image_details'))
                            <div class="invalid-feedback">{{$errors->first('image_details')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option {{$productionUnit->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                            <option {{$productionUnit->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
