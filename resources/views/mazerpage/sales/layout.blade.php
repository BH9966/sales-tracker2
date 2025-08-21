<!DOCTYPE html>
<html lang="en">

<head>
    @include('mazerpage.sales.style')
</head>

<body>
    <div id="app">
   @yield('sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

           @include('mazerpage.sales.footer')
        </div>
    </div>
    @include('mazerpage.sales.js')
</body>

</html>