@extends('layouts.master')

@section('content')
<div class="container">

    <div class="row" style="margin-top:200px">
        <div class="col-md-6">
                <h1 style="color:blueviolet">Create an account</h1>
                <h2 style="color:blue">Lets get to Know you!</h2>
        </div>
        
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                
                    <div class="col-md-6">
                        <input id="name" type="text" placeholder="Enter your full name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <input id="password" type="password"  placeholder="Enter your Phone number" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <input id="password-confirm" type="file"   class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                 
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
