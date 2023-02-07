<?php
namespace App\Models;
use CodeIgniter\Model;

class Model_peserta extends Model
{
    protected $table = 'tb_peserta';
    protected $primarykey = 'no_hp';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_peserta','email','alamat','undian'];

//     public function countByNoHP($no_hp)
//     {
//         return $this->where(['no_hp' => $no_hp])->countAllResults();
//     }
}