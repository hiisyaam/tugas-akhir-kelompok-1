<?php

namespace App\Controllers;
use App\Models\ModelUser;
use App\Controllers\BaseController;
use App\Models\Pemesanan;
use App\Models\UlasanRuangan;
use Myth\Auth\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{

    public function profile()
    {
        $history = new Pemesanan();
        if (!logged_in()) {
            return redirect()->to('/')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        $data = ['judulHalaman'=>'Profile',
                'data' => user(),
                'riwayat' => $history->getHistoryPemesanan(user()->id)
                ];
        return view('profile',$data);
    }

    public function detail()
    {
        if (!logged_in()) {
            return redirect()->to('/')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        $data = ['judulHalaman'=>'Detail Profile','data' => user()];
        return view('profileDetail',$data);
    }

    public function admin() {
        $user = new ModelUser();
        $pemesanan = new Pemesanan();
        $data = [
            'judulHalaman' => 'Dashboard Admin',
            'data' => $user->getSemuaUser(),
            'pemesanan' => $pemesanan->getPemesanan(),
        ];
        return view('admin/index', $data);
    }

    public function acceptPemesanan($id_pesanan) { 
        $pemesananModel = new Pemesanan();
        $cek = $pemesananModel->find($id_pesanan);
        if(!$cek){
            return redirect()->to('/admin')->with('error', 'Pesanan tidak ditemukan.');
        }
        $pemesananModel->update($id_pesanan, ['status_pembayaran' => 'dibayar']);
        return redirect()->to('/admin')->with('success', 'Status pesanan berhasil diubah menjadi "dibayar".');
    }

    public function rejectPemesanan($id_pesanan){
        $pemesananModel = new Pemesanan();
        $cek = $pemesananModel->find($id_pesanan);
        if(!$cek){
            return redirect()->to('/admin')->with('error', 'Pesanan tidak ditemukan.');
        }
        $pemesananModel->update($id_pesanan, ['status_pembayaran' => 'dibatalkan']);
        return redirect()->to('/admin')->with('success', 'Status pesanan berhasil diubah menjadi "dibatalkan".');
    }

    
    public function saveKomentar()
    {
        $komentarModel = new UlasanRuangan();
        
        $id_pengguna = user_id();
        if (!$id_pengguna) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu');
        }

        error_log('id_pengguna: ' . $id_pengguna);

        $data = [
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'id_pengguna' => $id_pengguna,
            'ulasan' => $this->request->getPost('reviewText'),
            'rating' => $this->request->getPost('rating'),
            'tanggal_dibuat' => date('Y-m-d H:i:s')
        ];

        if ($komentarModel->saveKomentar($data)) {
            return redirect()->to('/')->with('success', 'Komentar berhasil disimpan');
        } else {
            return redirect()->to('/')->with('error', 'Gagal menyimpan komentar');
        }
    }
    
    
    public function adminAdd(){
        $data = ['judulHalaman'=>'Dashboard Admin'];
        return view('admin/tambahUser',$data);
    }

    public function update()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
            'password' => 'permit_empty|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $userId = user()->id;

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = $this->request->getPost('password');
        }

        if ($userModel->update($userId, $data)) {
            return redirect()->to('/profile')->with('message', 'Profil berhasil diperbarui.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil.');
    }

    public function hapus($id){
        $hapus = new ModelUser();

        if($hapus->hapus($id)){
            return redirect()->to('/admin')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->to('/admin')->with('error', 'Data gagal dihapus');
        }
    }
}
