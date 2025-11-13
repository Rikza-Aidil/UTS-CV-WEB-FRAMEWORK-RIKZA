<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jenjang',
        'nama_institusi',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'status',
        'ipk',
        'prestasi',
        'deskripsi',
        'logo_institusi',
        'urutan'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules      = [
        'jenjang'        => 'required|max_length[50]',
        'nama_institusi' => 'required|max_length[150]',
        'tahun_mulai'    => 'required|exact_length[4]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    public function getPendidikanByUrutan()
    {
        return $this->orderBy('urutan', 'DESC')
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }
}