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
        <span class="brand-text fw-light">Sales Report</span>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
                <a href="{{route('salepage')}}" class="nav-link ">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('busness')}}" class="nav-link active">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Busness</p>
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
                <a href="{{route('userlist')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./widgets/cards.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Cards</p>
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
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
          <!--begin::Col-->
          
          <!--end::Col-->
          <!--begin::Col-->
          <div class="col-md-6">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
              <!--begin::Header-->
              <div class="card-header"><div class="card-title">Add Busness to User</div></div>
              <!--end::Header-->
              <!--begin::Form-->
                 {{-- Show success message --}}
                {{-- Success message --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-3 mt-2" role="alert">
                        <strong>Error</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @endif

                {{-- Error message --}}
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mx-3 mt-2" role="alert">
                     {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger mx-3 mt-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form method="post" action="{{route('busness_submit')}}">
                @csrf
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"  name="name" value="{{ old('name') }}"
                        />
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Select Busness </label>
                        <select class="form-select" id="validationCustom04"  name="busness_type"  required>
                          <option selected disabled value="">Choose...</option>
                          <option>Butcher</option>
                          <option>SuperMarket</option>
                          <option>CarWash</option>
                          <option>Genge</option>
                        </select>
                        <div class="invalid-feedback">Please select a Busness.</div>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Select User </label>
                        <select class="form-select" id="validationCustom04" name="created_by" required>
                          <option selected disabled >Choose...</option>
                          @foreach ($datas as  $data)
                          <option value="{{$data->id}}" {{ old('created_by') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                          @endforeach
                          
                        </select>
                        <div class="invalid-feedback">Please select a user.</div>
                      </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Footer-->
              </form>
              <!--end::Form-->
            </div>
            <!--end::Quick Example-->
            <!--begin::Input Group-->

            <!--end::Horizontal Form-->
          </div>
          <!--end::Col-->
          <!--begin::Col-->
          <!--end::Col-->
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>

{{-- <form method="post" action="{{route('busness_submit')}}">
    @csrf
    <!--begin::Body-->
    <div class="card-body">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"  name="name" value="{{ old('name') }}"
            />
          </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"  name="email" value="{{ old('email') }}"
        />
        <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" value="{{ old('email') }}"  name="password"/>
      </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!--end::Footer-->
  </form> --}}
@endsection