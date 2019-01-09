@extends('backend._partial.dashboard')

@section('title', 'Add User')
@section('PageHead', 'User Profile')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ url('users') }}">Users</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" value="{{old('name')}}" placeholder="Enter name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control @if($errors->has('email')) is-invalid @endif" type="text" name="email" value="{{old('email')}}" placeholder="Enter user email">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control @if($errors->has('password')) is-invalid @endif" type="password" name="password" placeholder="Enter Password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" type="password"  name="password_confirmation" placeholder="Enter Password again">
                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{$errors->first('password_confirmation')}}
                            </div>
                        @endif
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection