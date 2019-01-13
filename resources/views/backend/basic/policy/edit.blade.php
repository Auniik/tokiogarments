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
                <form action="{{ route('policy.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Heading</label>
                        <input class="form-control {{($errors->has('heading')) ? 'is-invalid' : ''}}" type="text" name="heading" value="{{ $policy->heading }}">
                        @if($errors->has('heading'))
                            <div class="invalid-feedback">{{$errors->first('heading')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control {{($errors->has('meta_description')) ? 'is-invalid' : ''}}" rows="5">{{ $policy->meta_description }}</textarea>
                        @if($errors->has('meta_description'))
                            <div class="invalid-feedback">{{$errors->first('meta_description')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input class="form-control {{($errors->has('image')) ? 'is-invalid' : ''}}" type="file" name="image">
                        <img class="img-fluid" src="{{url($policy->image)}}"/>
                        @if($errors->has('image'))
                            <div class="invalid-feedback">{{$errors->first('image')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">Policy Description</label>
                        <textarea class="form-control {{($errors->has('policy_description')) ? 'is-invalid' : ''}}"  name="policy_description" id="trumbowyg-demo" cols="30" rows="10">{{ $policy->policy_description}}</textarea>
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
