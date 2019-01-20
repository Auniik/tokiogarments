@extends('backend._partial.dashboard')

@section('title','Add Slider image For Production Unit')
@section('PageHead','Add Slider image')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-sliders.index')}}">Production Slider Images</a>
@endsection

@section('content')
    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <form action="{{route('production-sliders.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input class="form-control  {{($errors->has('image')) ? 'is-invalid' : ''}}" type="file" name="image">
                    @if($errors->has('image'))
                        <div class="invalid-feedback">{{$errors->first('image')}}</div>
                    @endif
                    <div class="text-primary">Note: Image size must be in 500px * 500px</div>
                </div>

                <div class="form-group">
                    <label>Production Unit Name</label>
                    <select class="form-control {{($errors->has('production_unit_id')) ? 'is-invalid' : ''}}" name="production_unit_id">
                        <option value="" > --SELECT-- </option>
                        @foreach($productionUnits as $key => $unit)
                            <option value="{{ $key+1 }}" {{ (old("production_unit_id") == $key+1 ? "selected": "") }}>{{ $unit->name }}</option>
                        @endforeach

                    </select>
                    @if($errors->has('production_unit_id'))
                        <div class="invalid-feedback">{{$errors->first('production_unit_id')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1"> Active</option>
                        <option value="0"> Inactive</option>
                    </select>
                </div>

                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Image</button>
                </div>
            </form>

        </div>
    </div>
@endsection
