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
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Page title</label>
                        <input class="form-control  {{($errors->has('title')) ? 'is-invalid' : ''}}" type="text" name="title">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">{{$errors->first('title')}}</div>
                        @endif
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="control-label">Page url</label>--}}
                        {{--<input class="form-control" type="text" name="url">--}}
                        {{--@if($errors->has('url'))--}}
                            {{--<strong class="text-danger">{{ $errors->first('url') }}</strong>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control {{($errors->has('description')) ? 'is-invalid' : ''}}"  name="description" id="trumbowyg-demo" cols="30" rows="10"></textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
