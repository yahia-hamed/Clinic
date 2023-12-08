<form   action="{{ route('login') }}" method="post">
    @csrf
    <div class="mb-3" >
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control w-50" value="{{ old('email') }}" id="email"  name='email' >
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control w-50" value="{{ old('password') }}" id="password"  name='password' >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
