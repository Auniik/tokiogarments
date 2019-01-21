@extends('backend._partial.dashboard')

@section('title','Edit Slider image For Production Unit')
@section('PageHead','Edit Slider image')
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
            <form action="{{route('production-sliders.update', $productionSlider)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')


                <div class="form-group">
                    <label class="control-label">Image</label>
                    <img class="small-img img-thumbnail" src="{{url($productionSlider->image)}}" alt="Production Slider Image">
                    <input class="form-control  {{($errors->has('image')) ? 'is-invalid' : ''}}" type="file" name="image">

                    @if($errors->has('image'))
                        <div class="invalid-feedback">{{$errors->first('image')}}</div>
                    @endif
                    <div class="text-primary">Note: Image size must be in 500px * 500px</div>
                </div>

                <div class="form-group">
                    <label>Production Unit Name</label>
                    <select class="form-control {{($errors->has('production_unit_id')) ? 'is-invalid' : ''}}" name="production_unit_id">
                        <option value=""> --SELECT-- </option>
                        @foreach($productionUnits as $unit)
                            <option {{$unit->id == $productionSlider->production_unit_id ? 'selected' : ''}} value="{{ $unit->id }}"> {{$unit->name}}</option>
                        @endforeach

                    </select>
                    @if($errors->has('production_unit_id'))
                        <div class="invalid-feedback">{{$errors->first('production_unit_id')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option {{$productionSlider->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                        <option {{$productionSlider->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
                    </select>
                </div>

                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                </div>
            </form>

        </div>
    </div>
@endsection
