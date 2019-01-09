@extends('backend._partial.dashboard')

@section('title','Add Client')
@section('PageHead','Add Client')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('client.index') }}">All Client</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Client Image</label>
                        <input class="form-control" type="file" name="client_image">
                        @if($errors->has('client_image'))
                            <strong class="text-danger">{{ $errors->first('client_image') }}</strong>
                        @endif
                        <div class="help">[ image size width = 130 pixels x height = 80 pixels ]</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
