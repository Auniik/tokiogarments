@extends('backend._partial.dashboard')

@section('title','All Slider')
@section('PageHead','All Slider')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('slider.create') }}">Add Slider</a>
@endsection

@section('content')

    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div><br>
        @endif
        <div class="tile">
            <h3 class="tile-title">Slider List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Slider Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($sliders as $slider)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <img class="small-img" src="{{ $slider->slider_image }}">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary  btn-sm" href="{{ route('slider.edit',$slider->id) }}"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('slider.destroy',$slider->id) }}" method="post">
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
