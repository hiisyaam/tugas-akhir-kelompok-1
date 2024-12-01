<?php

namespace App\Controllers;
use App\Models\ModelRuangan;
use App\Models\ModelFaq;
use App\Models\Pemesanan;
class Home extends BaseController
{
    public function index(): string{
        $ruanganModel = new ModelRuangan();

        $ruangan = $ruanganModel->getRuangan();

        foreach ($ruangan as &$item) {
            $item['foto'] = $ruanganModel->getFotoByIdRuangan($item['id_ruangan']);
        }

        $data = [
            'judulHalaman' => 'Selamat Datang - TemuRuang',
            'ruangan' => $ruangan,
        ];

        return view('index', $data);
    }


    public function artikel(){
        $data = [
            'judulHalaman' => 'Artikel - TemuRuang',
        ];
        return view('artikel',$data);
    }

    public function faq(){
        $faq = new ModelFaq();
        $data = [
            'judulHalaman' => 'FAQ - TemuRuang',
            'faq' => $faq->getFaq()
        ];
        return view('faq',$data);
    }

    public function profile($identitas = NULL){
        $history = new Pemesanan();
        $history = $history->getHistoryPemesanan($identitas);
        $data = [
            'judulHalaman' => 'Profile - TemuRuang',
        ];
        return view('profile',$data);
    }

    public function cari(){
        
    }


    
}
