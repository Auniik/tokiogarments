@extends('backend._partial.dashboard')

@section('title','All Client')
@section('PageHead','All Client')
@section('PageName','Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ route('client.create') }}">Add Client</a>
@endsection

@section('content')

    <div class="col-md-9">
        <div class="tile">
            <h3 class="tile-title">Client List</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Client Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <img class="small-img" src="{{ $client->client_image }}">
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('client.edit',$client->id) }}">Edit</a>
                                <form action="{{ route('client.destroy',$client->id) }}" method="post">
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
