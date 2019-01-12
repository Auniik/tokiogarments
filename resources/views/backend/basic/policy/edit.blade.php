@extends('backend._partial.dashboard')

@section('title','Edit Policy Page')
@section('PageHead','Edit Policy')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('config.index')}}">Edit Basic Informations</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('policy.update',$policy->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Heading</label>
                        <input class="form-control" type="text" name="title" value="{{ $policy->heading }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <textarea name="meta_discription" class="form-control" rows="5">{{ $policy->meta_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input class="form-control" type="file" name="image">
                        <img class="img-fluid" src="{{url($policy->image)}}"
                    </div>
                    <div class="form-group">
                        <label class="form-label">Policy Description</label>
                        <textarea class="form-control {{($errors->has('policy_description')) ? 'is-invalid' : ''}}"  name="description" id="trumbowyg-demo" cols="30" rows="10">{{ $policy->policy_description}}</textarea>
                        @if($errors->has('policy_description'))
                            <div class="invalid-feedback">{{$errors->first('policy_description')}}</div>
                        @endif
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
