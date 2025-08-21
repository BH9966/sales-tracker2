@extends('layout')
@section('sidebar')
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="{{route('dashboard')}}" class="brand-link">
        <!--begin::Brand Image-->
        <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">AdminLTE 4</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
          aria-label="Main navigation" data-accordion="false" id="navigation">
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Dashboard
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link ">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('salepage')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Sales</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Report
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('report')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Sales Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('userlist')}}" class="nav-link active">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('adduser')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Add user</p>
                </a>
              </li>
            </ul>
          </li>
       
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-table"></i>
              <p>
                Settings
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./tables/simple.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Profile Setting</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-header">
    <h3 class="card-title">Sales</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">SN</th>
          <th scope="col">Muuzaji</th>
          <th>Email</th>
          <th scope="col">Aina ya Biashara</th>
          <th>Action</th>
     
        </tr>
      </thead>
      <tbody>
        
          @foreach ($data as $datas )
          <tr class="align-middle">
          <td>   {{$datas->id}}</td>
          <td> {{$datas->name}} </td>
          <td>{{$datas->email}}</td>
          <td>  @foreach ($datas->businesses as $biz)
            {{ $biz->type }}<br>
           @endforeach</td>
          <td>
            <a href="#" class="btn btn-danger w-25">Delete</a>
            <a href="#" class="btn btn-success w-25" >edit</a>
        </td>
      </tr>
          @endforeach
         
        
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

    
@endsection