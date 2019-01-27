@extends('backend._partial.dashboard')

@section('title','Add Basic Site Configuration')
@section('PageHead','Add Basic Site Configuration')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{url('config/policy')}}">Edit Policy</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('config.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Company Logo</label>
                        <input class="form-control {{($errors->has('logo')) ? 'is-invalid' : ''}}" type="file" name="logo">
                        @if($errors->has('logo'))
                            <div class="help-block">{{$errors->first('logo')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input class="form-control  {{($errors->has('title')) ? 'is-invalid' : ''}}" type="text" name="title" placeholder="Enter Company name" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <div class="help-block">{{$errors->first('title')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input class="form-control {{($errors->has('phone')) ? 'is-invalid' : ''}}" type="text" name="phone" placeholder="Enter 24/7 active phone number" value="{{ old('phone') }}">
                        @if($errors->has('phone'))
                            <div class="help-block">{{$errors->first('phone')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Additional Phone Numbers</label>
                        <textarea class="form-control {{($errors->has('additional_phones')) ? 'is-invalid' : ''}}" type="text" name="additional_phones" placeholder="Example: +088018937476, +088018956576, +088018954676">{{ old('additional_phones') }}</textarea>
                        @if($errors->has('additional_phones'))
                            <div class="help-block">{{$errors->first('additional_phones')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control {{($errors->has('email')) ? 'is-invalid' : ''}}" type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="help-block">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control {{($errors->has('meta_description')) ? 'is-invalid' : ''}}" rows="5">{{ old('meta_description') }}</textarea>
                        @if($errors->has('meta_description'))
                            <div class="help-block">{{$errors->first('meta_description')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Keywords</label>
                        <input class="form-control {{($errors->has('keywords')) ? 'is-invalid' : ''}}" type="text" name="keywords" value="{{ old('keywords') }}">
                        @if($errors->has('keywords'))
                            <div class="help-block">{{$errors->first('keywords')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Slogan</label>
                        <input class="form-control {{($errors->has('slogan')) ? 'is-invalid' : ''}}" type="text" name="slogan" value="{{ old('slogan') }}">
                        @if($errors->has('slogan'))
                            <div class="help-block">{{$errors->first('slogan')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input class="form-control {{($errors->has('address')) ? 'is-invalid' : ''}}" type="text" name="address" value="{{ old('address') }}">
                        @if($errors->has('address'))
                            <div class="help-block">{{$errors->first('address')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Google Map</label>
                        <textarea name="location" class="form-control {{($errors->has('location')) ? 'is-invalid' : ''}}" rows="5">{{ old('location') }}</textarea>
                        @if($errors->has('location'))
                            <div class="help-block">{{$errors->first('location')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Facebook Page</label>
                        <input class="form-control {{($errors->has('facebook_page')) ? 'is-invalid' : ''}}" type="text" name="facebook_page" value="{{ old('facebook_page') }}">
                        @if($errors->has('facebook_page'))
                            <div class="help-block">{{$errors->first('facebook_page')}}</div>
                        @endif
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Changes</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
