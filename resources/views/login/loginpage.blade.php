<!DOCTYPE html>
<html lang="en">
@include('login.style')
</head>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">
<div class="login-logo">
<img src="{{asset('login/img/logo.png')}}" alt="img">
</div>
<div class="login-userheading">
<strong><h1>Sales Report..</h1></strong>
</div>
{{-- @if (Session::has('error_message'))

<div class="btn-primary"></div>

@endif --}}
<form action="{{route('loginsubmit')}}" method="post">
<div class="form-login">
<label>Email</label>
<div class="form-addons">
<input type="text" placeholder="Enter your email address" name="email">
<img src="{{asset('login/img/icons/mail.svg')}}" alt="img">
</div>
</div>
<div class="form-login">
<label>Password</label>
<div class="pass-group">
<input type="password" class="pass-input" placeholder="Enter your password" name="password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
<div class="form-login">
<a class="btn btn-login" href="index.html">Sign In</a>
</div>
</form>
<div class="form-sociallink">
<ul>
</ul>
</div>
</div>
</div>
<div class="login-img">
<img src="{{asset('login/img/login.jpg')}}" alt="img">
</div>
</div>
</div>
</div>


@include('login.js')
</body>
</html>