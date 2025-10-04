@extends('mazerpage.layout')
@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Darshboard</h3>
        
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>

            </ol>
        </nav>
    </div>
</div>
<div class="page-content w-100">
    <section class="row mx-5 w-100">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6 mx-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Sales</h6>
                                    <h6 class="font-extrabold mb-0">{{count($sales)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6 mx-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Users</h6>
                                    <h6 class="font-extrabold mb-0">{{count($user)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6 mx-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Busness</h6>
                                    <h6 class="font-extrabold mb-0">{{count($busness)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chat</h4>
                        </div>
                        <div class="card-body">
                            <div id="container" class="w-100" style="height:400px;"></div>
                        </div>
                    </div>
                </div>
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
                    <div class="logo_sales"><a href="{{route('dashboard')}}"><img src="{{asset('template/images/logo/logo.png')}}" sizes="100%" height="100%" alt="Logo"><br></div>
                        <h6>{{Auth::guard('users')->user()->email}}</h6>
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

                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
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
@section('javascript')
<script src="{{asset('template/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('template/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('template/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('template/js/main.js')}}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @vite('resources/js/app.js')
<script>
document.addEventListener('DOMContentLoaded', function () {
//    start here
// Highcharts.chart('container', {
//     chart: {
//         type: 'pie',
//         zooming: {
//             type: 'xy'
//         },
//         panning: {
//             enabled: true,
//             type: 'xy'
//         },
//         panKey: 'shift'
//     },
//     title: {
//         text: 'Sales per Business'
//     },
//     tooltip: {
//         valueSuffix: 'TZS'
//     },
//     subtitle: {
//         text:
//         'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             cursor: 'pointer',
//             dataLabels: [{
//                 enabled: true,
//                 distance: 20
//             }, {
//                 enabled: true,
//                 distance: -40,
//                 format: '{point.name}: {point.percentage:.1f}%',
//                 style: {
//                     fontSize: '1.2em',
//                     textOutline: 'none',
//                     opacity: 0.7
//                 },
//                 filter: {
//                     operator: '>',
//                     property: 'percentage',
//                     value: 10
//                 }
//             }]
//         }
//     },
//     series: [{
//             name: 'Total Sales',
//             colorByPoint: true,
//             data: [
//                 @foreach($salesByBusiness as $sale)
//                     { name: '{{ $sale->business->name }}', y: {{ $sale->total }} },
//                 @endforeach
//             ]
//         }]
// });
// // end here



Highcharts.chart('container', {
    chart: { type: 'pie' },
    title: { text: 'Sales per Business' },
    tooltip: { valueSuffix: ' TZS' },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: { 
                enabled: true, 
                format: '{point.name}: {point.percentage:.1f}%' 
            }
        }
    },
    series: [{
        name: 'Total Sales',
        colorByPoint: true,
        data: [
            @foreach($salesByBusiness as $sale)
                {
                    name: '{{ $sale->business->name }}',
                    y: {{ $sale->total }},
                    @if($sale->business->name === 'SuperMarket') 
                        sliced: true, 
                        selected: true
                    @endif
                },
            @endforeach
        ]
    }]
});


});

</script>
@endsection