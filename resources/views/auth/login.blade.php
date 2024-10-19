@extends('layouts.auth.app')

@section('content')
    <div class="login">
        <img src="{{ asset('auth') }}/assets/img/login-bg.png" alt="login image" class="login__img">

        <form class="login__form" method="POST" action="{{ route('login') }}">
            @csrf
            <center style="margin-bottom: 20px;">
                <a href="{{ url('/') }}" class="login__title"
                    style="color:white;font-weight:bolder; font-size:50px;">LOGIN</a><br>
                <span><small><mark style="border-radius: 5px; padding:5px;">Single Authentication</mark></small></span>
            </center>
            <h4 style="margin-bottom:50px; text-align:center;">{{ env('APP_NAME') }}</h4>
            @if ($errors->any())
                <div
                    style="background-color: rgba(255, 0, 0, 0.5); color:white; padding:10px; text-align:center; margin-bottom:20px; border-radius:10px; ">
                    <ul style="list-style:none; padding:0;">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="email" required class="login__input" id="login-email" placeholder=" " name="email"
                            value="{{ old('email') }}">
                        <label for="login-email" class="login__label">Email</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="password" required class="login__input" id="login-pass" placeholder=" "
                            name="password">
                        <label for="login-pass" class="login__label">Password</label>
                        <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                    </div>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-group">
                    <input type="checkbox" class="login__check-input" id="login-check" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="login-check" class="login__check-label">Remember me</label>
                </div>

                {{-- <a href="#" class="login__forgot">Forgot Password?</a> --}}
            </div>

            <button type="submit" class="login__button">Login</button>

            {{-- <p class="login__register">
                Don't have an account? <a href="#">Register</a>
            </p> --}}
        </form>
    </div>
@endsection
