@extends('adminlte::page')
@section('content')
<form action="{{ route('booking.update',$booking->id) }}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name"  value="{{ $booking->name }}" class="form-control w-50" id="name"  name='name' >
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" value="{{ $booking->email }}" class="form-control w-50" id="email"  name='email' >
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="phone" value="{{ $booking->phone }}" class="form-control w-50" id="phone"  name='phone' >
  </div>
  <div>
    <select class="custom-select w-50" aria-label="Default select  example"  name="doctor_id">
        <option selected>{{ $booking->doctor?->name }}</option>
        @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->$name }}</option>
        @endforeach
      </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
