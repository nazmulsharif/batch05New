@extends('backEnd.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">RecentWork Category Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">RecentWork Category</li>
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
                  Manage Logo
                </h2>
                <a href="{{Route('recentWorksCategory.create')}}" class="btn btn-primary float-sm-right">
                    <i class="fa fa-plus-circle"></i>
                  Add Category
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
                      <th>Name</th>
                      <th>User Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($recentWorksCategory as $category)
                       <tr>
                           <td>{{ $loop->index+1 }}</td>
                           <td>{{ $category->name }}</td>
                           <td>{{ $category->user->name }}</td>
                           <td>
                               @if($category->status == true)
                                   <a href="{{asset('/')}}recentWorksCategory/statusChange/{{$category->id}}/{{$category->status}}" class="btn btn-success">published</a>
                               @else
                                   <a href="{{ asset('/')}}recentWorksCategory/statusChange/{{$category->id}}/{{$category->status}}" class="btn btn-danger">unpublished</a>
                               @endif
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
