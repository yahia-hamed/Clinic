@extends('adminlte::page')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Major Title</th>
        <th scope="col">Created_At</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <form action="{{ route('major.create') }}">
        <button  class="btn btn-primary">Create</button>
    </form>
    <tbody>
        @foreach ($majors as $major)
    <tr>
        <th>{{ $major->id }}</th>
        <th>{{ $major->title }}</th>
        <th>{{ $major->created_at }}</th>
        <th>
            <form action="{{ route('major.edit',$major->id) }}">
                <button  class="btn btn-warning">Update</button>
            </form>
        </th>
        <th>
            <form action="{{ route('major.destroy',$major->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button  class="btn btn-danger">Delete</button>
            </form>
        </th>
    </tr>
        @endforeach
    </tbody>
  </table>
  {{ $majors->links() }}
@endsection
