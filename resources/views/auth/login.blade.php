@extends('layouts.auth')

@section('content')
    <form class="form-default" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="{{route('index')}}"><img src="{{ asset('assets/img/logo/loder.png') }}" alt=""></a>
            </div>
            <h2>Login Here</h2>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>

            <!-- Forget Password -->
            {{-- <a href="#" class="forget text-center">Forget Password</a> --}}
            <!-- Forget Password -->
            <a href="{{ route('index') }}#register" class="registration text-center">Registration</a>
        </div>
    </form>
@endsection
