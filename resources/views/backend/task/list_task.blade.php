@extends('backend.layouts.app')
@section('content')

<div>
       @if (Auth::user()->role == 1 )     
       <a href="{{ URL::to('/add_task/'.$agent->usersID) }}" class="btn btn-sm btn-info" style="right:0">Add Task</a>
                          <!-- /.card-header -->
       @endif
</div><br>
       <div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header info">
<h3 class="card-title">Task List</h3>
</div>


     
 <div class="card-body">

<table id="example1" class="table table-bordered table-striped">

<thead>
      
<tr>
<th>Task ID</th>
<th>Agent Name</th>
<th>Product ID</th>               
<th>Product Name</th>  
<th>Quantity</th>
<th>Type of Service</th>
<th>Pickup Address</th>
<th>Pickup Date & Time</th>
<th>Delivery Address</th>
<th>Delivery Date & Time</th>
<th>Remarks</th> 
<th>Update Status</th> 
<th>Updated by</th>  
<th>Action</th>

              
</tr>
</thead>
<tbody>
@foreach($list as $row)
<tr>
{{-- <td>{{ $row->agentID }}</td> --}}
<td>{{ $row->id }}</td>
<td>{{ $row->agentName }}</td>
<td>{{ $row->productID }}</td>
<td> {{ $row->ProductName }} </td>
<td>{{ $row->quantity }}</td>
<td>{{ $row->service }}</td>
<td>{{ $row->pickupAdd }}</td>
<td>{{ $row->pickupDate }}</td>
<td>{{ $row->deliveryAdd }}</td>
<td> {{ $row->deliveryDate }} </td>
<td>{{ $row->remarks }}</td>
<td>{{ $row->status }}</td>
<td>{{ $row->updatedBy }}</td>



<td>
<a href="{{ URL::to('/edit_task/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
@if (Auth::user()->role == 1 )
<a href="{{ URL::to('delete_task/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
</td>
@endif
@endforeach

        </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        </div>

        @endsection