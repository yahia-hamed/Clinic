@extends('adminlte::page')
@section('content')
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
    <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control w-50" value="{{ old('name') }}" id="name"  name='name' >
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control w-50" value="{{ old('email') }}" id="email"  name='email' >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control w-50" value="{{ old('password') }}" id="password"  name='password' >
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control w-50" value="{{ old('phone') }}" id="phone"  name='phone' >
  </div>
  <div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <input type="text"class="form-control w-50" value="{{ old('type') }}" id="type"  name='type' >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
