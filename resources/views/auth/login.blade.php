@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        {{-- <div class="col-6 loging"> --}}
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="sinin-image" style="text-align: right">
                        <figure><img src="{{asset('details/'. $detail->login_logo)}}" alt="" width="320px"></figure>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="sinin-form">
                        <!-- <div class="card-header">{{ __('Login') }}</div> -->
                        @include('pos.message.message')
                        {{-- <div class="card-body"> --}}
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2 class="form-title">Login</h2>
                                <div class="form-group row">
                                    <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                                    <div class="col-sm-6 col-md-6">
                                        <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="margin-bottom: 20px;">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                    <div class="col-md-6">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="margin-bottom: 20px;">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-12 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        <!-- <a class="btn btn-link" href="/forget-password">
                                            Forgot Your Password?
                                        </a> -->
                                    </div>
                                </div>
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection