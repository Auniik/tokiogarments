@extends('backend._partial.dashboard')

@section('title','Edit Category For Production Unit')
@section('PageHead','Edit Category For Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-categories.index')}}">Categories</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                {{--{{$productionCategory->id}}--}}
                <form action="{{route('production-categories.update', $productionCategory)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control  {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Item Name. Example: Plain Machine (1+2 Needle)" value="{{$productionCategory->name}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Production Unit Name</label>
                        <select class="form-control {{($errors->has('production_unit_id')) ? 'is-invalid' : ''}}" name="production_unit_id">
                            <option value=""> --SELECT-- </option>
                            @foreach($productionUnits as $key => $unit)
                                {{--{{dd($unit)}}--}}
                                <option {{$unit->id == $productionCategory->production_unit_id ? 'selected' : ''}} value="{{ $unit->id }}"> {{$unit->name}}</option>
                                {{--<option value="{{ $key+1 }}" {{ (old("production_unit_id") == $key+1 ? "selected": "") }}>{{ $unit->name }}</option>--}}
                            @endforeach

                        </select>
                        @if($errors->has('production_unit_id'))
                            <div class="invalid-feedback">{{$errors->first('production_unit_id')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option {{$productionCategory->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                            <option {{$productionCategory->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
