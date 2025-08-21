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
    @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
                {{ session('error') }}
            </div>

            <script>
                setTimeout(() => {
                    let alert = document.getElementById('errorAlert');
                    if (alert) {
                      
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                        
                        setTimeout(() => {
                            alert.remove();
                        }, 500);
                    }
                }, 1000); // 1 second
            </script>
            
        @endif
    <form wire:submit.prevent="submit">
    <div class="form-login">
    <label>Email</label>
    <div class="form-addons">
    <input type="text" placeholder="Enter your email address" wire:model.lazy="email">
    <img src="{{asset('login/img/icons/mail.svg')}}" alt="img">
    </div>
    </div>
    <div class="form-login">
    <label>Password</label>
    <div class="pass-group">
    <input type="password" class="pass-input" placeholder="Enter your password" wire:model.lazy="password">
    <span class="fas toggle-password fa-eye-slash"></span>
    </div>
    </div>
    <div class="form-login">
    <button type="submit" class="btn btn-login" >Sign In</button>
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
</div>