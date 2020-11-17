@extends('backEnd.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">slider Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">slider</li>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">
                  Manage slider
                </h2>
                <a href="{{Route('slider.create')}}" class="btn btn-primary float-sm-right">
                    <i class="fa fa-plus-circle"></i>
                  Add slider
                </a>
              </div>
              <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session()->get('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>                    
                      <th>Image</th>
                      <th>Slider Description</th>
                      <th>Priority</th>
                      <th>User Name</th>     
                      <th>Status</th>     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sliders as $key=>$slider)
                    <tr>
                      <td>{{ $key+1}}</td>
                      <td>{{ $slider->title }}</td>
                     
                      <td>
                        <img src="{{ Storage::url($slider->image) }}" alt="" width="100px">
                       
                      </td>
                      <td>
                        {{ $slider->slider_desc}}
                      </td>
                      <td>
                        {{ $slider->priority }}
                      </td>
                      <td>
                        {{ $slider->user->name}}
                      </td>
                      <td>
                        @if($slider->status == true)
                          <a href="{{asset('/')}}slider/statusChange/{{$slider->id}}/{{$slider->status}}" class="btn btn-success">published</a>
                        @else
                          <a href="{{ asset('/')}}slider/statusChange/{{$slider->id}}/{{$slider->status}}" class="btn btn-danger">unpublished</a>
                        @endif
                      </td>
                      <td>
                        <a href="{{ Route('slider.edit', $slider->id) }}" class="btn btn-primary">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ Route('user.delete', $slider->id) }}" class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>


        
              </div>
            </div>
          </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @endsection