@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')

      <div class="row">
        <div class="col-md-6">
        	 <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Fund Transfer from  {{$plan->plane_name}}</h3>

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

            

              
            <form method="post" action="/send">
            	{{ csrf_field()}}
              <div class="form-group">
              	@error('from')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputName">From</label>
                <input type="text" id="inputName" class="form-control" name="from" value="{{$plan->plane_name}}">
              </div>

              <div class="form-group">
                @error('to')
                  <div class="alert alert-danger">{{$message}}
                  </div>
                @enderror

              

                <label for="inputName">To</label>
                <select class="form-control custom-select" name="to">
                  <option value="">Select plan</option>

                  @foreach($myplans as $myplan)
                    @if($myplan->plane_name==$plan->plane_name)

                    @else
                      <option value="{{$myplan->id}}">{{$myplan->plane_name}}</option> 
                    @endif
                  @endforeach


                  
                  
                  
                </select>
              </div>


              <div class="form-group">
              	@error('amount')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                <label for="inputClientCompany">Amount To transfer</label>
                <input type="number" id="inputClientCompany" class="form-control" name="amount">
              </div>
              <div class="form-group">
              	@error('maturity_date')
              		<div class="alert alert-danger">{{$message}}
              		</div>
              	@enderror
                </div>
                <input type="hidden" name="plan_id" value="{{$plan->id}}">
                <input type="hidden" name="balance" value="{{$plan->balance}}">
               <input type="submit" value="Transfer Fund" class="btn btn-secondary float-right">
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