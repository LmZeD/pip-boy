<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;

    public function render()
    {
        return view('livewire.login');
    }

    public function registerOrLogin()
    {
        $user = User::where('name', $this->username)->first();

        if (!$user) {
            $user = User::create([
                'name' => $this->username,
                'email' => sprintf('%s@%s.com', $this->username,$this->username),
                'password' => bcrypt(random_bytes(10000)),
            ]);
        }

        Auth::login($user, true);

        return redirect(route('pip-boy'));
    }
}
