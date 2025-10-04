<!DOCTYPE html>
<html lang="en">
  <head>
   @include('login.login2.style')
  </head>
  <body>
        
    {{$slot}}
    <!-- container-scroller -->
    
   @include('login.login2.js')
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <script>
    window.addEventListener('login-error', event => {
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: event.detail.message,
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
  </body>
</html>