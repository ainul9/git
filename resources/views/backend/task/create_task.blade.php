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
                <h3 class="card-title">Add Agent's Task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ URL::to('/insert_task/'.$user->id) }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body"> 

<div class="form-group">
  <label for="usersID">Agent ID</label>
  <input type="text" name="usersID" class="form-control" id="usersID" value="{{ $user->id }}" readonly>
</div>

<div class="form-group">
  <label for="agentID">Agent Name</label>
  <input type="text" name="agentID" class="form-control" id="agentName" value="{{ $user->name }}" readonly>
</div>


<div class="form-group">
<label for="productID">Product ID</label>
<input type="text" name="productID"  class="form-control @error('title') is-invalid @enderror"
 id="productID" placeholder="Enter Product ID or Product Code">

@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
<label for="ProductName">Product Name</label>
<input type="text" name="ProductName"  class="form-control @error('slug') is-invalid @enderror"
 id="ProductName" placeholder="Enter Product Name">

@error('slug')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" name="quantity"  class="form-control @error('title') is-invalid @enderror"
     id="quantity" placeholder="Enter Quantity">
    
    @error('title')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
    
    <div class="form-group">
      <label for="service">Type of Service</label><br>
      <select name="service" id="service" class="form-control" >
        <option value="">Choose an option</option>
        <option value="Door to Door">Door to Door</option>
        <option value="Forwarding">Forwarding</option>
        <option value="Pick and Pack">Pick and Pack</option>
      </select>
      
      @error('title')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
    
    <div class="form-group">
    <label for="pickupAdd">Pickup Address</label>
    <input type="text" name="pickupAdd"  class="form-control @error('slug') is-invalid @enderror"
     id="pickupAdd" placeholder="Enter Pickup Address">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="pickupDate">Pickup Date & Time</label>
      <input type="datetime-local" name="pickupDate"  class="form-control @error('slug') is-invalid @enderror"
       id="pickupDate" placeholder="Enter Pickup Date & Time">
      
      @error('slug')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>
  
    <div class="form-group">
      <label for="deliveryAdd">Delivery Address</label>
      <input type="text" name="deliveryAdd"  class="form-control @error('title') is-invalid @enderror"
       id="deliveryAdd" placeholder="Enter Delivery Address">
      
      @error('title')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>

      <div class="form-group">
        <label for="deliveryDate">Delivery Date & Time</label>
        <input type="datetime-local" name="deliveryDate"  class="form-control @error('slug') is-invalid @enderror"
         id="deliveryDate" placeholder="Enter Delivery Date & Time">
        
        @error('slug')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    
      <div class="form-group">
        <label for="remarks">Remarks</label>
        <input type="text" name="remarks"  class="form-control @error('title') is-invalid @enderror"
         id="remarks" placeholder="Enter Remarks">
        
        @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
                <label for="status">Update Status</label><br>
                <select name="status" id="status" class="form-control">
                  <option value="">Choose an option</option>
                  <option value="Assigned">Assigned</option>
                  <option value="In Progress">In Progress</option>
                  <option value="On Hold">On Hold</option>
                  <option value="Deffered">Deffered</option>
                  <option value="Completed">Completed</option>
                  <option value="Failed to Deliver">Failed to Deliver</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
                
                @error('title')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
                 
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