@extends('adminlte::page')
@section('content')
<form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
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
    <label for="phone" class="form-label">Phone</label>
    <input type="phone" class="form-control w-50" value="{{ old('phone') }}" id="phone"  name='phone' >
  </div>
        <div>
        <select class="custom-select w-50" aria-label="Default select  example" name="doctor_id">
            <option selected>Select Doctor</option>
            @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
          </select>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
