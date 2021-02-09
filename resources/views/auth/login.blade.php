@extends('layouts.app')

<style>
.height89{
    height: 93.6vh;
}
body{
    background: url(http://localhost/socialstore/public/assets/global_assets/images/rectangle48.png);
    background-size: cover;
}
.card{
    background: #1a1634 !important;
}
.card-header h1{
    color: #fff;
}
.card label{
    color: #fff;
}
.btn-primary {
    background-color: #0c0638;
    background-image: linear-gradient(to right top, #e72864, #eb4560, #ee5b5f, #ef6e60, #f08064);
}
.btn-primary:hover{
    background-color: #0c0638;
}
.navbar-light{    background-color: #1a1634 !important;}
.navbar-light .navbar-text{color: #fff !important;}
.img-div{    height: 74px;text-align: center;}
.img-div img{    height: 156px;}
.card{
    border-radius: 7px !important;
}
</style>


@section('content')



<div class="container">
    <div class="row justify-content-center height89">
        <div class="img-div col-md-12 mt-5"><img src="{{asset('assets/global_assets/images/main-screen-logo.png')}}"></div>
        <div class="col-md-8">
            <div class="card mt-0">
                <div class="card-header text-center"><h1>{{ __('Login') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
