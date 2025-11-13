<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table            = 'pengalaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tipe',
        'posisi',
        'nama_perusahaan',
        'lokasi',
        'tahun_mulai',
        'bulan_mulai',
        'tahun_selesai',
        'bulan_selesai',
        'status',
        'deskripsi',
        'tanggung_jawab',
        'pencapaian',
        'logo_perusahaan',
        'urutan'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules      = [
        'tipe'            => 'required|in_list[Pekerjaan,Magang,Organisasi,Proyek]',
        'posisi'          => 'required|max_length[100]',
        'nama_perusahaan' => 'required|max_length[150]',
        'lokasi'          => 'required|max_length[100]',
        'tahun_mulai'     => 'required|exact_length[4]',
        'bulan_mulai'     => 'required|integer|greater_than[0]|less_than[13]',
    ];

    public function getPengalamanByTipe($tipe = null)
    {
        if ($tipe) {
            return $this->where('tipe', $tipe)
                        ->orderBy('urutan', 'DESC')
                        ->orderBy('tahun_mulai', 'DESC')
                        ->findAll();
        }
        
        return $this->orderBy('urutan', 'DESC')
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }

    public function formatPeriode($data)
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $mulai = $bulan[$data['bulan_mulai']] . ' ' . $data['tahun_mulai'];
        
        if ($data['status'] == 'Sedang Berjalan') {
            return $mulai . ' - Sekarang';
        }
        
        $selesai = $bulan[$data['bulan_selesai']] . ' ' . $data['tahun_selesai'];
        return $mulai . ' - ' . $selesai;
    }
}