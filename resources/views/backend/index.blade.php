@extends('backend._partial.dashboard')

@section('title', 'Dashboard')
@section('PageHead', 'Dashboard')
@section('PageName', 'Tokio Garments Limited')
@section('PageUrl')
    <a href="{{ url('/') }}">Visit Site</a>
@endsection

@section('content')
    <div class="col-md-12">
        @if( session()->has('success') )
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="tile">
            <h3 class="tile-title">Messages From Visitors</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php ($sl = $contacts->firstItem() )
                @foreach($contacts as $key => $contact)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ str_limit($contact->message, 100)}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('contact.destroy', $contact) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick=" return confirm('Are you Sure ?')" href="#"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{$contacts->links()}}</div>
        </div>
    </div>
@endsection
