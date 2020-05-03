@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Patient File Activity</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('doctor.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Patient File Activity</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                {{ $doctor_activities->first_name}} {{ $doctor_activities->last_name}}
                </h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Patient</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Gender</strong>
                <p class="text-muted">
                  {{ $doctor_activities->gender}}
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Blood Group</strong>
                <p class="text-muted">{{ $doctor_activities->blood_group}}</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Home Address</strong>
                <p class="text-muted">
                  {{ $doctor_activities->address}}
                </p>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#appointment" data-toggle="tab">Appointment</a></li>
                  <li class="nav-item"><a class="nav-link" href="#priscription" data-toggle="tab">Priscription</a></li>
                  <li class="nav-item"><a class="nav-link" href="#consultation" data-toggle="tab">Consultation</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="appointment">
                    <!-- Post -->
                    <!-- Post -->
                    <div class="post clearfix">
                        <div class="box-body">
                <table class="table table-bordered">
                <tr>
                  <th>id</th>
                  <th>Doctor Name </th>
                  <th>Appt. Time</th>
                  <th>Action</th>
                </tr>
                <tr>
                @foreach($patient_activities as $appointment)
                  <td>{{ $appointment->id}}</td>
                  <td>{{ $appointment->doctor->name}}</td>
                  <td>{{ $appointment->appt_time}}</td>
                  </tr>
                  @endforeach
                </table>
               </div>
                   </div>
                    <!-- /.post -->
                    <!-- /.post -->
                  </div>

           <!-- /.tab-pane -->
                  <div class="tab-pane" id="consultation">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      @forelse($doctor_activities->consultations as $consultation)
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ date('d-m-Y', strtotime($consultation->created_at)) }}
                        </span>
                      </div>

                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header">
                          Remark</h3>
                          <div class="timeline-body">
                            {{ $consultation->symptoms}}
                          </div>
                          <div class="timeline-header">
                            <p class="timeline-header"><b>Next Appointment Date</b></p>
                            {{ $consultation->next_appt_date}}
                          </div>
                          <div class="timeline-header">
                            <p class="timeline-header"><b>Test Status</b></p>
                            {{ $consultation->test_status}}
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->  
                      @empty
                      <p>No Consultation details</p>
                      @endforelse
                    </div>
                  </div>
                  <!-- /.tab-pane -->


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="priscription">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      @forelse($doctor_activities->priscriptions as $priscription)
                      <div class="time-label">
                        <span class="bg-danger">
                          {{ date('d-m-Y', strtotime($priscription->created_at)) }}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header">Symptoms</h3>
                          <div class="timeline-header">
                            {{ $priscription->symptoms}}
                          </div>
                          <div class="timeline-header">
                            <h5 class="timeline-header">Drugs</h5>
                            {{ $priscription->drugs}}
                          </div>
                          <div class="timeline-header">
                            <h5 class="timeline-header">Period Duration</h5>
                            {{ $priscription->period}}
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      @empty
                      <p>No Priscription details</p>
                      @endforelse
                      
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection