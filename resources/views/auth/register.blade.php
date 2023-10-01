@extends('layouts.auth')

@section('content')
    <form class="form-default" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="{{ route('index') }}"><img src="assets/img/logo/loder.png" alt=""></a>
            </div>
            <h2>Registration Here</h2>

            <div class="form-input">
                <label for="name">Full name</label>
                <input id="name" class=" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="Registration">
            </div>
            <!-- Forget Password -->
            <a href="{{route('login')}}" class="registration text-center">login</a>
        </div>
    </form>
@endsection
