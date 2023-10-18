@extends('layouts.header')
@section('body')

<body class="text-center">
  <main class="form-signin">
        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf
            <img class="mb-4" src="{{ asset('img/logoprinter.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>

            <button class="w-100 btn btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
        </form>
    </main>

@endsection