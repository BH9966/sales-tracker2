@extends('mazerpage.sales.layout')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sales list</h3>
                <p class="text-subtitle text-muted">View all sales done</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
           
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                        + Add New
                      </button>
                </nav>
                <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header">
          <h5 class="modal-title">Add New Sale</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card mb-0 border-0 shadow-none"> <!-- clean card -->
                  <div class="card-body">
                    <form class="form">
                      <div class="row g-2"> <!-- tighter spacing -->
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Muuzaji</label>
                          <select class="form-select form-select-sm">
                            <option value="square">Square</option>
                            <option value="rectangle">Rectangle</option>
                            <option value="rombo">Rombo</option>
                            <option value="romboid">Romboid</option>
                          </select>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Aina ya Biashara</label>
                          <select class="form-select form-select-sm">
                            <option value="square">Square</option>
                            <option value="rectangle">Rectangle</option>
                            <option value="rombo">Rombo</option>
                          </select>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Tarehe ya mauzo</label>
                          <input type="date" class="form-control form-control-sm">
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Garama</label>
                          <input type="number" class="form-control form-control-sm" step="0.1" min="0">
                        </div>
    
                        <div class="col-12 mb-2">
                          <label class="form-label small">Maelezo ya Garama</label>
                          <textarea class="form-control form-control-sm" rows="2"></textarea>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Company</label>
                          <input type="text" class="form-control form-control-sm">
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Email</label>
                          <input type="email" class="form-control form-control-sm">
                        </div>
    
                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary btn-sm">Add Sales</button>
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
          <h6 class="modal-title" id="editModalLabel">Edit Sale</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <section id="multiple-column-form">
          <div class="row match-height">
            <div class="col-12">
              <div class="card mb-0 border-0 shadow-none"> <!-- clean card -->
                <div class="card-body">
                  <form class="form">
                    <div class="row g-2"> <!-- tighter spacing -->
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Muuzaji</label>
                        <select class="form-select form-select-sm">
                          <option value="square">Square</option>
                          <option value="rectangle">Rectangle</option>
                          <option value="rombo">Rombo</option>
                          <option value="romboid">Romboid</option>
                        </select>
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Aina ya Biashara</label>
                        <select class="form-select form-select-sm">
                          <option value="square">Square</option>
                          <option value="rectangle">Rectangle</option>
                          <option value="rombo">Rombo</option>
                        </select>
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Tarehe ya mauzo</label>
                        <input type="date" class="form-control form-control-sm">
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Garama</label>
                        <input type="number" class="form-control form-control-sm" step="0.1" min="0">
                      </div>
  
                      <div class="col-12 mb-2">
                        <label class="form-label small">Maelezo ya Garama</label>
                        <textarea class="form-control form-control-sm" rows="2"></textarea>
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Company</label>
                        <input type="text" class="form-control form-control-sm">
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Email</label>
                        <input type="email" class="form-control form-control-sm">
                      </div>
  
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">Update Sales</button>
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
  <section class="section small">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">Sales List</h6>
      </div>
      <div class="card-body">
        <table class="table table-striped table-sm align-middle small" id="table1">
          <thead class="table-light">
            <tr>
              <th>N/D</th>
              <th>Biashara</th>
              <th>Muuzaji</th>
              <th>Tarehe</th>
              <th>Mauzo</th>
              <th>Garama</th>
              <th>Maelezo</th>
              <th>Cash Mpya</th>
              <th>Cash Jana</th>
              <th>Cash Leo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($value as $values)
            <tr>
              <td>{{$values->id}}</td>
              <td>{{$values->user->name}}</td>
              <td>{{$values->business->name}}</td>
              <td>{{ \Carbon\Carbon::parse($values->sale_date)->format('Y-m-d') }}</td>
              <td>{{$values->total_sales}}</td>
              <td>{{$values->cost}}</td>
              <td>{{$values->cost_description}}</td>
              <td>{{ $values->total_sales - $values->cost }}</td>
              <td>{{$values->cash_mkononi_jana}}</td>
              <td>{{ ($values->total_sales - $values->cost) + $values->cash_mkononi_jana }}</td>
              <td>
                <div class="d-flex gap-1">
                  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
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
  </section>
  
    
</div>
@endsection
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

                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Sales</span>
                    </a>
                    <ul class="submenu active">
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
                            <a href="#">Add Busness</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                            <use
                                xlink:href="{{asset('template/vendors/bootstrap-icons/bootstrap-icons.svg#person-fill')}}" />
                        </svg>
                        <span>User</span>
                    </a>
                    <ul class="submenu ">
                        
                        <li class="submenu-item ">
                            <a href="{{route('userlist')}}">Users</a>
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