@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
       <h5 class="mt-2 mb-2"><i class="fa fa-user"></i> My account</h5>
        <div class="row classic">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info bart">
              <span class="info-box-icon">
              		<span>&#8358;</span>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number"><h2>{{number_format($balance,2,'.',',')}}</h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                   Your balance across<br> all your plans
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
          	<a href="/createplan">
            <div class="info-box bg-success bart">

              <div class="info-box-content">
                <span class="info-box-text"><i class="fas fa-plus" style="font-size: 20px;"></i> Create</span>
                <span class="info-box-number"><h2>New Plan</h2></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Click to create a new <br>Savings Plan
                </span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
          	<a href="/plan">
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
            <a href="/plan">
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

        <h5 class="mt-4 mb-2"><i class="fa fa-money-bill-alt"></i> My Plans</h5>
        @if(count($plans)>0)
        @foreach($plans->chunk(3) as $planChunk)
		<div class="row classic">
			@foreach($planChunk as  $plan)

          <div class="col-md-4 col-sm-6 col-12">
          	<a href="/plan/{{$plan->id}}">
            <div class="info-box bg-primary bart">
              <div class="info-box-content">
                
                <span class="info-box-number"><h4>{{$plan->plane_name}}</h4></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description mt-4">
                	<h6>Balance</h6>
                   <h2><span>&#8358; </span> {{number_format($plan->balance,2,'.',',')}}</h2>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          @endforeach
          <!-- /.col -->
		</div>
        <!-- /.row -->
        @endforeach
        @else
        	<p>You are yet to create a plan</p>
        @endif



@stop