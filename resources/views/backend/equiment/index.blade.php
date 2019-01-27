@extends('backend._partial.dashboard')

@section('title','All Equipment')
@section('PageHead','All Equipment')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('equipment.create') }}">Add Equipment</a>
@endsection

@section('content')

    <div class="col-md-9">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div><br>
        @endif
        <div class="tile">
            <a class="btn btn-warning pull-right" href="{{url('equipments')}}">Visit Equipments</a>
            <h3 class="tile-title">Equipment List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Equipment Name</th>
                    <th>Equipment Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($equipments as $equipment)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $equipment->title }}</td>
                        <td>
                            <img class="small-img" src="{{ $equipment->image }}">
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary  btn-sm" href="{{ route('equipment.edit',$equipment->id) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('equipment.destroy',$equipment->id) }}" method="post">
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
