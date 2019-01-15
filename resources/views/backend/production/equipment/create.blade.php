@extends('backend._partial.dashboard')

@section('title','Add Equipment For Production Unit')
@section('PageHead','Add Equipment For Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('categories.index')}}">Equipments</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{route('equipments.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Item</label>
                        <input class="form-control  {{($errors->has('item')) ? 'is-invalid' : ''}}" type="text" name="item" placeholder="Enter Item Name. Example: Plain Machine (1+2 Needle)">
                        @if($errors->has('item'))
                            <div class="invalid-feedback">{{$errors->first('item')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input class="form-control  {{($errors->has('name')) ? 'is-invalid' : ''}}" min="0" type="number" name="name" placeholder="">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
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
            </div>
        </div>


@endsection
