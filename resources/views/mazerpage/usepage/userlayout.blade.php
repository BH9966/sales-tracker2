<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
   
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('success_user'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success_user') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if(session('error'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('email_error'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('email_error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('passworderror'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('passworderror') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('passerror'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session(key: 'passerror') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if(session('errors'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('errors') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-users-' + id).submit();
            }
        });
    }
    </script>
</body>

</html>