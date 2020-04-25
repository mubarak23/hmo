@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Patient Data </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('doctor.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Priscriptions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Priscription Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
                  <th>Patient Name</th>
                  <th>Blood Group</th>
                  <th>Gender</th>
                  <th>Patient File</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @forelse($patient_data as $data)
                <td>{{ $data->id}}</td>
                  <td>{{ $data->first_name }} {{ $data->last_name }} 
                  </td>
                  <td>{{ $data->blood_group}}
                  </td>
                  <td>{{ $data->gender}}
                  </td>  
                  <td><a href="{{ route('doctor.patient_activity', ['patient_id' => $data->id ]) }}"><button class="btn btn-primary btn-sm">
                  View Patient File</button></a></td>
                  </td>
                  <td><a href="#add_priscription" data-toggle="modal" 
                      data-target="#admit_ward-{{ $data->id }}">
                      <button class="btn btn-primary btn-sm">
                  Admit Patient to Ward</button></a></td>
            <div class="modal fade" id="admit_ward-{{ $data->id }}">
            <div class="modal-dialog modal-sm">
            <form action="{{ route('nurse.admit_patient') }}" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Admit Patient to Ward</h4> 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <div class="form-group">
                  <label>Ward Name</label>
                  <input class="form-control" type="text"
                   placeholder="Enter Ward Name" name="ward_name" />
                  </div>
                    <div class="form-group">
                    <label>Ward Type</label>
                    <select class="form-control" name="ward_type">
                    <option value="male" class="form-input"> Male </option> 
                    <option value="female" class="form-input"> Female </option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Bed Number</label>
                  <input type="number" name="bed_number" class="form-control" />
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="nurse_id" value={{Auth()->user()->id}} />
                  </div>
                  
                  <div class="form-group">
                  <input type="hidden" name="patient_id" value={{ $data->id }} />
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








                  </tr>
                @empty
                  <p>No Patent Data Yet on the System</p>
                   
                @endforelse             
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->




 @endsection
