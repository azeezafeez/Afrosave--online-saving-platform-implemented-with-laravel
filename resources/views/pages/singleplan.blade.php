@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
        @if($status==1)
         <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
              <div class="alert alert-success">
                  {{$message ?? '' ? $message ?? '' : ''}}
              </div>
          </div>
      </div>
      @endif
      <br><br>
       <h5 class="mt-2 mb-2"> <i class="fa fa-money-bill-alt"></i> 
      
        {{$plan->plane_name}}</h5>
        <div class="row classic">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info bart">
              <span class="info-box-icon">
                  <span>&#8358;</span>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number"><h2>{{ number_format($plan->balance,2,'.',',')}}</h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                @if($target_status==1)
                  <span class="progress-description">
                   amount remaining to<br> meet target
                   <p style="color: black"><b>Target Met</b></p>
                </span>
               
                @else
                  <span class="progress-description">
                   amount remaining to<br> meet target
                   <p style="color: black"><span>&#8358;</span>  <b>{{$rem}}</b></p>
                </span>
               
                @endif
                
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <a href="/edit/{{$plan->id}}">
            <div class="info-box bg-success bart">

              <div class="info-box-content">
                <span class="info-box-text"><i class="fas fa-pen" style="font-size: 20px;"></i> Edit</span>
                <span class="info-box-number"><h2></h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Click To Edit <br>Savings Plan
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <a href="/withdraw/{{$plan->id}}">
            <div class="info-box bg-secondary bart">

              <div class="info-box-content">
                <span class="info-box-number"><h2>Withdraw Fund</h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Click to Withdraw <br>From Savings Plan
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <a href="/addmoney/{{$plan->id}}">
            <div class="info-box bg-success bart">

              <div class="info-box-content">
                <span class="info-box-number"><h2>Add Money</h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Click to Add Money <br>To Savings Plan
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->





        </div>
        <!-- /.row -->

        <h5 class="mt-4 mb-2">Plan Information<a href="/transfer/{{$plan->id}}"><button class="btn btn-success transfer">Transfer Fund</button></a></h5>

        <hr></hr>

        <h6>Date Created: <span class="text-success">
          {{$plan->created_at}}
        </span></span></h4>

        <h6>Maturity Date: <span class="text-success">{{$plan->maturity_date}}</span></h4>

        <h6>Target Amount: <span class="text-success">{{number_format($plan->target_amount,2,'.',',')}}</span></h4>

        <h6>Plan Type: 
          <span class="text-success">
            @if($plan->plan_type==1)
              Automatic
            @else
              Save youself
            @endif
          </span></h4>
        

@stop