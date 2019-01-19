@extends('backend._partial.dashboard')

@section('title','Edit Equipment For Production Unit')
@section('PageHead','Edit Equipment For Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-equipments.index')}}">Equipments</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                {{--{{$productionCategory->id}}--}}
                <form action="{{route('production-categories.update', $productionEquipment)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Item</label>
                        <input class="form-control  {{($errors->has('item')) ? 'is-invalid' : ''}}" type="text" name="item" placeholder="Enter Item Name. Example: Plain Machine (1+2 Needle)" value="{{$productionEquipment->item}}">
                        @if($errors->has('item'))
                            <div class="invalid-feedback">{{$errors->first('item')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Production Unit Name</label>
                        <select class="form-control {{($errors->has('production_unit_id')) ? 'is-invalid' : ''}}" name="production_unit_id">
                            <option value=""> --SELECT-- </option>
                            @foreach($productionUnits as $unit)
                                <option {{$unit->id == $productionEquipment->production_unit_id ? 'selected' : ''}} value="{{ $unit->id }}"> {{$unit->name}}</option>
                            @endforeach

                        </select>
                        @if($errors->has('production_unit_id'))
                            <div class="invalid-feedback">{{$errors->first('production_unit_id')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="number" min="0" class="form-control {{($errors->has('quantity')) ? 'is-invalid' : ''}}" name="quantity" placeholder="Enter Item Name. Example: Plain Machine (1+2 Needle)" value="{{$productionEquipment->quantity}}">
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">{{$errors->first('quantity')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option {{$productionEquipment->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                            <option {{$productionEquipment->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Equipment</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
