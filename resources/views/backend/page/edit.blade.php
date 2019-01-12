@extends('backend._partial.dashboard')

@section('title','Edit Page')
@section('PageHead','Edit Page')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('page.index') }}">All Page</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('page.update', $page) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif
                    <div class="form-group">
                        <label class="control-label">Page title</label>
                        <input class="form-control" type="text" value="{{ $page->title }}" name="title">
                        @if($errors->has('title'))
                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">Enter  a unique slug</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><?php echo url('/')  ?>/</span></div>
                                <input class="form-control" type="text" name="url" value="{{ $page->url }}">
                                @if($errors->has('url'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('url')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="control-label">Page url</label>--}}
                        {{--<input class="form-control" type="text" name="url" value="{{ $page->url }}">--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="trumbowyg-demo" cols="30" rows="10">{{ $page->description }}</textarea>
                        @if($errors->has('description'))
                            <strong class="text-danger">{{ $errors->first('description') }}</strong>
                        @endif
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
