@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Admission Lists Data </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('nurse.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Patients Admitted in Ward</li>
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
              <h3 class="card-title">Admission Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
                  <th>Patient Name</th>
                  <th>Ward Name</th>
                  <th>Bed Number</th>
                  <th>Admitted By</th>
                  <th>Checked By</th>
                  <th>Dsicharge Status</th>
                  <th>Patient File</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @forelse($admission_lists as $data)
                <td>{{ $data->id}}</td>
                  <td>{{ $data->patient->first_name }} {{ $data->patient->last_name }} 
                  </td>
                  <td>{{ $data->ward_name}}
                  </td>
                  <td>{{ $data->bed_number}}
                  </td>  
                  <td>
                    {{ $data->doctor->name}}
                  </td>
                  <td>{{ $data->nurse->name}}</td>
                  <td>{{ $data->discharge_status}}</td>
                  <td><a href="{{ route('nurse.patient_file', ['patient_id' => $data->id ]) }}"><button class="btn btn-primary btn-sm">
                  View Patient File</button></a></td>
                  </td>
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
