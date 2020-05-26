@extends("layouts.master3")
@section('title', 'Welcome to AfroSave')

@section('content')
        <h5 class="mt-4 mb-2"><i class="fa fa-history"></i> My Transactions History</h5>
		<div class="row classic">
			   <table class="table table-hover table-striped table-bordered">
              <thead>
                <th>S/n</th>
                <th>Description</th>
                <th>Amount (<span>&#8358;</span>)</th>
                <th>Date</th>
              </thead>
              @foreach($transactions as $transaction)
                <tr>
                  <td>{{$transaction->id}}</td>
                  <td>{{$transaction->description}}</td>
                  <td>{{$transaction->amount}}</td>
                  <td>{{$transaction->created_at}}</td>
                </tr>
              @endforeach
         </table>
		</div>
        <!-- /.row -->
      


@stop