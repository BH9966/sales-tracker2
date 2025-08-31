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
       document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll(".editBtn").forEach(btn => {
    btn.addEventListener("click", function() {
      const id       = this.dataset.id;
      const name     = this.dataset.name;    
      const busness  = this.dataset.busness;  
      const date     = this.dataset.date;
      const sale     = this.dataset.sale;
      const cost     = this.dataset.cost;
      const descript = this.dataset.descript;
      const cash     = this.dataset.cash;

      document.getElementById("editsalesID").value = id;
      document.getElementById("editmuuzaji").value = name;
      document.getElementById("editbiashara").value = busness;
      document.getElementById("editdate").value = date;
      document.getElementById("editmauzo").value = sale;
      document.getElementById("editgarama").value = cost;
      document.getElementById("editmaelezo").value = descript;
      document.getElementById("editcash").value = cash;

      document.getElementById("editForm").action = "sales/" + id;
    });
  });
});

      </script>
</body>

</html>