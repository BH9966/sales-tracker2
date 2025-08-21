<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use livewire\Attributes\Layout;
class UserLogin extends Component
{
   
    #[Layout('login.login2.loginlayout')]
    public $email, $password;

    public function submit()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::guard('users')->attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        } else   {
            $this->dispatch('login-error', message: 'Invalid email or password');
        }
    }

    public function render()
    {
        
        return view('livewire.user-login');
           
    }
}
