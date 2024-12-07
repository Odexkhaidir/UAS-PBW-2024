<?php

namespace App\Controllers;

use App\Models\UserModel;
use DateTime;

class CtrlrUser extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->userModel->search($keyword);
            session()->setFlashdata('search', 'Hasil pencarian : ' . $keyword);
        } else {
            $user = $this->userModel;
            if ($keyword != '') {
                session()->setFlashdata('search', 'Hasil pencarian tidak ditemukan!');
            } else {
                session()->setFlashdata('search', 'Silahkan masukkan keyword pencarian!');
            }
        }
        // Mengambil seluruh data dari table user
        $user = $this->userModel->getDetailUser();
        $data = [
            'title' => 'Daftar Anggota',
            'user' => $user
        ];

        return view('user/index', $data);
    }
}
