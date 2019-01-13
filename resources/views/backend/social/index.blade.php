@extends('backend._partial.dashboard')

@section('title','Social Profiles')
@section('PageHead','All Social Profiles')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('social.create') }}">Add Social link</a>
@endsection

@section('content')

    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Profile List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Icon</th>
                    <th>Profile Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php( $sl = $socials->firstItem() )
                @foreach($socials as $social)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td><i class="{{ $social->icon }}" style="font-size:36px"></i></td>
                        <td><a href="{{ $social->profile_link }}"> {{ $social->profile_link }}</a></td>
                        @if($social->status==1)
                            <td>
                                <span class="badge badge-success">Active</span>
                            </td>
                        @else
                            <td>
                                <span class="badge badge-danger">Inactive</span>
                            </td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <form action="{{route('route.status', $social)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    @if($social->status==1)
                                        <button type="submit" class="btn btn-sm btn-warning" href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-primary" href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                </form>
                                <form action="{{ route('social.destroy',$social) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger  btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash-o"></i></button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
