@extends('backend.layouts.app')
@section('content')

<div class="card-body">
    <div class="row">

      <div class="col-md-2">

      </div>
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register New Agent</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                  <form method="POST" action="{{ route('register_insert') }}">
                    @csrf
              <div class="card-body">
              <div class="col-md-12">
                    <div class="input-group mb-3">
                      <input type="text" name="name" class="form-control" placeholder="Full name" autofocus>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                    <input id="email" type="email"   placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"
                     value="{{ old('email') }}" required  autofocus>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>


            <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password"  placeholder="Password">
            
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
            </div>
            </div>
            
            
            <div class="input-group mb-3">
              <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required autocomplete="new-password">

            {{-- <input id="password-confirm" type="password"   placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}

            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
            </div>
            </div>
                
                    <div class="row">
                      <div class="col-8">
                        <div class="icheck-primary">
                          <input type="checkbox" id="terms" name="terms" required>
                          <label for="terms">
                           Confirm Registration for this Agent
                          </label>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
      
                </div>
                <!-- /.card-body -->

                {{-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}
            
            <!-- /.card -->
        </div>

 <div class="col-md-2">

      </div>
    </div>


            </div>
            <!-- /.row -->
        </div>
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