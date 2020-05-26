@extends('layouts.master')

@section('content')
<div class="container">

    <div class="row" style="margin-top:200px">
        <div class="col-md-6">
                <h1 style="color:blueviolet">Welcome back</h1>
                <h2 style="color:blue">Sign in to continue</h2>
        </div>
        
        <div class="col-md-6">
             <div class="panel panel-default">
	      <div class="panel-heading">
	      </div>
	      <div class="panel-body">
        <form method="post" action="/signin">
                          {{csrf_field() }}
                       <p class="alert-danger">
                            {{$message ?? '' ? $message ?? '' : ''}}
                        </p>
                        <div class="form-group mt-4">
                          <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}" placeholder="Email">
                        </div>
                        @if($errors->has('email'))
                          <div class="text-danger">
                            {{ $errors->first('email') }}
                          </div><br>
                        @endif
                        



                        <div class="form-group mt-5">
                          <input type="password" name="password" id="password" class="form-control" value="{{ Request::old('password') }}" placeholder="Password">
                        </div><br>

                        @if($errors->has('password'))
                          <div class="text-danger">
                            {{ $errors->first('password') }}
                          </div><br>
                        @endif
                        <button type="submit" class="btn btn-primary">Login</button>
                 </form>
		  
		  </div> <!-- panel body -->
	    </div> <!-- panel -->

        </div>
    </div>

@endsection
