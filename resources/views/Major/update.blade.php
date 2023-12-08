@extends('adminlte::page')
@section('content')
<form action="{{ route('major.update',$major->id) }}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text"  value="{{ $major->title }}" class="form-control w-50" id="title"  name='title' >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
