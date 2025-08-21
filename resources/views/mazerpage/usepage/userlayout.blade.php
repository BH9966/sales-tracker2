<!DOCTYPE html>
<html lang="en">

<head>
   @include('mazerpage.style')
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

            @include('mazerpage.footer')
        </div>
    </div>
   @yield('javascript')
</body>

</html>