@extends('backend._partial.dashboard')

@section('title', 'Menus')
@section('PageHead', 'List of All Menus')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ url('menus/create') }}">Add Menu</a>
@endsection

@section('content')
    <div class="col-md-9">
        <div class="tile">
            @if( session()->has('success') )
                <div class="alert-success notify"> <p>{{ Session::get('success') }}</p> </div><br>
            @endif

            <h3 class="tile-title">Menu List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php( $sl = $menus->firstItem();)
                @foreach($menus as $key => $menu)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->parent_id }}</td>
                        <td>{{ $menu->slug }}</td>
                        <td>{{ $menu->email }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-warning btn-sm" href="" target="_blank"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$menu->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('users.destroy',$menu->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash-o"></i></button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop
