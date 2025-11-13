<?php

namespace App\Controllers;

class SkillsController extends BaseController
{
    protected $skillsModel;
    protected $biodataModel;  // Menambahkan model biodata

    public function __construct()
    {
        $this->skillsModel = new \App\Models\SkillsModel();
        $this->biodataModel = new \App\Models\BiodataModel();  // Inisialisasi model biodata
    }

    public function index()
    {
        // Ambil data skills
        $skills = $this->skillsModel->findAll(); // Ambil semua data skill tanpa kategori

        // Ambil data biodata
        $biodata = $this->biodataModel->find(1);  // Ambil data dengan id 1 (sesuaikan dengan id biodata Anda)

        $data = [
            'title' => 'Keahlian (Skills)',
            'biodata' => $biodata,  // Sertakan biodata
            'skills' => $skills, // Mengirimkan data skills saja tanpa kategori
        ];

        return view('skills', $data);
    }
}