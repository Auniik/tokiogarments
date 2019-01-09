@extends('backend._partial.dashboard')

@section('title','User Profile')
@section('PageHead','User Profile')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ url('edit-user') }}">Edit Now</a>
@endsection

@section('content')

    <div class="col-md-6">
        <div class="tile">
            <div class="tile-body">
                <form>
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" placeholder="Enter email address">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Retype Password</label>
                        <input class="form-control" type="password" placeholder="Retype Password">
                    </div>

                </form>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Now</button>
            </div>
        </div>
    </div>

@endsection