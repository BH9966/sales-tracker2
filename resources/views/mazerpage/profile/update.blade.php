@extends('mazerpage.profile.profilelayout')
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

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Audit Activity</span>
                    </a>
                    <ul class="submenu  ">
                        <li class="submenu-item ">
                            <a href="{{route('Activity_Logs')}}">ActivityLogs</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#sliders')}}" />
                        </svg>
                        <span>Settings</span>
                    </a>
                    <ul class="submenu active ">
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
<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Password</h4>
                </div>
                {{-- form start --}}
               <form action="">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <h6>Current Password</h6>
                            
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" id="current_pass" name="current_pass"
                                    placeholder="current password">
                                    <span id="verifypasss"></span>
                                    {{-- <p><small class="text-muted ">Find helper text here for given textbox.</small></p> --}}
                                <div class="form-control-icon mb-4">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>New Password</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" name="new_pass"
                                    placeholder="new password">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Comfirm Password</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" name="comfirm_pass"
                                    placeholder="cornfirm password">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <button name="updatepass"  class="btn btn-outline-primary w-50">Update Password</button>
                        </div>
                    </form>
                        {{-- form End --}}
                        {{-- <div class="col-sm-6">
                            <h6>Right Icon</h6>
                            <div class="form-group position-relative has-icon-right">
                                <input type="text" class="form-control"
                                    placeholder="Icon Right, Default Input">
                                <div class="form-control-icon">
                                    <i class="bi bi-bookmarks"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascript')
<script src="{{asset('template/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/js/pages/dashboard.js')}}"></script>

<script src="{{asset('template/js/main.js')}}"></script>
{{-- custome script --}}
<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/custom.js')}}"></script>

@endsection