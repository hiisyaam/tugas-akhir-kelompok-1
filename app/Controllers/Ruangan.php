<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRuangan;
use App\Models\Pemesanan;
use CodeIgniter\HTTP\ResponseInterface;

class Ruangan extends BaseController
{
    public function index($namaruang) {
        $ruanganModel = new ModelRuangan();
    
        $name = str_replace('-', ' ', $namaruang);
        $name = ucwords($name);
    
        $ruangan = $ruanganModel->getRuanganWithFoto($name);
    
        if (!$ruangan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ruangan tidak ditemukan.');
        }
    
        $review = $ruanganModel->getReview($ruangan['id_ruangan']);
        $pemesanan = $ruanganModel->getPemesanan($ruangan['id_ruangan']);
    
        $data = [
            'judulHalaman' => 'Selamat Datang - TemuRuang',
            'ruangan' => $ruangan,
            'review' => $review,
            'pemesanan' => $pemesanan
        ];
        return view('ruang', $data);
    }
    
    public function tambahPesanan() {
        $pesananModel = new Pemesanan();
        $data = [ 
            'id_pesanan' => $this->request->getPost('id_pesanan'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'id_pengguna' => $this->request->getPost('id_pengguna'),
            'tanggal_pemesanan' => $this->request->getPost('tanggal_pemesanan'),
            'durasi_jam' => $this->request->getPost('durasi_jam'),
            'durasi_hari' => $this->request->getPost('durasi_hari'),
            'total_harga' => $this->request->getPost('total_harga'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),
            'tanggal_dibuat' => date('Y-m-d H:i:s') ];
            $pesananModel->PesananRuangan($data);
            return redirect()->to('/'); 
    }
    
}
