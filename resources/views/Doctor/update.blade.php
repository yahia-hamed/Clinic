@extends('adminlte::page')
@section('content')
<form action="{{ route('doctor.update',$doctor->id) }}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name"  value="{{ $doctor->name }}" class="form-control w-50" id="name"  name='name' >
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" value="{{ $doctor->email }}" class="form-control w-50" id="email"  name='email' >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" value="{{ $doctor->password }}" class="form-control w-50" id="password"  name='password' >
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" value="{{ $doctor->phone }}" class="form-control w-50" id="phone"  name='phone' >
  </div>
  <div class="mb-3">
    <label for="city" class="form-label">City</label>
    <input type="text" value="{{ $doctor->city }}" class="form-control w-50" id="city"  name='city' >
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="string" value="{{ $doctor->image }}" class="form-control w-50" id="image"  name='image' >
  </div>
  <div>
    <select class="custom-select w-50" aria-label="Default select  example"  name="major_id">
        <option selected>{{ $doctor->major?->title }}</option>
        @foreach ($majors as $major)
        <option value="{{ $major->id }}">{{ $major->title }}</option>
        @endforeach
      </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
