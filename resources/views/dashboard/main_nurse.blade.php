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
              <li class="breadcrumb-item active"><a 
              href="#add_priscription" 
                  data-toggle="modal"  data-target="#update_profile-{{ Auth()->user()->id }}"
              >Update Profile</a></li>
            <div class="modal fade" id="update_profile-{{ Auth()->user()->id }}">
            <div class="modal-dialog modal-sm">
            <form action="{{ route('nurse.update') }}" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Profile</h4> 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <div class="form-group">
                  <label>Field Of Study</label>
                  <input class="form-control" type="text" placeholder="Enter Field of study" name="field_study" />
                  </div>
                    <div class="form-group">
                    <label>Off Days</label>
                    <input class="form-control" type="text" placeholder="Enter Off days" name="off_days" />
                    </div>
                  <div class="form-group">
                  <input type="hidden" name="user_id" value={{Auth()->user()->id}} />
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="name" value={{Auth()->user()->name}} />
                  </div>
                    <div class="modal-footer justify-content-between">
                    {{ csrf_field() }}
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                </form>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- ./col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- ./col -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> 
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <section>
        <div class="row">

          <div class="col-md-6">

            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Patients Lists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Blood Group</th>
                  <th>Action</th>
                </tr>
                <tr>
                @foreach($patient_data as $data)
                  <td>{{$data->id}}</td>
                  <td>{{$data->first_name}} {{ $data->last_name }}</td>
                  <td>
                   {{$data->gender}}
                  </td>
                  <td><span class="badge bg-red">{{ $data->blood_group}}</span></td>
                  <td>
                  <div class="btn-group">
                  <button class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#make_appointment-{{ $data->id }}">Make Appointment</button>
                
                <div class="modal fade" id="make_appointment-{{ $data->id }}">
                <div class="modal-dialog modal-sm">
                <form action="{{ route('appointment.post') }}" method="post">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Make Appointment</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <div class="modal-body">
                      <div class="form-group">
                      <select class="form-control" name="doctor_id">
                      @foreach($doctors as $doctor)
                      <option value={{$doctor->user_id}} class="form-input"> {{$doctor->name}} </option>
                      @endforeach
                      </select>
                      </div>
                      <div class="form-group">
                      <input type="hidden" name="patient_id" value={{$data->id}} />
                      </div>
                      <div class="form-group">
                      <input type="time" name="appt_time" class="form-control" />
                      </div>
                       <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" name="remark" rows="3" placeholder="Enter A Remark"></textarea>
                    
                    </div>     

                      
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                    {{ csrf_field() }}
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Make Appointment</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                </form>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
                  </div>
                  <div class="btn-group">
                  <a href="{{ route('doctor.patient_activity', ['patient_id' => $data->id ]) }}"><button class="btn btn-primary btn-sm">
                  View Patient File</button></a>
                  </div>
                   
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->


        </div> 

        <div class="col-md-6">

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Admitted Patients in Ward</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </div>

        

      </div>
      </section>

      <section>
      <div class="row">
      <div class="col-md-6">
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Staff Activities</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

      </div>

      <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Patients Record Satus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->


      </div>
      </div>
      </section>
     @endsection