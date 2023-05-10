@extends('backend.layouts.app')
@section('content')

<div class="card-body">
    <div class="row">

      <div class="col-md-2">

      </div>
                     <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Agent's Task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{URL::to('/update_task/'.$edit->id)}}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">

@if (Auth::user()->role == 1 )

<div class="form-group">
  <label for="agentName">Agent Name</label>
  <input type="text" name="agentName" value="{{$edit->agentName}}"  class="form-control @error('title') is-invalid @enderror"
   id="agentID" readonly>
  
  @error('agentName')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>


<div class="form-group">
<label for="productID">Product ID</label>
<input type="text" name="productID" value="{{$edit->productID}}"  class="form-control @error('title') is-invalid @enderror"
 id="productID" placeholder="Enter Product ID or Product Code">

@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="ProductName">Product Name</label>
<input type="text" name="ProductName" value="{{$edit->ProductName}}"  class="form-control @error('slug') is-invalid @enderror"
 id="ProductName" placeholder="Enter Product Name">

@error('slug')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
  <label for="quantity">Quantity</label>
  <input type="text" name="quantity" value="{{$edit->quantity}}"  class="form-control @error('title') is-invalid @enderror"
   id="quantity" placeholder="Enter Quantity">
  
  @error('title')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  


{{-- <div class="form-group">
  <label for="service">Type of Service</label><br>
  <select name="service" id="service" class="form-control">
    <option value="">-- Select Service --</option>
    @foreach ($services as $service)
    <option value="{{ $service }}" @if($edit->service==$service) selected="selected" @endif>{{ $service }}</option>
    @endforeach
  </select>
</div> --}}

<div class="form-group">
  <label for="service">Type of Service</label><br>
  <select name="service" id="service" class="form-control">
      <option value="">Choose an option</option>
      <option value="Door to Door" {{ $edit->service == 'Door to Door' ? 'selected' : '' }}>Door to Door</option>
      <option value="Forwarding" {{ $edit->service == 'Forwarding' ? 'selected' : '' }}>Forwarding</option>
      <option value="Pick and Pack" {{ $edit->service == 'Pick and Pack' ? 'selected' : '' }}>Pick and Pack</option>
  </select>
