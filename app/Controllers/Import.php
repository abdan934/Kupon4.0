<?php

namespace App\Controllers;


//  require 'vendor/autoload.php';
// require dirname(__DIR__) . '/Kupon4.0/vendor/autoload.php';
require dirname(__DIR__, 2) . '/vendor/autoload.php';




use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;



class Import extends BaseController
{
    
    public function index()
    {
        $judul = 'Import Peserta';
        // $judul = ['judul' => $judul];
        // $data ['judul'] = 'Import Peserta';
         return view('import_peserta',['judul' => $judul]);
    }

    
    public function import()
    {
        $judul = 'Data Peserta';


        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        function generate_string($input, $strength = 16) {
            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            return $random_string;
        }
        
        //echo generate_string($permitted_chars, 5);


            $validation = \Config\Services::validation();
            $valid = $this->validate(
                            [
                            'file' =>[
                            'label' => 'Inputan file',
                            'rules' => 'uploaded[file]|ext_in[file,xls,xlsx]',
                            'errors' => [
                            'uploaded' => 'Masukkan file terlebih dahulu',
                            'ext_in' => 'File harus dengan format xls&xlsx'
                                        ]
                                    ]
                            ]
                            );

                            // if (!$valid) {
                            //     $this->session->setFlashdata('pesan', $validation->getError('file'));
                            //     return redirect()->to('public/import-peserta-home');
                            // } else {
                            //     $file_excel = $this->request->getFile('file');
                            //     $ext = $file_excel->getClientExtension();
                            //     if($ext == 'xls'){
                            //         $render = new Xls();
                            //     }else{
                            //         $render = new Xlsx();
                            //     }
                            //     $spreadsheet = $render->load($file_excel);
                            //     $data = $spreadsheet->getActiveSheet()->toArray();
                            //     foreach($data as $x => $row) {
                            //         if($x == 0){
                            //             continue;
                            //         }
                            //         $no_hp = $row[0];
                            //         $nama = $row[1];
                            //         $email = $row[2];
                            //         $alamat = $row[3];
                            //         $undian = generate_string($permitted_chars, 5);
                            //         $db = \Config\Database::connect();
                            //         $data_simpan = [
                            //             'no_hp' => $no_hp,
                            //             'nama_peserta' => $nama,
                            //             'email' => $email,
                            //             'alamat' => $alamat,
                            //             'undian' => $undian
                            //         ];
                            //         $db->table('tb_peserta')->insert($data_simpan);
                            //         $jumlah_baris_diimport = $db->affectedRows();
                            //         if ($jumlah_baris_diimport > 0) {
                            //             $this->session->setFlashdata('pesan', 'Import data berhasil');
                            //             return redirect()->to('public/import-peserta-home');
                            //         }
                            //     }
                            // }
                            

                    //     if (!$valid){

                    //         $this->session->setFlashdata('pesan',$validation->getError('file'));
                    //         return redirect()->to('public/import-peserta-home');
                            
                    //         }else{
                    //         $file_excel = $this->request->getFile('file');
                    //         $ext = $file_excel->getClientExtension();

                    //         if($ext == 'xls'){
                    //         $render = new Xls();
                    //         }else{
                    //         $render = new Xlsx();
                    //             }

                    //         $spreadsheet = $render->load($file_excel);
                    //         $data =$spreadsheet->getActiveSheet()->toArray();

                    //         foreach($data as $x => $row){
                    //         if($x==0){
                    //         continue;
                    //             }
                    //         $no_hp = $row[0];
                    //         $nama = $row[1];
                    //         $email = $row[2];
                    //         $alamat = $row[3];
                    //         $undian = generate_string($permitted_chars, 5);

                    //         $db = \Config\Database::connect();

                    //         $data_simpan= [
                    //             'no_hp' => $no_hp,
                    //             'nama_peserta'=>$nama,
                    //             'email'=>$email,
                    //             'alamat'=>$alamat,
                    //             'undian'=>$undian
                    //         ];
                    //         $db->table('tb_peserta')->insert($data_simpan);
                    //         $this->session->setFlashdata('pesan', 'Import data berhasil');
                    //         return redirect()->to('public/import-peserta-home');
                    //     }
                    // }
                        
                    if (!$valid){
                        
                        $this->session->setFlashdata('pesan',$validation->getError('file'));
                        // return redirect()->to('public/import-peserta-home',['judul' => $judul]);
                        return view('import_peserta',['judul' => $judul]);
                    }else{
                                    try {
                                $file_excel = $this->request->getFile('file');
                                $ext = $file_excel->getClientExtension();
    
                                if($ext == 'xls'){
                                $render = new Xls();
                                }else{
                                $render = new Xlsx();
                                    }
    
                                $spreadsheet = $render->load($file_excel);
                                $data =$spreadsheet->getActiveSheet()->toArray();
    
                                foreach($data as $x => $row){
                                if($x==0){
                                continue;
                                    }
                                $no_hp = $row[0];
                                $nama = $row[1];
                                $email = $row[2];
                                $alamat = $row[3];
                                $undian = generate_string($permitted_chars, 5);
    
                                $db = \Config\Database::connect();
    
                                $data_simpan= [
                                    'no_hp' => $no_hp,
                                    'nama_peserta'=>$nama,
                                    'email'=>$email,
                                    'alamat'=>$alamat,
                                    'undian'=>$undian
                                ];
                                $db->table('tb_peserta')->insert($data_simpan);
                                    // $query->execute();
                                    $jumlah_baris_diimport = $db->affectedRows();;
                                    if ($jumlah_baris_diimport > 0) {
                                       
                                        $this->session->setFlashdata('pesan', 'Import data berhasil');
                                        // return redirect()->to('public/import-peserta-home',['judul' => $judul]);
                                        return view('import_peserta',['judul' => $judul]);
                                    }
                                 }
                            } catch (Exception $e) {
                                // kode untuk menangani kesalahan
                                $this->session->setFlashdata('pesan', 'Error: ' . $e->getMessage());
                                // return redirect()->to('public/import-peserta-home',['judul' => $judul]);
                                return view('import_peserta',['judul' => $judul]);
                            }
                        }
                        // return redirect()->to('public/import-peserta-home');
                    }
    }
// }