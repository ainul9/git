@extends('backend.layouts.app')
@section('content')

       <div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header info">
<h3 class="card-title">Agent List</h3>
</div>
            <!-- /.card-header -->
 <div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Agent ID</th>
<th>Name</th> 
<th>Email</th>              
<th>Action</th>                  
</tr>
</thead>
<tbody>
@foreach($list as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->email }}</td>

<td>
{{-- <a href="{{ URL::to('/edit_agent/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a> --}}
<a href="{{ URL::to('/add_agent/'.$row->id.'/'.$row->name) }}" class="btn btn-sm btn-primary" id="addDetails" class="middle-align">Add Details</a>
<a href="{{ URL::to('/show_details/'.$row->id) }}" class="btn btn-sm btn-info" id="showDetails" class="middle-align">View Details</a>
<a href="{{ URL::to('delete_agent/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
</td>
</tr>
@endforeach


        </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        </div>

            @endsection