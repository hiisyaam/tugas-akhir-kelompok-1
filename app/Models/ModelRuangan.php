<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRuangan extends Model
{

    protected $table            = 'ruangan';
    protected $primaryKey       = 'id_ruangan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_ruangan', 'lokasi', 'kapasitas', 'harga', 'deskripsi', 'tipe_ruangan', 'fasilitas'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    public function getRuanganWithFoto($namaruangan)
    {
        return $this->select('ruangan.*, foto_ruangan.foto')
                    ->join('foto_ruangan', 'foto_ruangan.id_ruangan = ruangan.id_ruangan', 'left')
                    ->where('ruangan.nama_ruangan', $namaruangan)
                    ->first();
    }
    
    public function getRuangan(){
        return $this->findAll();
    }


    public function getFotoByIdRuangan($idRuangan){
        $db = \Config\Database::connect();
        $builder = $db->table('foto_ruangan');
        $builder->select('foto');
        $builder->where('id_ruangan', $idRuangan);
        $builder->limit(1); 
        $query = $builder->get();
        return $query->getRowArray();
    }
    public function getReview($id) {
        $builder = $this->db->table('ulasan_ruangan');
        $builder->select('users.username, ulasan_ruangan.tanggal_dibuat, ulasan_ruangan.ulasan');
        $builder->join('users', 'users.id = ulasan_ruangan.id_pengguna');
        $builder->where('ulasan_ruangan.id_ruangan', $id);  // Tambahkan kondisi ini jika ingin spesifik ke ruangan tertentu
        $query = $builder->get();
        return $query->getResult();
    }

    public function getPemesanan($id) {
        $builder = $this->db->table('pemesanan');
        $builder->select('users.username, pemesanan.durasi_jam, pemesanan.durasi_hari, pemesanan.tanggal_pemesanan, pemesanan.status_pembayaran');
        $builder->join('users', 'users.id = pemesanan.id_pengguna');
        $builder->where('pemesanan.id_ruangan', $id);  // Tambahkan kondisi ini jika ingin spesifik ke ruangan tertentu
        $query = $builder->get();
        return $query->getResult();
    }

    public function filterRuangan($filters)
    {
        $builder = $this->db->table($this->table);

        // Tambahkan filter sesuai input
        if (!empty($filters['location'])) {
            $builder->where('location', $filters['location']);
        }

        if (!empty($filters['capacity'])) {
            $builder->where('capacity >=', $filters['capacity']);
        }

        if (!empty($filters['price'])) {
            if ($filters['price'] == 'Harga Terendah') {
                $builder->orderBy('price', 'ASC');
            } elseif ($filters['price'] == 'Harga Tertinggi') {
                $builder->orderBy('price', 'DESC');
            }
        }

        if (!empty($filters['room_type'])) {
            $builder->where('room_type', $filters['room_type']);
        }

        return $builder->get()->getResultArray();
    }
    
}
