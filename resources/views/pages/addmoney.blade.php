@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
  <h4>Make Payment</h4>
     
    <div id="charge-error" class="text-danger  {{ !Session::has('error') ? 'hidden' : ''}}" style="font-size: 20px;"> {{ Session::get('error')}}</div>

     <form action="/topup" method="post" id="topup" class="mt-4">
       {{ csrf_field() }}
          <div class='form-row'>
            <div class='col-md-4 form-group required'>
              <label class='control-label'>Name on Card</label> <input
                class='form-control' size='4' type='text' name='card-name' id='card-name'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-4 form-group required'>
              <label class='control-label'>Card Number</label> <input
                class='form-control' size='4' type='text' name='card-number' id='card-number'>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-xs-4 form-group cvc required'>
              <label class='control-label'>CVC</label> <input
                autocomplete='off' class='form-control card-cvc'
                placeholder='ex. 311' size='4' type='text' name='card-cvc' id='card-cvc'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
              <label class='control-label'>Expiration</label> <input
                class='form-control card-expiry-month' placeholder='MM' size='2'
                type='text' name='card-expiry-month' id='card-expiry-month'>
            </div>
            <div class='col-xs-4 form-group expiration required'>
              <label class='control-label'> </label> <input
                class='form-control card-expiry-year' placeholder='YYYY'
                size='4' type='text' name='card-expiry-year' id='card-expiry-year'>
            </div>
          </div>
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
@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="/js/checkout.js"></script>
@endsection