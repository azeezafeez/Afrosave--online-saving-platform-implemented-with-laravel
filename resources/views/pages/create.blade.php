@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')

      <div class="row">
        <div class="col-md-6">
        	 <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Create new Plan</h3>

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
            <form method="post" action="/saveplan">
            	{{ csrf_field()}}
              <div class="form-group">
              	@error('plan_name')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputName">Plan Name</label>
                <input type="text" id="inputName" class="form-control" name="plan_name">
              </div>

              <div class="form-group">
              	@error('plan_type')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputStatus">Plan Type</label>
                <select class="form-control custom-select" name="plan_type">
                  <option selected disabled value="">Select plan type</option>

                  <option title="funds are deducted from bank at due time automatically" value="1">Automatic</option>

                  <option title="User saves at any time" value="0">Save yourself</option>
                  
                </select>
              </div>
              <div class="form-group">
              	@error('target_amount')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputClientCompany">Target Amount</label>
                <input type="number" id="inputClientCompany" class="form-control" name="target_amount">
              </div>
              <div class="form-group">
              	@error('maturity_date')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputProjectLeader">Maturity Date<br>For discipline, you won't be able to withdraw funds till maturity date)</label>
                <input type="date" id="inputProjectLeader" class="form-control" name="maturity_date">
              </div>
               <input type="submit" value="Create new Plan" class="btn btn-secondary float-right">
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