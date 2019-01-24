@extends('backend._partial.dashboard')

@section('title','Edit Page')
@section('PageHead','Edit Page')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('pages.index') }}">All Page</a>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('pages.update', $page) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Page Name</label>
                        <input class="form-control {{($errors->has('name')) ? 'is-invalid' : ''}}" type="text" value="{{$page->name}}" name="name" placeholder="Enter page name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Title / Headline</label>
                        <input class="form-control {{($errors->has('title')) ? 'is-invalid' : ''}}" type="text" value="{{$page->title}}" name="title" placeholder="Enter Title / Headline">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">{{$errors->first('title')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">Enter  a unique slug</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><?php echo url('/page')  ?>/</span></div>
                                <input class="form-control {{($errors->has('slug')) ? 'is-invalid' : ''}}" type="text" value="{{$page->slug}}" name="slug">
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('slug')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{--PDF SHOWING--}}
                    @if ($page->pdf_document!=null)
                        <div class="pdf-wrap">
                            <span class="close">&times;</span>
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe class="embed-responsive-item" src="{{url($page->pdf_document)}}" height="300" allowfullscreen></iframe>
                            </div>
                        </div>

                    @endif
                    <div class="form-group">
                        <label class="control-label">PDF document</label>
                        <input class="form-control {{($errors->has('pdf_document')) ? 'is-invalid' : ''}}" type="file" name="pdf_document">
                        @if($errors->has('pdf_document'))
                            <div class="invalid-feedback">{{$errors->first('pdf_document')}}</div>
                        @endif
                    </div>

                    <div class="text-primary text-center">OR</div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control {{($errors->has('description')) ? 'is-invalid' : ''}}" name="description" id="trumbowyg-demo" cols="30" rows="10">{{$page->description}}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
