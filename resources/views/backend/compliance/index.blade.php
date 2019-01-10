@extends('backend._partial.dashboard')

@section('title','All Compliance')
@section('PageHead','All Compliance')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('compliance.create') }}">Add Compliance</a>
@endsection

@section('content')

    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Compliance List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Compliance Name</th>
                    <th>Compliance Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($compliances as $compliance)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $compliance->title }}</td>
                        <td>
                            @foreach(json_decode($compliance->compliance_image) as $image )
                                print_r($image);
                                @endforeach
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary  btn-sm" href="{{ route('compliance.edit',$compliance->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('compliance.destroy',$compliance->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger  btn-sm" onclick=" return confirm('Are you Sure')" href="#"><i class="fa fa-trash"></i></button>
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
