@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')

      <div class="row">
        <div class="col-md-6">
        	 <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Edit Plan {{$plan->plane_name}}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                   </div>
            </div>
            <div class="card-body">
          
            	@if($status ?? ''==1)
            		<div class="alert alert-success">
                    {{$message}}
                </div>
            	@endif 
            <form method="post" action="/update">
            	{{ csrf_field()}}
              <div class="form-group">
              	@error('plan_name')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputName">Plan Name</label>
                <input type="text" id="inputName" class="form-control" name="plan_name" value="{{$plan->plane_name}}">
              </div>

              <div class="form-group">
              	@error('plan_type')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputStatus">Plan Type</label>

                <select class="form-control custom-select" name="plan_type">
                  <option value="">Select plan type</option>
                  @if($plan->plan_type==1)
                    <option title="funds are deducted from bank at due time automatically" value="1" selected>Automatic</option>

                  @else
                    <option title="funds are deducted from bank at due time automatically" value="1">Automatic</option>

                  @endif

                   @if($plan->plan_type==0)
                    <option title="User saves at any time" value="1" selected>Save Yourself</option>

                  @else
                    <option title="User saves at any time" value="0">Save Yourself</option>

                  @endif

                  
                </select>
              </div>
              <div class="form-group">
              	@error('target_amount')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputClientCompany">Target Amount</label>
                <input type="number" id="inputClientCompany" class="form-control" name="target_amount" value="{{$plan->target_amount}}">
              </div>
              <div class="form-group">
              	@error('maturity_date')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                </div>
                <input type="hidden" name="plan_id" value="{{$plan->id}}">
               <input type="submit" value="Update Plan" class="btn btn-secondary float-right">
        	 </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">

        </div>
      </div>


@stop