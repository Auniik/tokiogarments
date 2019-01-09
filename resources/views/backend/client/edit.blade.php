@extends('backend._partial.dashboard')

@section('title','Edit Client')
@section('PageHead','Edit Client')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('client.index') }}">All Client</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('client.update',$client->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Client Image</label>
                        <input class="form-control" type="file" name="client_image">
                        <img class="small-img" src="{{ url($client->client_image) }}">
                        <div class="help">[ image size width = 130 pixels x height = 80 pixels ]</div>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
