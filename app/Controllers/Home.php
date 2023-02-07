<?php

namespace App\Controllers;

use App\Models\Model_peserta;
// use CodeIgniter\Database\ConnectionInterface;


// require dirname(__DIR__, 2) . '/vendor/autoload.php';

class Home extends BaseController
{
  // protected $db;
  // public function __construct(ConnectionInterface $db)
  // {
  //     $this->db = $db;
  // }

    public function index()
    {
       // title head
        $judul = 'Dashboard';
          $peserta_model = new Model_peserta();
          $all_data_peserta = $peserta_model->findAll();

          $total_data_peserta = $peserta_model->countAllResults();

          return view('dashboard', ['judul' => $judul, 'all_data_peserta'=> $all_data_peserta,'total_data_peserta'=>$total_data_peserta]);


    }
}