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
                    <form action="{{route('sale_submit')}}"  method="post" class="form">
                      @csrf
                      <div class="row g-2"> <!-- tighter spacing -->
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Muuzaji</label>
                          <select class="form-select form-select-sm" name="muuzaji" required>
                            <option>Chagua Muuzaji....</option>
                            @foreach ($user as $users )
                            <option value="{{$users->id}}">{{$users->name}}</option>
                            @endforeach
                        
                          </select>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Aina ya Biashara</label>
                          <select class="form-select form-select-sm" name="biashara" required>
                            <option>Select busness....</option>
                           @foreach ($busness as $kazi )
                           <option value="{{$kazi->id}}">{{$kazi->name}}</option>
                           @endforeach
                          </select>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Tarehe ya mauzo</label>
                          <input type="date" class="form-control form-control-sm" name="tarehe_mauzo" required>
                        </div>
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Mauzo</label>
                          <input type="number" class="form-control form-control-sm" name="mauzo" step="0.1" min="0" required>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Garama</label>
                          <input type="number" class="form-control form-control-sm" name="garama" step="0.1" min="0" required>
                        </div>
    
                        <div class="col-12 mb-2">
                          <label class="form-label small">Maelezo ya Garama</label>
                          <textarea class="form-control form-control-sm" rows="2" name="maelezo" required></textarea>
                        </div>
    
                        <div class="col-md-6 mb-2">
                          <label class="form-label small">Cash Jana</label>
                          <input type="number" class="form-control form-control-sm" step="0.1" min="0"  name="cash_jana" required>
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
                  <form method="post" id="editForm">
                    @csrf
                    @method('PUT') 
                    <input type="hidden" id="editsalesID" name="id">
                    <div class="row g-2"> <!-- tighter spacing -->
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Muuzaji</label>
                        <select class="form-select form-select-sm" name="muuzaji" id="editmuuzaji">
                          <option>Chagua Muuzaji....</option>
                          @foreach ($user as $users )
                          <option value="{{$users->id}}">{{$users->name}}</option>
                          @endforeach
                        </select>
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Aina ya Biashara</label>
                        <select class="form-select form-select-sm" name="biashara" id="editbiashara">
                          <option>Select busness....</option>
                          @foreach ($busness as $kazi )
                          <option value="{{$kazi->id}}">{{$kazi->name}}</option>
                          @endforeach
                        </select>          
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Tarehe ya mauzo</label>
                        <input type="date" class="form-control form-control-sm" name="tarehe_mauzo" id="editdate" >
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Mauzo</label>
                        <input type="number" class="form-control form-control-sm" name="mauzo" id="editmauzo" step="0.1" min="0">
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Garama</label>
                        <input type="number" class="form-control form-control-sm" name="garama" id="editgarama" step="0.1" min="0">
                      </div>
  
                      <div class="col-12 mb-2">
                        <label class="form-label small">Maelezo ya Garama</label>
                        <textarea class="form-control form-control-sm" name="maelezo" id="editmaelezo" rows="2"></textarea>
                      </div>
  
                      <div class="col-md-6 mb-2">
                        <label class="form-label small">Cash Jana</label>
                        <input type="number" step="0.1" min="0" name="cash_jana" id="editcash" class="form-control form-control-sm">
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
      <div class="card-header d-flex justify-content-between">
        <h6 class="mb-0">Sales List</h6>
        <div><a class="btn btn-outline-secondary" href="{{route('salesinvoice')}}"><i class="bi bi-file-earmark-pdf mx-1"></i>Download PDF</a> 
          <button type="button" class="btn btn-outline-secondary mx-3 "><i class="bi bi-download mx-2" width="32" height="32"></i>Download Excel</button></div>
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
              <td>{{number_format($values->total_sales, 2, '.',',')}}</td>
              <td>{{  number_format($values->cost, '2','.',',')  }}</td>
              <td>{{$values->cost_description}}</td>
              <td>{{ number_format( $values->total_sales - $values->cost , '2','.',',')}}</td>
              <td>{{ number_format($values->cash_mkononi_jana,'2','.',',')  }}</td>
              <td>{{ number_format( ($values->total_sales - $values->cost) + $values->cash_mkononi_jana ,'2','.',',')}}</td>
              <td>
                <div class="d-flex gap-1">
                  <button class="btn btn-primary btn-sm editBtn"
                  data-id="{{ $values->id }}"
                  data-name="{{$values->user->id}}"
                  data-busness="{{$values->business->id}}"
                  data-date="{{ \Carbon\Carbon::parse($values->sale_date)->format('Y-m-d') }}"
                  data-sale="{{$values->total_sales}}"
                  data-cost="{{$values->cost}}"
                  data-descript ="{{$values->cost_description}}"
                  data-cash="{{$values->cash_mkononi_jana}}"
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
        {{$value->links()}}
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
                          <a href="{{route('usersbusness')}}"> Users Busness </a>
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