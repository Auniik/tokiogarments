@extends('backend._partial.dashboard')
@section('title', 'Menus')
@section('PageHead', 'List of All Menus')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('menus.create') }}">Add Menu</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Add Service in Submenu</h3>
                <div class="tile-body">
                    <form action="{{ route('submenus.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if( session()->has('success') )
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        <div class="form-group">
                            <label class="control-label">Submenu Name</label>
                            <input value="{{old('name')}}" class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Submenu name">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label">Slug</label>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Enter  a unique slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><?php echo url('/')  ?>/</span></div>
                                    <input class="form-control {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" value="{{old('slug')}}" name="slug">
                                    @if($errors->has('slug'))
                                        <div class="invalid-feedback">{{$errors->first('slug')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Serial</label>
                                    <input value="{{$data==null ? '1' : $data->serial+1}}" class="form-control {{($errors->has('serial')) ? 'is-invalid' : ''}}" type="number" min="0" name="serial">
                                    @if($errors->has('serial'))
                                        <strong class="text-danger">{{ $errors->first('serial') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1"> Active</option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>





                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-danger">OR</div>
        <div class="col-md-5">
            <div class="tile">
                <h3 class="tile-title">Add Page in Submenu</h3>
                <div class="tile-body">
                    <form action="{{ route('submenus.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if( session()->has('success') )
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        <div class="form-group">
                            <label class="control-label">Submenu Name</label>
                            <input value="{{old('name')}}" class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Submenu name">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>


                        <div class="form-group">
                            <label class="control-label">Serial</label>
                            <input value="{{$data==null ? '1' : $data->serial+1}}" class="form-control {{($errors->has('serial')) ? 'is-invalid' : ''}}" type="number" min="0" name="serial">
                            @if($errors->has('serial'))
                                <strong class="text-danger">{{ $errors->first('serial') }}</strong>
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
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearix"></div>


        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Submenus</h3>
                <div class="tile-body">



                </div>
            </div>
        </div>
    </div>
@stop
