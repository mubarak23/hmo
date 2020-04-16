@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="row">
          
          <!-- /.col -->

            <!-- left column -->
          <div class="col-md-6">
            <!-- Register Patient Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register Patients</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">

                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="email" class="form-control" 
                    id="first_name" name="first_name" placeholder="Enter First Name">
                  </div>

                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="password" name="last_name" class="form-control" 
                     id="last_name" placeholder=" Last Name">
                  </div>

                  <div class="form-group">
                    <label for="middlename">Last Name</label>
                    <input type="password" name="middlename" class="form-control" 
                     id="middlename" placeholder="Middle Name">
                  </div>

                  <div class="form-group">
                    <label for="profile_pic">Profile Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="profile_pic" id="profile_pic">
                        <label class="custom-file-label" for="profile_pic">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="male" name="gender" >
                        <label for="radioPrimary1">
                        Male
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="female" name="gender">
                        <label for="radioPrimary2">
                        Female
                        </label>
                      </div>
                    </div>

                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="blood_group" name="blood_group" >
                        <label for="blood group">
                        A
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="blood_group" name="blood_group">
                        <label for="Blood Group">
                        0
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="blood_group" name="blood_group" >
                        <label for="Blood Group">
                          0+
                        </label>
                      </div>
                    </div>


                <div class="form-group">
                  <label>Date masks:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="date_birth" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label for="phone number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" 
                     id="phone_number" placeholder="Phone Number">
                 </div>
                
                <div class="form-group">
                    <label for="phone number">Email Address</label>
                    <input type="text" name="email" class="form-control" 
                     id="email" placeholder="Email Address">
                 </div>

                 <div class="form-group">
                    <label>Home Address</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Home Address"></textarea>
                 </div>     


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>
          </div>
          
        <!-- Main row -->
        </div>
      </div>
      </section>
        
        @endsection