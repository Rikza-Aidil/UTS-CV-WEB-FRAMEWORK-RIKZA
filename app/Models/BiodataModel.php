<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 'biodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'tanggal_lahir',
        'tempat_lahir',
        'email',
        'telepon',
        'alamat',
        'website',
        'status',
        'foto',
        'profil_singkat',
        'deskripsi_lengkap'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'nama_lengkap'  => 'required|min_length[3]|max_length[100]',
        'email'         => 'required|valid_email|is_unique[biodata.email,id,{id}]',
        'telepon'       => 'required|min_length[10]|max_length[20]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getBiodata()
    {
        return $this->first();
    }

    public function getProfile($id = null)
    {
        if ($id) return $this->find($id);
        return $this->first();
    }
}