<?php

namespace App\Controllers;

use App\Models\Model_peserta;

class Home extends BaseController
{
    public function index()
    {
        //   $data_judul ['judul'] = 'Data Peserta';
        $judul = 'Dashboard';
        //   $judul_semua = $data_judul->findAll();
          $peserta_model = new Model_peserta();
          $all_data_peserta = $peserta_model->findAll();
        //   return view ('dashboard',$data_judul);
        //   return view('dashboard',['all_data_peserta'=> $all_data_peserta]);
          return view('dashboard', ['judul' => $judul, 'all_data_peserta'=> $all_data_peserta]);
        // $this->db->get('tb_peserta');
        // echo $this->db->last_query();
        // $this->load->database();
        // var_dump($this->db->conn_id);


    }
}