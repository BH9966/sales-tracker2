@extends('mazerpage.usepage.userlayout')
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

                <li class="sidebar-item active  has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#person-fill')}}" />
                        </svg>
                        <span>User</span>
                    </a>
                    <ul class="submenu active">
                        
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
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="form-element-input.html">Input</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="form-element-input-group.html">Input Group</a>
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
                            <a href="auth-login.html">Profile</a>
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
@section('javascript')
<script src="{{asset('template/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/js/pages/dashboard.js')}}"></script>

<script src="{{asset('template/js/main.js')}}"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".editBtn").forEach(btn => {
        btn.addEventListener("click", function() {
          const id = this.dataset.id;
            const name = this.dataset.name;
            const email = this.dataset.email;
            const role = this.dataset.role;
            const created = this.dataset.created;

            document.getElementById("editUserId").value = id;
            document.getElementById("editName").value = name;
            document.getElementById("editEmail").value = email;
            document.getElementById("editcreatedby").value = created;
            document.getElementById("editRole").value = role;

            document.getElementById("editForm").action = "users/" + id;
        });
    });
});
</script>

@endsection
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Users</h3>
                <p class="text-subtitle text-muted">View all Users</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
           
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                        + Add User 
                      </button>
                </nav>
                <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header">
          <h5 class="modal-title">Add new User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card mb-0 border-0 shadow-none"> <!-- clean card -->
                  <div class="card-body">
                    
                    <form action="{{route('adduser_submit')}}" method="post">
                        @csrf
                      <div class="row g-2">
                           
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name">
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email">
                      </div>  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Password</label>
                        <input type="password" class="form-control form-control-sm" name="password">
                      </div>  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Cornfirm Password</label>
                        <input type="password" class="form-control form-control-sm" name="password_confirmation">
                      </div>  
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Role</label>
                          <select class="form-select form-select-sm" name="role" required>
                            <option>Select role....</option>
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="user">User</option>
                          </select>
                        </div>
    
                        {{-- <div class="col-md-6 mb-2">
                          <label class="form-label small">Created_by</label>
                          <select class="form-select form-select-sm" name="created_by" required>
                            <option >select user....</option>
                            @foreach ($users as $user )
                            <option value="{{$user->id}}">{{$user->name}}</option>  
                            @endforeach
                          </select>
                        </div> --}}
    
                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary btn-sm">Add User Busness</button>
                        </div>
    
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>
    </div>
  </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content small"> <!-- small text -->
        
        <div class="modal-header">
          <h6 class="modal-title" id="editModalLabel">Edit User details</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <section id="multiple-column-form">
          <div class="row match-height">
            <div class="col-12">
              <div class="card mb-0 border-0 shadow-none"> <!-- clean card -->
                <div class="card-body">
                    <form method="post" id="editForm">
                      @csrf
                      @method('PUT') 
                      <input type="hidden" id="editUserId" name="id">
                      <div class="row g-2">
                           
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Name</label>
                        <input type="text" class="form-control form-control-sm" id="editName" name="name" >
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Email</label>
                        <input type="text" class="form-control form-control-sm" id="editEmail" name="email" >
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Password</label>
                        <input type="password" class="form-control form-control-sm" id="editpassword" name="password">
                      </div>  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Cornfirm Password</label>
                        <input type="password" class="form-control form-control-sm" id="editpasswordtwo" name="password_confirmation">
                      </div>  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Role</label>
                        <select class="form-select form-select-sm" name="role" id="editRole" required>
                          <option>Select role....</option>
                          <option value="admin">Admin</option>
                          <option value="super_admin">Super Admin</option>
                          <option value="user">User</option>
                        </select>
                      </div>
    
                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary btn-sm">Update user</button>
                        </div>
    
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
  
      </div>
    </div>
  </div>
  
  <!-- Sales List -->
{{-- start --}}

<section class="section small">
  <div class="card">
    <div class="card-header">
      <h6 class="mb-0">Users Busness</h6>
    </div>
    <div class="card-body">
      <table class="table table-striped table-sm align-middle small" id="table1">
        <thead class="table-light">
          <tr>
            <th>N/D</th>
            <th>name</th>
            <th>Email</th>
            <th>Role</th>
            <th>created_by</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         
          @foreach($users as $user)
          <tr class="align-middle">
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ ucfirst($user->role) }}</td>
          <td> {{ $user->user ? $user->user->name : 'superAdmin' }}</td>
          <td>
              <div class="d-flex gap-1">
                  <button class="btn btn-primary btn-sm editBtn"
                     data-id="{{ $user->id }}"
                     data-name="{{ $user->name }}"
                     data-email="{{ $user->email }}"
                     data-role="{{ $user->role }}"
                     data-created="{{ $user->user ? $user->user->name : 'Self' }}"
                      data-bs-toggle="modal" 
                      data-bs-target="#editModal">
                    Edit
                  </button>
                  <button class="btn btn-danger btn-sm">Delete</button>
                </div>
        </td>
      </tr>
      @endforeach
        </tbody>
      </table>
      {{$users->links()}}
    </div>
  </div>
</section>





{{-- end --}}








  {{-- <section class="section small">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">Users Busness</h6>
      </div>
      <div class="card-body">
        <table class="table table-striped table-sm align-middle small" id="table1">
          <thead class="table-light">
            <tr>
              <th>N/D</th>
              <th>name</th>
              <th>Email</th>
              <th>Role</th>
              <th>created_by</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
           
                @foreach($users as $userss)
                <tr class="align-middle">
                <td>{{ $userss->id }}</td>
                <td>{{ $userss->name }}</td>
                <td>{{ $userss->email }}</td>
                <td>{{ ucfirst($userss->role) }}</td>
                <td> {{ $userss->user ? $userss->user->name : 'superAdmin' }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-primary btn-sm editBtn"
                           data-id="{{ $userss->id }}"
                           data-name="{{ $userss->name }}"
                           data-email="{{ $userss->email }}"
                           data-role="{{ $userss->role }}"
                           data-created="{{ $userss->user ? $userss->user->name : 'Self' }}"
                            data-bs-toggle="modal" 
                            data-bs-target="#editModal">
                          Edit
                        </button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                      </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section> --}}
  
    
</div>
    
@endsection