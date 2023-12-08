@extends('adminlte::page')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Major Name</th>
        <th scope="col">Created_At</th>
        <th scope="col">Show</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <form action="{{ route('doctor.create') }}">
        <button  class="btn btn-primary">Create</button>
    </form>
    <tbody>
        @foreach ($doctors as $doctor)
    <tr>
        <th>{{ $doctor->id }}</th>
        <th>{{ $doctor->name }}</th>
        <th>{{ $doctor->email }}</th>
        <th><img src="{{ url("$doctor->image") }}" class="img-thumbnail" alt="" width="50"></th>
        <th>{{ $doctor->major->title }}</th>
        <th>{{ $doctor->created_at }}</th>
        <th>
            <form  action="{{ route('doctor.show',$doctor->id)}}">
                <button  class="btn btn-primary">Show</button>
            </form>
        </th>
        <th>
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
        </th>
    </tr>
        @endforeach
    </tbody>
  </table>
  {{ $doctors->links() }}
@endsection
