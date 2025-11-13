<?php

namespace App\Controllers;

class home extends BaseController
{
    protected $biodataModel;

    public function __construct()
    {
        $this->biodataModel = new \App\Models\BiodataModel();
    }

    public function index()
    {
        $data = [
            'title' => 'CV - Portfolio Pribadi',
            'biodata' => $this->biodataModel->getBiodata(),
            'profile' => $this->biodataModel->getProfile(1) // Ambil profile dengan ID 1
        ];

        return view('home', $data);
    }
}