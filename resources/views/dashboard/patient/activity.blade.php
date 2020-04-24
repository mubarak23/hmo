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
                  <li class="nav-item"><a class="nav-link" href="#add_priscription" 
                  data-toggle="modal"  data-target="#add_priscription-{{ $doctor_activities->id }}">Add Priscription</a></li>

                 <div class="modal fade" id="add_priscription-{{ $doctor_activities->id }}">
        <div class="modal-dialog modal-sm">
        <form action="{{ route('doctor.add_priscription') }}" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Priscription</h4> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">

              <div class="form-group">
              <label>Select Drugs</label>
              @foreach ($drugs as $drug)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="drugs" value="{{ $drug->name }}">
                            {{ $drug->name }}
                        </label>
                    </div>
                @endforeach
              </div>

              <div class="form-group">
                  <label>Symptoms</label>
                  <textarea class="form-control" name="symptoms" rows="3"
                  placeholder="Symptoms"></textarea>
                </div>

                <div class="form-group">
                <label>Intake Period</label>
                <input type="text" name="period" />
                </div>

              <div class="form-group">
              <input type="hidden" name="patient_id" value={{$doctor_activities->id}} />
              </div

              <div class="form-group">
              <input type="hidden" name="status" value=1 />
              </div>
              <div class="form-group">
              <input type="hidden" name="doctor_id" value={{Auth()->user()->id}} />
              </div>

            
            <div class="modal-footer justify-content-between">
            {{ csrf_field() }}
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Give Priscription</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


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
                  <td><button class="btn btn-primary btn-sm"
                   data-toggle="modal"  data-target="#add_consultation-{{ $appointment->doctor->id }}">
                   Add Consultation Remark</button></td>

                   <div class="modal fade" id="add_consultation-{{ $appointment->doctor->id }}">
                   <div class="modal-dialog modal-sm">
                    <form action="{{ route('doctor.add_consultation') }}" method="post">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Consultation Remark</h4>
                          
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
                          <input type="hidden" name="doctor_id" value={{ $appointment->doctor->id }} />
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="patient_id" value={{$doctor_activities->id}} />
                        </div>
                        <div class="form-group">
                        <label>Remark</label>
                        <textarea class="form-control" name="symptoms" rows="3"
                         placeholder="Enter Consultation Remake /Symptoms"></textarea>
                        </div>
                        <div class="form-group">
                      <label>Next Appointment Date:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="next_appt_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                      </div>

                      <div class="form-group">
                      <div class="icheck-primary d-inline">
                      <label>Test Status </label>
                        <input type="radio" id="male" name="test_status" value="1" >
                        <label for="radioPrimary1">
                        Yes
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="female" name="test_status" value="0">
                        <label for="radioPrimary2">
                        No
                        </label>
                      </div>
                    </div>
                  <!-- /.input group -->
                </div>
                          
                        </div>
                        
                        <div class="modal-footer justify-content-between">
                        {{ csrf_field() }}
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Add Remark</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    </form>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal --> 
                  
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
                          Symptoms</h3>
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
                      <p>No Consultation details</p>
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