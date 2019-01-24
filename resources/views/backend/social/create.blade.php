@extends('backend._partial.dashboard')

@section('title','Add Social Link')
@section('PageHead','Add Social Profiles')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <!-- <a href="{{ route('social.index') }}">All Social</a> -->
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('social.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="form-group">
                        <label>Social Name</label>
                        <select id="icon" class="form-control @if($errors->has('icon')) is-invalid @endif" name="icon">
                            <option value="">--Select Social Name--</option>
                            <option value="fa fa-facebook"> Facebook</option>
                            <option value="fa fa-twitter"> Twitter</option>
                            <option value="fa fa-skype"> Skype</option>
                            <option value="fa fa-google"> Google+</option>
                            <option value="fa fa-instagram"> Instagram</option>
                            <option value="fa fa-linkedin"> Linkedin</option>
                            <option value="fa fa-reddit"> Reddit</option>
                            <option value="fa fa-pinterest"> Pinterest</option>
                            <option value="fa fa-tumblr"> Tumblr</option>
                            <option value="fa fa-vine"> Vine</option>
                            @if($errors->has('icon'))
                                <div class="help-block">{{$errors->first('icon')}}</div>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Profile Link</label>
                        <input class="form-control {{($errors->has('profile_link')) ? 'is-invalid' : ''}}" type="text" name="profile_link" value="{{ old('profile_link') }}" placeholder="example: http://www.facebook.com/deaddatta">
                        <div class="text-warning">Note: Use valid url of social profile link</div>
                        @if($errors->has('profile_link'))
                            <div class="invalid-feedback">{{$errors->first('profile_link')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Profile</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
