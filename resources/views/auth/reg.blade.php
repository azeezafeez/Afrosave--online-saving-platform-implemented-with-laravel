@extends('layouts.master')

@section('content')

<div class="container">

    <div class="row" style="margin-top:200px">
        <div class="col-md-6">
                <h1 style="color:blueviolet">Create an account</h1>
                <h2 style="color:blue">Lets get to Know you!</h2>
        </div>
        
        <div class="col-md-6">
             <div class="panel panel-default">
	      <div class="panel-heading">
	      </div>
	      <div class="panel-body">
        <form method="post" action="/signup">
                          {{csrf_field() }}

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Request::old('first_name') }}" placeholder="First Name">
                                </div>

                                @if($errors->has('first_name'))
                                <div class=" text-danger ">
                                    {{ $errors->first('first_name') }}
                                </div><br>
                                @endif
                            </div>
                            <div class="col-md-6">
                            
                                <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Request::old('last_name') }}" placeholder="Last Name">
                                </div>

                                @if($errors->has('last_name'))
                                <div class=" text-danger ">
                                    {{ $errors->first('last_name') }}
                                </div><br>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mt-4">
                          <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') }}" placeholder="Email">
                        </div>
                        @if($errors->has('email'))
                          <div class="text-danger">
                            {{ $errors->first('email') }}
                          </div><br>
                        @endif
                        

                         <div class="form-group mt-5">
                          <input type="number" name="phone_number" id="phone_number" class="form-control" value="{{ Request::old('phone_number') }}" placeholder="Phone number">
                        </div>

                        @if($errors->has('phone_number'))
                          <div class=" text-danger ">
                            {{ $errors->first('phone_number') }}
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
                        <button type="submit" class="btn btn-primary">Register</button>
                 </form>
		  
		  </div> <!-- panel body -->
	    </div> <!-- panel -->

        </div>
    </div>

@endsection
