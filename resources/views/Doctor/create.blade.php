@extends('adminlte::page')
@section('content')
<form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
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
    <label for="city" class="form-label">City</label>
    <input type="text"class="form-control w-50" value="{{ old('city') }}" id="city"  name='city' >
  </div>

    <label for="exampleInputFile" >Image</label>
        <div class="input-group w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input   " id="exampleInputFile"  name='image' >
            <label class="custom-file-label " for="exampleInputFile" >Upload</label>
            </div>
        </div>
        <div>
        <select class="custom-select w-50" aria-label="Default select  example" name="major_id">
            <option selected>Select Major</option>
            @foreach ($majors as $major)
            <option value="{{ $major->id }}">{{ $major->title }}</option>
            @endforeach
          </select>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
