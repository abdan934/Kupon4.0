<?php

namespace App\Controllers;

use App\Models\Model_peserta;

class Peserta extends BaseController
{
    
    public function index()
    {
        $judul = 'Data Peserta';
        $peserta_model = new Model_peserta();
        $all_data_peserta = $peserta_model->findAll();
        return view('peserta',['all_data_peserta'=> $all_data_peserta,'judul' => $judul]);
        // return view('peserta');
    }

}