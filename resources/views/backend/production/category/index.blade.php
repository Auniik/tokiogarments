@extends('backend._partial.dashboard')

@section('title','Categories')
@section('PageHead','Categories')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('categories.create')}}">Add Category</a>
@endsection

@section('content')
    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Categories</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($productionCategories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group">
                                {{--<a class="btn btn-warning btn-sm" href="{{ url(str_slug($category->name)) }}" target="_blank"><i class="fa fa-eye"></i></a>--}}
                                <a class="btn btn-primary btn-sm" href="{{ route('page.edit',$category) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('page.destroy',$category->id) }}" method="post">
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
