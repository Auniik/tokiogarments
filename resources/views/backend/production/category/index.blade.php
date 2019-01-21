@extends('backend._partial.dashboard')

@section('title','Categories')
@section('PageHead','Categories')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-units.create')}}">Production Unit</a>
@endsection

@section('content')
    <div class="col-md-9">
        <div class="tile">
            <form action="{{route('production-categories.store')}}" method="post" enctype="multipart/form-data">
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
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Categories</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Production Unit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i = $productionCategories->firstItem())
                @foreach($productionCategories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->productionUnit->name }}</td>
                        <td>{!! status($category->status) !!}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('production-categories.edit',$category) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('production-categories.destroy',$category->id) }}" method="post">
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
            <div>
                {{$productionCategories->links()}}
            </div>
        </div>
    </div>
@endsection
