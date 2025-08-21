<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
 @include('style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
   @include('header')
    <!--end::Header-->
    <!--begin::Sidebar-->
   @yield('sidebar')
    <!--end::Sidebar-->
    <!--begin::App Main-->
   @yield('content')
    <!--end::App Main-->
    <!--begin::Footer-->
   @include('footer')
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->
  <!--begin::Script-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  @include('js')
  <!--end::Script-->
</body>
<!--end::Body-->

</html>