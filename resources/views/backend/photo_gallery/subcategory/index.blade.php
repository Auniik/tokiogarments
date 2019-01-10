@extends('backend._partial.dashboard')

@section('title','Edit Photo Sub Gallery')
@section('PageHead','Edit photo Sub Gallery')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('gallery_name.index') }}">All Photo Gallery</a>
@endsection

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('sub_category_name.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Sub Category Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Sub Gallery Name">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="category_id" value="{{ $id }}">
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Now</button>
                    </div>
                </form>
            </div>
        </div>


        <br>

        <div class="tile">
            <h3 class="tile-title">All Sub Gallery</h3>
            @if( session()->has('delete') )
                <div class="alert-danger notify"> <p>{{ Session::get('delete') }}</p> </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Sub Gallery Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $gallery->sub_category_name }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('sub_category_name.edit',$gallery->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('sub_category_name.destroy',$gallery->id) }}" method="post">
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

@endsection
