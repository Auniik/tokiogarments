@extends('backend._partial.dashboard')
@section('title', 'Submenus')
@section('PageHead', 'Edit Submenu')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('menus.index') }}">Menus</a>
@endsection

@section('content')
    @if( session()->has('success') )
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="row">

        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Add Page in Submenu</h3>
                <div class="tile-body">
                    <form action="{{ route('submenus.update', $submenu) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label class="control-label">Submenu Name</label>
                            <input class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" value="{{$submenu->name}}" name="name" placeholder="Enter submenu name">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                            @endif
                        </div>

                        <input type="hidden" name="menu_id" value="{{$submenu->menu_id}}">

                        <div class="form-group">
                            <label class="control-label">Slug</label>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Enter  a unique slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><?php echo url('/')  ?>/</span></div>
                                    <input class="form-control {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" value="{{$submenu->slug}}" name="slug">
                                    @if($errors->has('slug'))
                                        <div class="invalid-feedback">{{$errors->first('slug')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Serial</label>
                            <input value="{{$submenu->serial}}" class="form-control" type="number" min="0" name="serial">
                            @if($errors->has('serial'))
                                <strong class="text-danger">{{ $errors->first('serial') }}</strong>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select id="status" class="form-control" name="status">
                                <option {{$submenu->status ? 'selected' : ''}} value="1"> Active</option>
                                <option {{$submenu->status ? '' : 'selected'}} value="0"> Inactive</option>
                            </select>
                        </div>

                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearix"></div>
    </div>
@stop
