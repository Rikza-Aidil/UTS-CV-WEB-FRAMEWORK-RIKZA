<?php

namespace App\Controllers;

class PengalamanController extends BaseController
{
    protected $pengalamanModel;
    protected $biodataModel;  // Menambahkan model biodata

    public function __construct()
    {
        $this->pengalamanModel = new \App\Models\PengalamanModel();
        $this->biodataModel = new \App\Models\BiodataModel();  // Inisialisasi model biodata
    }

    public function index()
    {
        // Ambil data pengalaman
        $pengalaman = $this->pengalamanModel->getPengalamanByTipe();

        // Ambil data biodata
        $biodata = $this->biodataModel->find(1);  // Ambil data dengan id 1 (sesuaikan dengan id biodata Anda)

        $data = [
            'title' => 'Riwayat Pengalaman',
            'pengalaman' => $pengalaman,
            'biodata' => $biodata,  // Sertakan biodata
            'model' => $this->pengalamanModel
        ];

        return view('pengalaman', $data);
    }
}