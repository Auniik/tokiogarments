@extends('backend._partial.dashboard')

@section('title','All Page')
@section('PageHead','All Page')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('page.create') }}">Add Page</a>
@endsection

@section('content')

    <div class="col-md-9">
        <div class="tile">
            <h3 class="tile-title">Page List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>View Page</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url(str_slug($page->title)) }}" target="_blank"><i class="fa fa-eye"></i></a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('page.edit',$page->id) }}">Edit</a>
                                <form action="{{ route('page.destroy',$page->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you Sure')" href="#">Delete</button>
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
