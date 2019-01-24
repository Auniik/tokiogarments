@extends('backend._partial.dashboard')

@section('title','Edit Menu')
@section('PageHead','Edit Menu')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('menus.index') }}">Menus</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('menus.update', $menu) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Menu Name</label>
                        <input value="{{$menu->name}}" class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Enter Menu name">
                        @if($errors->has('name'))
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input value="{{$menu->slug}}" class="form-control {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" name="slug" placeholder="Enter Unique Slug">
                        @if($errors->has('slug'))
                            <strong class="text-danger">{{ $errors->first('slug') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Serial</label>
                        <input value="{{$menu->serial}}" class="form-control {{($errors->has('serial')) ? 'is-invalid' : ''}}" type="number" min="0" name="serial">
                        @if($errors->has('serial'))
                            <strong class="text-danger">{{ $errors->first('serial') }}</strong>
                        @endif
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
