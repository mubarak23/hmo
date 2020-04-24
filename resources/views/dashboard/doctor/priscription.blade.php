@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ Auth()->user()->name}} Priscriptions List</h1>
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
                  <th>Patient Name</th>
                  <th>Symptoms</th>
                  <th>Drugs</th>
                  <th>Period Durations</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @forelse($doctor_priscriptions as $priscription)
                  <td>{{ $priscription->patient->first_name }} 
                  {{ $priscription->patient->last_name }}</td>
                  <td>{{ $priscription->symptoms }}
                  </td>
                  <td>{{ $priscription->drugs}}</td>
                  <td>{{ $priscription->period }}</td>
                  <td><a href="{{ route('doctor.patient_activity', ['patient_id' => $priscription->patient->id ]) }}"><button class="btn btn-primary btn-sm">
                  View Patient File</button></a></td>
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
