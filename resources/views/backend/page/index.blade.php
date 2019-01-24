@extends('backend._partial.dashboard')

@section('title','All Page')
@section('PageHead','All Page')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('pages.create') }}">Add Page</a>
@endsection

@section('content')

    <div class="col-md-9">
                @if( session()->has('success') )
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <div class="tile">
            <h3 class="tile-title">Page List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-warning btn-sm" href="{{ url($page->slug) }}" target="_blank"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('pages.edit',$page->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('pages.destroy',$page->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash"></i></button>
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
