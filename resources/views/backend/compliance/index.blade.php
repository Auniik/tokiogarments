@extends('backend._partial.dashboard')

@section('title','All Compliance')
@section('PageHead','All Compliance')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('compliances.create') }}">Add Compliance</a>
@endsection

@section('content')

    <div class="col-md-12">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Compliance List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Compliance Image</th>
                    <th>Compliance Name</th>
                    <th>Homage</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($compliances as $compliance)
                    <tr>
                        <td class="align-middle">{{ $i++ }}</td>
                        <td class="align-middle">
                            @php($images = json_decode($compliance->compliance_image))
                            <a href="{{ route('compliances.edit',$compliance) }}">
                                <img src="{{url($images[0])}}" alt="" width="70">
                            </a>
                            {{--@foreach($images as $image)--}}
                                {{--<img src="{{url($image)}}" alt="" width="70">--}}
                            {{--@endforeach--}}
                        </td>
                        <td class="align-middle">{{ $compliance->title }}</td>
                        <td class="align-middle">{{ $compliance->homage }}</td>

                        <td class="align-middle">
                            <div class="btn-group">
                                <a class="btn btn-warning btn-sm" href="{{ route('compliance.view',$compliance) }}" target="_blank"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('compliances.edit',$compliance) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('compliances.destroy',$compliance) }}" method="post">
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
