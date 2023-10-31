@extends('layouts.header')
@section('body')

<main class="form-signin" style="text-align: center;">
  <form action="{{ route('auth.register') }}" method="POST">
      @csrf
    <img class="mb-4" src="{{ asset('img/logoprinter.png') }}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="name@example.com">
      <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="your name">
      <label for="name">Your Name</label>
      @error('name')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" id="confirm-password" placeholder="confirm-password">
      <label for="confirm-password">Confirm Password</label>
      @error('confirm-password')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
  </form>
</main>
@endsection