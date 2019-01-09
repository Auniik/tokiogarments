@extends('backend._partial.dashboard')

@section('title','Add Page')
@section('PageHead','Add Page')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('page.index') }}">All Page</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Page title</label>
                        <input class="form-control" type="text" name="title">
                        @if($errors->has('title'))
                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Page url</label>
                        <input class="form-control" type="text" name="url">
                        @if($errors->has('url'))
                            <strong class="text-danger">{{ $errors->first('url') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Discription</label>
                        <textarea name="discription" id="trumbowyg-demo" cols="30" rows="10"></textarea>
                        @if($errors->has('discription'))
                            <strong class="text-danger">{{ $errors->first('discription') }}</strong>
                        @endif
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
