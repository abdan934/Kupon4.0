<?php

namespace App\Controllers;

use App\Models\Model_peserta;
require dirname(__DIR__, 2) . '/vendor/autoload.php';

class Landing_Page extends BaseController
{

    public function index()
    {
       // title head
        $judul = 'Home page';

          return view('landing_page', ['judul' => $judul]);
    }

    public function check()
    {
        $judul = 'Home page';
        $input = $this->request->getPost('undian');

        if (!empty($input))
        {
            $db = \Config\Database::connect();

            $data = $db->table('tb_peserta')->where('no_hp', $input)->get()->getRow();
            if (!empty($data))
            {
                $undian = $data->undian;
                return view('landing_page', ['pesan'=>'data ada','undian' => $undian, 'judul' => $judul]);
                // return view('input_result', ['input' => $input,'judul' => $judul]);
            }
            else
            {
                return view('landing_page', ['pesan' => 'Nomor Handphone belum terdaftar!!','judul' => $judul]);
            }
           
        }
        else
        {
            return view('landing_page', ['pesan' => 'Silahkan inputkan dengan benar!!','judul' => $judul]);
        }
    }
}