<?php

namespace App\Controllers;

use App\Models\LaguModel;
use DateTime;

class CtrlrLagu extends BaseController
{
    protected $laguModel;
    protected $load;
    public function __construct()
    {
        $this->laguModel = new \App\Models\LaguModel();
        $this->load = \Config\Services::load();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $lagu = $this->laguModel->search($keyword);
            session()->setFlashdata('search', 'Hasil pencarian : ' . $keyword);
        } else {
            $lagu = $this->laguModel;
            session()->setFlashdata('search', 'Hasil pencarian tidak ditemukan!');
        }
        // Mengambil seluruh data dari table lagu
        $lagu = $this->laguModel->getDetailLagu();
        $data = [
            'title' => 'Daftar Lagu',
            'lagu' => $lagu
        ];

        return view('lagu/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Lagu',
            'lagu' => $this->laguModel->getDetailLagu($slug)
        ];

        if (empty($data['lagu'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Lagu ' . $slug . ' tidak ditemukan.');
        }

        return view('lagu/detail', $data);
    }
    public function create()
    {
        if (allow('admin') == false) {
            session()->setFlashdata('error', 'Maaf Anda bukan admin!');
            return redirect()->to('/lagu');
        } else {
            $data = [
                'title' => 'Form Tambah Data Lagu',
                'validation' => \Config\Services::validation()
            ];
            return view('lagu/create', $data);
        }
    }
    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[lagu.judul]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong',
                    'is_unique' => 'Judul telah tersimpan'
                ]
            ],
            'penyanyi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap masukkan nama penyanyi'
                ]
            ],
            'link' => [
                'rules' => 'permit_empty|valid_url|is_unique[lagu.link]',
                'errors' => [
                    'valid_url' => 'Link harus berupa URL yang valid',
                    'is_unique' => 'Link telah tersimpan'
                ]
            ],
        ])) {
            return redirect()->to('/lagu/create')->withInput()->with('validation', \Config\Services::validation());
        }

        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // Apakah tidak ada gambar yang diupload?
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->laguModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penyanyi' => $this->request->getVar('penyanyi'),
            'link' => $this->request->getVar('link'),
            'sampul' => $namaSampul,
            'created_at' => date('Y-m-d H:i:s', time() + 60 * 60 * 7),
            'updated_at' => date('Y-m-d H:i:s', time() + 60 * 60 * 7)
        ]);

        session()->setFlashData('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to('/lagu');
    }
    public function delete($id)
    {
        if (allow('admin') == false) {
            session()->setFlashdata('pesan', 'Maaf Anda bukan admin!');
        } else {
            $lagu = $this->laguModel->find($id);
            if (is_null($lagu)) {
                session()->setFlashdata('error', 'Data tidak ditemukan!');
                return redirect()->to('/lagu');
            }
            if (!empty($lagu['sampul']) && $lagu['sampul'] != 'default.png') {
                $filePath = 'img/' . $lagu['sampul'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            if ($this->laguModel->delete($id)) {
                session()->setFlashdata('pesan', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            return redirect()->to('/lagu');
        }
    }
    public function edit($slug)
    {
        if (allow('admin') == false) {
            session()->setFlashdata('pesan', 'Maaf Anda bukan admin!');
            return redirect()->to('/lagu' . $slug);
        } else {

            $data = [
                'title' => 'Form Edit Data Lagu',
                'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
                'lagu' => $this->laguModel->getDetailLagu($slug)
            ];

            // session()->setFlasData('pesan', 'Data berhasil diedit!'); 
            return view('lagu/edit', $data);
        }
    }
    public function update($id)
    {
        // Cek judul
        $laguLama = $this->laguModel->getDetailLagu($this->request->getVar('slug'));
        // Cek judul
        if ($laguLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[lagu.judul]';
        }
        // Cek link
        if ($laguLama['link'] == $this->request->getVar('link')) {
            $rule_link = 'permit_empty';
        } else {
            $rule_link = 'permit_empty|valid_url|is_unique[lagu.link]';
        }
        // Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'is_unique' => 'Judul telah tersimpan! Silahkan pilih judul lainnya.'
                ]
            ],
            'penyanyi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap masukkan nama penyanyi!'
                ]
            ],
            'link' => [
                'rules' => $rule_link,
                'errors' => [
                    'valid_url' => 'Link harus berupa URL yang valid!',
                    'is_unique' => 'Link telah tersimpan!'
                ]
            ],
            'sampul' => [
                'rules' => 'permit_empty',
                'errors' => [
                    // 'mime_in' => 'Sampul harus berformat jpg, jpeg, atau png'
                ]
            ]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/lagu/edit/' . $this->request->getVar('slug') . '')->withInput()->with('validation', \Config\Services::validation());
        }

        $fileSampul = $this->request->getFile('sampul');
        // cek gambar
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama sampul
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // hapus file yang lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->laguModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penyanyi' => $this->request->getVar('penyanyi'),
            'link' => $this->request->getVar('link'),
            'sampul' => $namaSampul,
            'updated_at' => date('Y-m-d H:i:s', time() + 7 * 60 * 60)
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/lagu/' . $slug);
    }
}
