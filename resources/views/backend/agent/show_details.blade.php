@extends('backend.layouts.app')
@section('content')


       <div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header info">
<h3 class="card-title">Agent Details</h3>
</div>
            <!-- /.card-header -->
 <div class="card-body">
       @if(isset($success))
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endif
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Agent ID</th>
<th>Agent Name</th>
<th>Agent Category</th>               
<th>Registration Number</th>  
<th>Contact Number</th>
<th>Address</th>
<th>City</th>
<th>Postcode</th>
<th>State</th>
<th>Country</th> 
<th>Remarks</th> 

<th>Action</th>  
              
</tr>
</thead>
<tbody>
@foreach($list as $row)
<tr>
<td>{{ $row->usersID }}</td>
<td>{{ $row->agentName }}</td>
<td>{{ $row->agentCat }}</td>
<td> {{ $row->registrationNum }} </td>
<td>{{ $row->contact }}</td>
<td>{{ $row->address }}</td>
<td>{{ $row->city }}</td>
<td>{{ $row->postcode }}</td>
<td> {{ $row->state }} </td>
<td>{{ $row->country }}</td>
<td>{{ $row->remarks }}</td>





<td>
    <a href="{{ URL::to('/list_task/'.$row->usersID) }}" class="btn btn-sm btn-primary">List Task</a>
<a href="{{ URL::to('/edit_agent/'.$row->usersID) }}" class="btn btn-sm btn-info">Edit</a>
@if (Auth::user()->role == 1 )
<a href="{{ URL::to('delete_details/'.$row->usersID) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
@endif

</td>
@endforeach


        </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        </div>

            @endsection