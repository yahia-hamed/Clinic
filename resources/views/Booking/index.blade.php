@extends('adminlte::page')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Doctor_Id</th>
        <th scope="col">Created_At</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <form action="{{ route('booking.create') }}">
        <button  class="btn btn-primary">Create</button>
    </form>
    <tbody>
        @foreach ($bookings as $booking)
    <tr>
        <th>{{ $booking->id }}</th>
        <th>{{ $booking->name }}</th>
        <th>{{ $booking->email }}</th>
        <th>{{ $booking->phone }}</th>
        <th>{{ $booking->id}}</th>
        <th>{{ $booking->created_at }}</th>
        <th>
            <form action="{{ route('booking.edit',$booking->id) }}">
                <button  class="btn btn-warning">Update</button>
            </form>
        </th>
        <th>
            <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button  class="btn btn-danger">Delete</button>
            </form>
        </th>
    </tr>
        @endforeach
    </tbody>
  </table>
  {{ $bookings->links() }}
@endsection
