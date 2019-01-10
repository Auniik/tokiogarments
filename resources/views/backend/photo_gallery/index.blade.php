@extends('backend._partial.dashboard')

@section('title','Add Photo Gallery')
@section('PageHead','Add photo Gallery')
@section('PageName','Tokio Garments Limited')

@section('content')

    <div class="col-md-8">
        <div class="tile">
            <div class="tile-body">
                <form action="{{ route('gallery_name.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( session()->has('success') )
                        <div class="alert alert-success">{{ Session::get('success') }}</div><br>
                    @endif

                    <div class="form-group">
                        <label class="control-label">Gallery Name</label>
                        <input class="form-control" type="text" name="gallery_name" placeholder="Gallery Name">
                    </div>


                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Now</button>
                    </div>
                </form>
            </div>
        </div>


        <br>

        <div class="tile">
            <h3 class="tile-title">All Gallery</h3>
            @if( session()->has('delete') )
                <div class="alert-danger notify"> <p>{{ Session::get('delete') }}</p> </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Gallery Category</th>
                    <th>Gallery sub Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $gallery->category_name }}</td>
                        <td><label>
                                <a class="btn btn-outline-secondary btn-sm" href="{{  url('sub_category_name',$gallery->id) }}">Sub Category</a>
                                </label></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('gallery_name.edit',$gallery->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('gallery_name.destroy',$gallery->id) }}" method="post">
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
