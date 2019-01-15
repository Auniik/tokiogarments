@extends('backend._partial.dashboard')

@section('title', 'Add User')
@section('PageHead', 'User Profile')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ url('users/create') }}">Add User</a>
@endsection

@section('content')
    <div class="col-md-9">
        <div class="tile">
            @if( session()->has('success') )
                <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div><br>
            @endif

            <h3 class="tile-title">User List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($users as $key => $user)
{{--                    {{dd($admin->id==$user->id)}}--}}
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group">

                                <a class="btn btn-warning btn-sm" href="" target="_blank"><i class="fa fa-eye"></i></a>

                                @if($key==0 && ($admin->id==$user->id))
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                @else
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                    {{--<a class="btn btn-primary btn-sm" href="#"><i class="fa fa-edit"></i></a>--}}
                                @endif
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" {{ $key==0 ? 'disabled' : '' }} class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash-o"></i></button>
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
