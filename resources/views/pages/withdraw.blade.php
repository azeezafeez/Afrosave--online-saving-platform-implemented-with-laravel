
@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
  <h4>Withdraw from <b>{{$plan->plane_name}}</b></h4>
      <p class=" text-danger" style="font-size: 20px">
        {{$message ?? '' ? $message ?? '' : ''}}
      </p>

      <p class="text-success" style="font-size: 20px">
        {{$success ?? '' ? $success ?? '' : ''}}
      </p>

     <form action="/withdraw" method="post" id="topup" class="mt-4">
       {{ csrf_field() }}
       
           <div class='form-row'>
            <div class='col-md-4 form-group required'>
              <label class='control-label'>Enter Amount</label> <input
                class='form-control' size='4' type='number' name='sum' id='sum'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-4 form-group required'>
               <input class='form-control' size='4' type='hidden' name='plan' id='plan' value='{{$plan->id}}'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-4 form-group'>
              <button class='form-control btn btn-success submit-button'
                type='submit' style="margin-top: 10px;">Pay »</button>
            </div>
          </div>
     </form>
@stop
