@extends('adminlte::page')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Phone</th>
        <th scope="col">Type</th>
        {{-- <th scope="col">Show</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th> --}}
      </tr>
    </thead>
    <form action="{{ route('user.create') }}">
        <button  class="btn btn-primary">Create</button>
    </form>
    <tbody>
        @foreach ($users as $user)
    <tr>
        <th>{{ $user->id }}</th>
        <th>{{ $user->name }}</th>
        <th>{{ $user->email }}</th>
        <th>{{ $user->password }}</th>
        <th>{{ $user->phone }}</th>
        <th>{{ $user->type }}</th>
        <th>{{ $user->created_at }}</th>
        {{-- <th>
            <form  action="{{ route('doctor.show',$doctor->id)}}">
                <button  class="btn btn-primary">Show</button>
            </form>
        </th> --}}
        {{-- <th>
            <form action="{{ route('doctor.edit',$doctor->id) }}">
                <button  class="btn btn-warning">Update</button>
            </form>
        </th>
        <th>
            <form action="{{ route('doctor.destroy',$doctor->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button  class="btn btn-danger">Delete</button>
            </form>
        </th> --}}
    </tr>
        @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
@endsection
