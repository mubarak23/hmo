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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
              <select name="drugs" class="custom-select" multiple data-live-search="true">
              @foreach($drugs as $drug)
              <option value={{$drug->name}} class="form-input"> {{$drug->name}} </option>
              @endforeach
              </select>
              </div>
              <div class="form-group">
              <input type="hidden" name="patient_id" value={{$doctor_activities->id}} />
              </div>
              <div class="form-group">
              <input type="hidden" name="doctor_id" value={{Auth()->user()->id}} />
              </div> 
            </div>
            <div class="modal-footer justify-content-between">
            {{ csrf_field() }}
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Assign Role</button>
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
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="priscription">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
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