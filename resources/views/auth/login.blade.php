@extends('layouts.app')
<link rel="icon" href="{{ asset('uploads/aerolink.png') }}"> 
@section('content')
<div id="login-body">
    <div class="overlay"></div>    
        <div class="login-form">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ asset('uploads/aerolink.png') }}">
                                <h2> Aerolink <br><span>Employee Self Service</span></h2>
                            </div>
                            <div class="card-body">
                                <center><h5>Welcome to our ESS!</h5></center>
                                <p>Kindly Please enter your provided username and password and press login button.
                                    If you need assistance with logging in. Please contact your Human Resources
                                    Department. Thank You!
                                </p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-form-label">{{ __('Username:') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-form-label">{{ __('Password:') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary form-control">
                                                {{ __('Login') }}
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link form-control " href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
