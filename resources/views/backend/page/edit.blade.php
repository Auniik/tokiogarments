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
                <form action="{{ route('page.update',$page->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Page title</label>
                        <input class="form-control" type="text" value="{{ $page->title }}" name="title">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Page url</label>
                        <input class="form-control" type="text" name="url" value="{{ $page->url }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Discription</label>
                        <textarea name="discription" id="trumbowyg-demo" cols="30" rows="10">
                            {{ $page->discription }}
                        </textarea>
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
