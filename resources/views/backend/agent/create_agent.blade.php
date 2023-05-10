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
                <h3 class="card-title">Add Agent Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ URL::to('/insert_agent/'.$user->id) }}" method="post" enctype="multipart/form-data">
              	@csrf 
                <div class="card-body">
                  
                  

<div class="form-group">
  <label for="usersID">Agent ID</label>
  <input type="text" name="usersID"  class="form-control @error('slug') is-invalid @enderror"
   id="usersID"   readonly value="{{ $user->id }}">
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

<div class="form-group">
    <label for="agentName">Agent Name</label>
    <input type="text" name="agentName" class="form-control" id="agentName" readonly value="{{ $user->name }}">
   
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

<div class="form-group">
  <label for="agentCat">Agent Category</label><br>
  <select name="agentCat" id="agentCat" class="form-control">
    <option value="">Choose an option</option>
    <option value="Forwarding Agent">Forwarding Agent</option>
    <option value="Delivery Agent">Delivery Agent</option>
    <option value="Fulfillment Agent">Fulfillment Agent</option>
    <option value="Both Fulfillment and Delivery Agent">Both Fulfillment and Delivery Agent</option>
  </select>
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
           

<div class="form-group">
  <label for="registrationNum">Agent Registration Number</label>
  <input type="text" name="registrationNum"  class="form-control @error('slug') is-invalid @enderror"
   id="registrationNum" placeholder="Enter Registration Number ">
  
  @error('slug')
  <span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

  <div class="form-group">
    <label for="contact">Contact</label>
    <input type="text" name="contact"  class="form-control @error('slug') is-invalid @enderror"
     id="contact" placeholder="Enter Contact ">
    
    @error('slug')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address"  class="form-control @error('slug') is-invalid @enderror"
       id="contact" placeholder="Enter Address">
      
      @error('slug')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>

      <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city"  class="form-control @error('slug') is-invalid @enderror"
         id="city" placeholder="Enter City">
        
        @error('slug')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
          <label for="postcode">Postcode</label>
          <input type="text" name="postcode"  class="form-control @error('slug') is-invalid @enderror"
           id="postcode" placeholder="Enter Postcode">
          
          @error('slug')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
          </div>

        
      <div class="form-group">
        <label for="state">State</label>
        <input type="text" name="state"  class="form-control @error('slug') is-invalid @enderror"
         id="state" placeholder="Enter State">
        
        @error('slug')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" name="country"  class="form-control @error('slug') is-invalid @enderror"
           id="country" placeholder="Enter Country">
          
          @error('slug')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
          </div>

          <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" name="remarks"  class="form-control @error('slug') is-invalid @enderror"
             id="remarks" placeholder="Enter Remarks">
            
            @error('slug')
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