</div>


  <div class="form-group">
  <label for="pickupAdd">Pickup Address</label>
  <input type="text" name="pickupAdd" value="{{$edit->pickupAdd}}"  class="form-control @error('slug') is-invalid @enderror"
   id="pickupAdd" placeholder="Enter Pickup Address">
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

  <div class="form-group">
    <label for="pickupDate">Pickup Date & Time</label>
    <input type="datetime-local" name="pickupDate" value="{{$edit->pickupDate}}" class="form-control @error('slug') is-invalid @enderror"
     id="pickupDate" placeholder="Enter Pickup Date & Time">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

  <div class="form-group">
    <label for="deliveryAdd">Delivery Address</label>
    <input type="text" name="deliveryAdd" value="{{$edit->deliveryAdd}}"  class="form-control @error('title') is-invalid @enderror"
     id="deliveryAdd" placeholder="Enter Delivery Address">
    
    @error('title')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="deliveryDate">Delivery Date & Time</label>
      <input type="datetime-local" name="deliveryDate" value="{{$edit->deliveryDate}}"  class="form-control @error('slug') is-invalid @enderror"
       id="deliveryDate" placeholder="Enter Delivery Date & Time">
      
      @error('slug')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>
    
    <div class="form-group">
    <label for="remarks">Remarks</label>
    <input type="text" name="remarks" value="{{$edit->remarks}}"  class="form-control @error('slug') is-invalid @enderror"
     id="remarks" placeholder="Enter Remarks">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="status">Status</label><br>
      <select name="status" id="status" class="form-control">
          <option value="">Choose an option</option>
          <option value="Assigned" {{ $edit->status == 'Assigned' ? 'selected' : '' }}>Assigned</option>
          <option value="In Progress" {{ $edit->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
          <option value="On Hold" {{ $edit->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
          <option value="Deffered" {{ $edit->status == 'Deffered' ? 'selected' : '' }}>Deffered</option>
          <option value="Completed" {{ $edit->status == 'Completed' ? 'selected' : '' }}>Completed</option>
          <option value="Failed to Deliver" {{ $edit->status == 'Failed to Deliver' ? 'selected' : '' }}>Failed to Deliver</option>
          <option value="Cancelled" {{ $edit->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
      </select>
    </div>




{{-- <div class="form-group">
  <label for="status">Status</label><br>
  <select name="status" id="status" class="form-control">
    <option value="">-- Select Status --</option>
    @foreach ($statuses as $status)
    <option value="{{ $status }}" @if($edit->status==$status) selected="selected" @endif>{{ $status }}</option>
    @endforeach
  </select>
</div> --}}
@endif




@if (Auth::user()->role == 3 )

<div class="form-group">
  <label for="agentName">Agent Name</label>
  <input type="text" name="agentName" value="{{$edit->agentName}}"  class="form-control @error('title') is-invalid @enderror"
   id="agentID" readonly>
  
  @error('agentName')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

<div class="form-group">
<label for="productID">Product ID</label>
<input type="text" name="productID"  value="{{$edit->productID}}" class="form-control @error('title') is-invalid @enderror"
 id="productID" readonly>

@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="ProductName">Product Name</label>
<input type="text" name="ProductName" value="{{$edit->ProductName}}"  class="form-control @error('slug') is-invalid @enderror"
 id="ProductName" readonly>

@error('slug')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
  <label for="quantity">Quantity</label>
  <input type="text" name="quantity" value="{{$edit->quantity}}"  class="form-control @error('title') is-invalid @enderror"
   id="quantity" readonly>
  
  @error('title')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>


{{-- <div class="form-group">
  <label for="service">Type of Service</label><br>
  <select name="service" id="service" class="form-control">
    <option value="">-- Select Service --</option>
    @foreach ($services as $service)
    <option value="{{ $service }}" @if($edit->service==$service) selected="selected" @endif>{{ $service }}</option>
    @endforeach
  </select>
</div>
   --}}

<div class="form-group">
  <label for="service">Type of Service</label><br>
  <select name="service" id="service" class="form-control" disabled>
      <option value="" readonly>Choose an option</option>
      <option value="Door to Door" {{ $edit->service == 'Door to Door' ? 'selected' : '' }}>Door to Door</option>
      <option value="Forwarding" {{ $edit->service == 'Forwarding' ? 'selected' : '' }}>Forwarding</option>
      <option value="Pick and Pack" {{ $edit->service == 'Pick and Pack' ? 'selected' : '' }}>Pick and Pack</option>
  </select>
  <input type="hidden" name="service" value="{{ $edit->service }}">
</div>


  <div class="form-group">
  <label for="pickupAdd">Pickup Address</label>
  <input type="text" name="pickupAdd" value="{{$edit->pickupAdd}}"  class="form-control @error('slug') is-invalid @enderror"
   id="pickupAdd" readonly>
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

  <div class="form-group">
    <label for="pickupDate">Pickup Date & Time</label>
    <input type="datetime-local" name="pickupDate" value="{{$edit->pickupDate}}" class="form-control @error('slug') is-invalid @enderror"
     id="pickupDate" readonly>
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

  <div class="form-group">
    <label for="deliveryAdd">Delivery Address</label>
    <input type="text" name="deliveryAdd" value="{{$edit->deliveryAdd}}"  class="form-control @error('title') is-invalid @enderror"
     id="deliveryAdd" readonly>
    
    @error('title')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="deliveryDate">Delivery Date & Time</label>
      <input type="datetime-local" name="deliveryDate" value="{{$edit->deliveryDate}}"  class="form-control @error('slug') is-invalid @enderror"
       id="deliveryDate" readonly>
      
      @error('slug')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>
    
    <div class="form-group">
    <label for="remarks">Remarks</label>
    <input type="text" name="remarks" value="{{$edit->remarks}}"  class="form-control @error('slug') is-invalid @enderror"
     id="remarks">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="status">Status</label><br>
    <select name="status" id="status" class="form-control">
        <option value="">Choose an option</option>
        <option value="In Progress" {{ $edit->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
        <option value="On Hold" {{ $edit->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
        <option value="Deffered" {{ $edit->status == 'Deffered' ? 'selected' : '' }}>Deffered</option>
        <option value="Completed" {{ $edit->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        <option value="Failed to Deliver" {{ $edit->status == 'Failed to Deliver' ? 'selected' : '' }}>Failed to Deliver</option>
    </select>
  </div> 

{{-- <div class="form-group">
  <label for="status">Status</label><br>
  <select name="status" id="status" class="form-control">
    <option value="">-- Select Status --</option>
    @foreach ($statuses as $status)
    <option value="{{ $status }}" @if($edit->status==$status) selected="selected" @endif>{{ $status }}</option>
    @endforeach
  </select> --}}
@endif

                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>


 <div class="col-md-2">

      </div>


            </div>
            <!-- /.row -->
        </div>

                        <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection