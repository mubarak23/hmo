@extends('layouts.auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>HMO</b>System</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Doctor Account OnBording</p>

      <form action="{{ route('doctor.onboarding') }}"  method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <input type="hidden" name="name" value={{ $user_data->name }} >
            <input type="hidden" name="user_id" value={{ $user_data->id }}>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="specialist" class="form-control" placeholder="Specialisty">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="office_no" class="form-control" placeholder="Office Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="consultation_hours" class="form-control" placeholder="Consultation Hours">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
          {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection