<?php

namespace App\Livewire\Login;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class LoginPage extends Component
{
    public $username;
    public $password;
    public $showError = false;
    public $messageError;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function doLogin()
    {
        $this->validate();

        $user = User::where('username', $this->username)->first();

        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                session()->put('user', $user);
                return redirect()->route('agency.index');
            } else {
                $this->showError = true;
                $this->messageError = 'Password salah';
            }
        } else {
            $this->showError = true;
            $this->messageError = 'Username tidak ditemukan';
        }
    }

    public function render()
    {
        return view('livewire.login.login-page')
            ->extends('layouts.master')
            ->section('content');
    }
}
