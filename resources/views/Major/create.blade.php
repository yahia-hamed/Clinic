@extends('adminlte::page')
@section('content')
<form action="{{ route('major.store') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
  <div class="mb-3">
    <label for="name" class="form-label">Title</label>
    <input type="text" class="form-control w-50" value="{{ old('name') }}" id="title"  name='title' >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
