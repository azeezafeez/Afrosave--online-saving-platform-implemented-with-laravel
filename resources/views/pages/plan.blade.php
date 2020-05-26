@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
        <h5 class="mt-4 mb-2"><i class="fa fa-money-bill-alt"></i> Select Plan</h5>
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