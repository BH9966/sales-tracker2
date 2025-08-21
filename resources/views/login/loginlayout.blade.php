<!DOCTYPE html>
<html lang="en">
@include('login.style')
@livewireStyles
</head>
<body class="account-page">

{{$slot}}

@include('login.js')
@livewireScripts
</body>
</html>