@extends('backend._partial.dashboard')
@section('title', 'Submenus')
@section('PageHead', 'List of All Sub Menus')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('menus.index') }}">Menus</a>
@endsection

@section('content')
    @if( session()->has('success') )
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="row">

        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Add Service in Submenu</h3>
                <div class="tile-body">
                    <form action="{{ route('submenus.store', ['type' => 'service']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Submenu Name</label>
                            <input value="{{old('name')}}" class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Submenu name">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        <input type="hidden" value="{{$menu->id}}" name="menu_id">

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
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Sub Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1 divider"><p>OR</p></div>
        <div class="col-md-5">
            <div class="tile">
                <h3 class="tile-title">Add Page in Submenu</h3>
                <div class="tile-body">
                    <form action="{{ route('submenus.store', ['type' => 'page']) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="menu_id" value="{{$menu->id}}">

                        <div class="form-group">
                            <label>Page Name</label>
                            <select class="form-control {{($errors->has('page_id')) ? 'is-invalid' : ''}}" name="page_id" >
                                <option value=""> Select One</option>
                                @foreach($pages as $key => $page)
                                    <option value="{{$page->id}}"> {{$page->name}}</option>
                                @endforeach

                            </select>
                            @if($errors->has('page_id'))
                                <div class="invalid-feedback">{{$errors->first('page_id')}}</div>
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
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Sub Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearix"></div>


        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">List of Submenus</h3>
                <div class="tile-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sub Sub menu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $sl = $submenus->firstItem())
                        @foreach($submenus as $key => $submenu)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $submenu->name }}</td>
                                <td><a target="_blank" href="{{ url('/'.$submenu->slug) }}">{{ url('/'.$submenu->slug) }}</a></td>
                                <td><a class="btn btn-sm btn-outline-secondary" href="{{url('sub-submenus/'.$submenu->id)}}">Sub Sub menu</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm"  href="{{ route('submenus.edit', $submenu) }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('submenus.destroy', $submenu) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash-o"></i></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
