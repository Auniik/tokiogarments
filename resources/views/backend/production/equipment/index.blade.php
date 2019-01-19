@extends('backend._partial.dashboard')

@section('title','Production Equipments')
@section('PageHead','Production Equipments')
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
            <form action="{{route('production-equipments.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label class="control-label">Item</label>
                    <input class="form-control  {{($errors->has('item')) ? 'is-invalid' : ''}}" type="text" name="item" placeholder="Enter Item Name. Example: Plain Machine (1+2 Needle)">
                    @if($errors->has('item'))
                        <div class="invalid-feedback">{{$errors->first('item')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Quantity</label>
                    <input class="form-control  {{($errors->has('quantity')) ? 'is-invalid' : ''}}" min="0" type="number" name="quantity" placeholder="Enter Equipments quantity">
                    @if($errors->has('quantity'))
                        <div class="invalid-feedback">{{$errors->first('quantity')}}</div>
                    @endif
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
                    <th>Production Unit</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($productionEquipments as $equipment)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $equipment->productionUnit->name }}</td>
                        <td>{{ $equipment->item }}</td>
                        <td>{{ $equipment->quantity }}</td>
                        <td>{{ $equipment->status }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('production-equipments.edit',$equipment) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('production-equipments.destroy',$equipment->id) }}" method="post">
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
