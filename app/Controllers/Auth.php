<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AuthModel;

class Auth extends Controller
{
    protected $model;
    public function register()
    {
        $val = $this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harap masukkan nama!'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Harap masukkan username!',
                        'is_unique' => 'Username telah tersimpan!'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[user.email]',
                    'errors' => [
                        'required' => 'Harap masukkan email!',
                        'valid_email' => 'Email harus berupa email yang valid!',
                        'is_unique' => 'Email telah tersimpan!'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[8]|max_length[20]',
                    'errors' => [
                        'required' => 'Harap masukkan password!',
                        'min_length' => 'Password minimal 8 karakter!',
                        'max_length' => 'Password maksimal 20 karakter!'
                    ]
                ]
            ]
        );
        if (!$val) {
            return redirect()->to('/register')->withInput()->with('validation', \Config\Services::validation());
        }
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $model = new UserModel();
        $model->insert($data);
        session()->setFlashdata('pesan', 'Registrasi berhasil, silahkan Login!');
        return redirect()->to('/');
    }

    public function login()
    {
        $model = new AuthModel();
        $table = 'user';

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Fetch user data by username
        $user = $model->get_data_login($username, $table);
        // var_dump($user);

        // Check if user exists
        if ($user == NULL) {
            session()->setFlashdata('error', 'Username invalid!');
            return redirect()->to('/');
        } else {
            // Verify the password
            if ($password == $user->password) {
                $data = [
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'email' => $user->email,
                    'level' => $user->level,
                    'logged_in' => TRUE
                    ];
                    session()->set($data);
                    session()->setFlashData('pesan', 'Login Berhasil!');
                    return redirect()->to('/webpage/home');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('/');
            }
        }
    }

    public function forgot_password()
    {
        $email = $this->request->getPost('email');
        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $tokenExpires = date('Y-m-d H:i:s', strtotime('+7 hour'));

            $model->update($user['id'], [
                'reset_password_token' => $token,
                'token_expires_at' => $tokenExpires
            ]);

            // Send email with the reset link
            $this->send_reset_password_email($email, $token);
            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'Email is not registered!');
            return redirect()->to('/');
        }
    }

    private function send_reset_password_email($email, $token)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('odexkhaidir@gmail.com', 'NipponBeats');
        $emailService->setSubject('Reset Password');
        $emailService->setMessage('Click this link to reset your password: <a href="' . site_url('/recover_password/' . $token) . '">Reset Password</a>');

        if ($emailService->send()) {
            // Log the success
            log_message('info', 'Reset password email sent to ' . $email);
            return true;
        } else {
            // Log the error
            $emailError = $emailService->printDebugger(['headers']);
            session()->setFlashdata('error', $emailError);
            return false;
        }
    }

    public function recover_password($token)
    {
        $model = new UserModel();
        $user = $model->where('reset_password_token', $token)
            ->where('token_expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            session()->setFlashdata('error', 'Invalid or expired token!');
            return redirect()->to('/');
        }

        // Render the password reset form with validation errors if any
        if ($this->request->getMethod() === 'post') {
            $val = $this->validate([
                'password' => [
                    'rules' => 'required|min_length[8]|max_length[20]',
                    'errors' => [
                        'required' => 'Harap masukkan password!',
                        'min_length' => 'Password minimal 8 karakter!',
                        'max_length' => 'Password maksimal 20 karakter!'
                    ]
                ]
            ]);

            if (!$val) {
                return redirect()->to('/recover_password/' . $token)->withInput()->with('validation', \Config\Services::validation());
            } else {
                if ($this->request->getVar('password') != $this->request->getVar('password_retype')) {
                    session()->setFlashdata('error', 'Pastikan kedua password sama!');
                    return redirect()->to('/auth/recover_password/' . $token);
                } else {
                    $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                    $model->update($user['id'], [
                        'password' => $password,
                        'reset_password_token' => null,
                        'token_expires_at' => null
                    ]);

                    session()->setFlashdata('pesan', 'Password updated successfully!');
                    return redirect()->to('/');
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashData('pesan', 'Logout Berhasil!');
        return redirect()->to('/');
    }
}
