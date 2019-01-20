@extends('backend._partial.dashboard')

@section('title','Images for Production Unit')
@section('PageHead','Images for Production Unit')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{route('production-sliders.create')}}">Add Production Image</a>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Production Unit Images</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Production Unit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=$productionSlider->firstItem())
                @foreach($productionSlider as $slider)
                    <tr>
                        <td class="align-middle">{{ $i++ }}</td>
                        <td class="align-middle"><img class="img-fluid" width="100"  src="{{ url($slider->image) }}" alt=""></td>
                        <td class="align-middle">{{ $slider->productionUnit->name }}</td>
                        <td class="align-middle">{{ $slider->status }}</td>
                        <td class="align-middle">
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('production-sliders.edit',$slider) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('production-sliders.destroy',$slider->id) }}" method="post">
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
            <div>
                {{$productionSlider->links()}}
            </div>
        </div>
    </div>
@endsection
