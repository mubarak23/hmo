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
                     <td><a href="#"><button class="btn btn-primary btn-sm">
                  Admit Patient to Ward</button></a></td>
                  </td>
                  </tr>
                @empty
                  <p>No Priscriptions Issues</p>
                   
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
