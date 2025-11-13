<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillsModel extends Model
{
    protected $table            = 'skills';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_skill',
        'level',
        'icon',
        'deskripsi',
        'urutan'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules      = [
        'nama_skill' => 'required|max_length[100]',
        'level'      => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
    ];

    // Mengambil semua data skill tanpa kategori
    public function getSkills()
    {
        return $this->orderBy('urutan', 'ASC')->findAll(); // Mengambil semua skill
    }
}
