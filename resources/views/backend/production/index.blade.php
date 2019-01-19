@extends('backend._partial.dashboard')

@section('title','Production Unit')
@section('PageHead','Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-unit.index')}}">Production Unit</a>
@endsection

@section('content')
    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            {{--<div class="tile-body">--}}
            <form action="{{route('production-unit.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control  {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Unit Name. example: Cutting/Embroidery">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Slug</label>
                    <input class="form-control  {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" name="slug" placeholder="Enter slug. example: cutting">
                    <div class="text-primary">Note: Slug must be unique</div>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">{{$errors->first('slug')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Floor Space</label>
                    <input class="form-control  {{($errors->has('space')) ? 'is-invalid' : ''}}" type="text" name="space" placeholder="Enter Floor Space for this unit">
                    @if($errors->has('space'))
                        <div class="invalid-feedback">{{$errors->first('space')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Capacity</label>
                    <input class="form-control {{($errors->has('capacity')) ? 'is-invalid' : ''}}" type="text" name="capacity" placeholder="Enter Capacity">
                    @if($errors->has('capacity'))
                        <div class="invalid-feedback">{{$errors->first('capacity')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Image Details</label>
                    <textarea class="form-control {{($errors->has('image_details')) ? 'is-invalid' : ''}}" name="image_details" placeholder="Enter Images short description.(Max 190 characters)"></textarea>
                    @if($errors->has('image_details'))
                        <div class="invalid-feedback">{{$errors->first('image_details')}}</div>
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
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Equipment</button>
                </div>
            </form>
            {{--</div>--}}

            <hr>
            <h3 class="tile-title">Equipments</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Floor Space</th>
                    <th>Capacity</th>
                    <th>Image Details</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($productionUnits as $unit)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->slug }}</td>
                        <td>{{ $unit->space }}</td>
                        <td>{{ $unit->capacity }}</td>
                        <td>{{ $unit->image_details }}</td>
                        <td>{{ $unit->status }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('production-unit.edit',$unit) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('production-unit.destroy',$unit) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash"></i></button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
