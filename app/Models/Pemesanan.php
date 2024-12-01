<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemesanan extends Model
{
    protected $table            = 'pemesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pesanan', 'id_ruangan', 'id_pengguna', 'tanggal_pemesanan', 'durasi_jam', 'durasi_hari', 'total_harga', 'status_pembayaran', 'tanggal_dibuat'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_dibuat';
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

    public function PesananRuangan($data) 
    { return $this->insert($data); }


    public function getPemesanan() {
        $builder = $this->db->table('pemesanan')
                            ->select('pemesanan.*, users.username')
                            ->join('users', 'pemesanan.id_pengguna = users.id');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getHistoryPemesanan($userId)
    {
        $builder = $this->db->table('pemesanan')
                            ->select('pemesanan.*, users.username, ruangan.nama_ruangan')
                            ->join('users', 'pemesanan.id_pengguna = users.id')
                            ->join('ruangan', 'pemesanan.id_ruangan = ruangan.id_ruangan')
                            ->where('pemesanan.id_pengguna', $userId)
                            ->where('pemesanan.status_pembayaran', 'dibayar')
                            ->orderBy('pemesanan.tanggal_pemesanan', 'DESC');
        return $builder->get()->getResult();
    }
}
