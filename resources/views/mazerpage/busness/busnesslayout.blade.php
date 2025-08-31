<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
        </script>
        @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
        </script>
        @endif
        
        @if(session('error'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            timer: 2000,
            showConfirmButton: false
        });
        </script>
        @endif
    
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
    
            @if(session('error'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
            
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          document.querySelectorAll(".editBtn").forEach(btn => {
              btn.addEventListener("click", function() {
                const id = this.dataset.id;
                  const name = this.dataset.name;
                  const descr = this.dataset.description;
                 

                  document.getElementById("editBusnessId").value = id;
                  document.getElementById("editname").value = name;
                  document.getElementById("editdesc").value = descr;
                  
      
                  document.getElementById("editForm").action = "busness/" + id;
              });
          });
      });
      </script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".editBtn").forEach(btn => {
          btn.addEventListener("click", function() {
            const id = this.dataset.id;
              const name = this.dataset.name;
              const user = this.dataset.user;
              const register = this.dataset.register;

              document.getElementById("editBusnessId").value = id;
              document.getElementById("edituser").value = user;
              document.getElementById("editbusness").value = name;
              
  
              document.getElementById("editForm").action = "edit/user/busness/" + id;
          });
      });
  });
  </script>
</body>

</html>