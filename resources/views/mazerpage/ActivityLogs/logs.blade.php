
@extends('mazerpage.layout')
@section('sidebar')
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('dashboard')}}"><img src="{{asset('template/images/logo/logo.png')}}" width="130px" alt="Logo"><br>
                        <h5>{{Auth::guard('users')->user()->email}}</h5>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  ">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Sales</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('salepage')}}">Sales List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#briefcase-fill')}}" />
                        </svg>
                        <span>Busness</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('busness')}}">Busness list</a>
                        </li>
                        <li class="submenu-item ">
                          <a href="{{route('usersbusness')}}"> Users Busness </a>
                      </li>
                     
                    </ul>
                </li>

                <li class="sidebar-item   has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#person-fill')}}" />
                        </svg>
                        <span>User</span>
                    </a>
                    <ul class="submenu ">
                        
                        <li class="submenu-item ">
                            <a href="{{route('users')}}">Users</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Audit Activity</span>
                    </a>
                    <ul class="submenu active ">
                        <li class="submenu-item ">
                            <a href="{{route('Activity_Logs')}}">ActivityLogs</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#sliders')}}" />
                        </svg>
                        <span>Settings</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('profileUpdate')}}">Profile</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('logout')}}">Log out</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
@endsection
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Audit Records list</h3>
                <p class="text-subtitle text-muted">View activity Done</p>
            </div>
           
        </div>
    </div>


    <!-- Edit Modal -->
<!-- Edit Modal -->
  
  <!-- Sales List -->
  <section class="section small">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h6 class="mb-0">Audit Records</h6>
      </div>
      <div class="card-body">
      
        <table class="table table-striped table-sm align-middle small" id="table1">
          <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Action</th>
                <th>Record ID</th>
                <th>User</th>
                <th>Old Data</th>
                <th>New Data</th>
                <th>Date</th>
            </tr>
          </thead>
          <tbody>
            {{-- start --}}

            @foreach($logs as $key=> $log)
                <tr>
                    <td>{{$logs->firstItem() + $key}}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->record_id }}</td>
                    <td>{{ $log->user->name ?? 'System' }}</td>
                    <td>
                      @if($log->old_data)
                      <p><strong>Old Data:</strong></p>
                      <ul>
                        @foreach($log->readable_old_data as $key => $value)
                    <li>{{ ucfirst($key) }}: {{ $value }}</li>
                       @endforeach
        
                      </ul>
                      @endif
                    </td>
                    <td>
                        @if($log->new_data)
                        <p><strong>New Data:</strong></p>
                        <ul>
                            @foreach($log->readable_new_data as $key => $value)
                                <li>{{ ucfirst($key) }}: {{ $value }}</li>
                            @endforeach
                        </ul>
                    @endif
                    </td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
            {{-- End  --}}
          </tbody>
        </table>
        {{$logs->links()}}
      </div>
    </div>
  </section>
  
    
</div>
    
@endsection
@section('javascript')
<script src="{{asset('template/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/js/pages/dashboard.js')}}"></script>

<script src="{{asset('template/js/main.js')}}"></script>
    
@endsection
