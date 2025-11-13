<?php

namespace App\Controllers;

class PendidikanController extends BaseController
{
    protected $pendidikanModel;
    protected $biodataModel;  // Tambahkan model biodata

    public function __construct()
    {
        $this->pendidikanModel = new \App\Models\PendidikanModel();
        $this->biodataModel = new \App\Models\BiodataModel();  // Inisialisasi model biodata
    }

    public function index()
    {
        // Ambil data pendidikan
        $pendidikan = $this->pendidikanModel->getPendidikanByUrutan();

        // Ambil data biodata
        $biodata = $this->biodataModel->find(1);  // Misal ID biodata yang ingin diambil adalah 1

        $data = [
            'title' => 'Riwayat Pendidikan',
            'pendidikan' => $pendidikan,
            'biodata' => $biodata  // Sertakan biodata
        ];

        return view('pendidikan', $data);
    }
}