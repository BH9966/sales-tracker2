<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\User;
use Livewire\Component;
use livewire\Attributes\Layout;
class AddUser extends Component
{
    #[Layout('components.userlayout')]
    public $name, $email, $password;
    public $successMessage;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $exists = User::where('name', $this->name)->orWhere('email', $this->email)->first();

        if ($exists) {
            $this->addError('name', 'User already exists!');
            return;
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            
        ]);

        $this->reset(['name', 'email', 'password']);
        $this->successMessage = 'User added successfully!';
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}
