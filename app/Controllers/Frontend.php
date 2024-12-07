<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Frontend extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
            'error' => \Config\Services::validation()->listErrors(),
        ];
        return view('frontend/login', $data);
    }
    public function register()
    {
        session();
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];
        return view('frontend/register', $data);
    }

    public function forgot_password()
    {
        $data = [
            'title' => 'Forgot Password'
        ];
        return view('frontend/forgot_password', $data);
    }

    public function recover_password($token)
    {
        $model = new UserModel();
        $user = $model->where('reset_password_token', $token)
            ->where('token_expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            session()->setFlashdata('pesan', 'Invalid or expired token!');
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Recover Password',
            'token' => $token,
            'validation' => \Config\Services::validation(),
        ];
        return view('frontend/recover_password', $data);
    }
}
