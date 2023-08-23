<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table            = 'krs';
    protected $primaryKey       = 'id_krs';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_krs','id_mahasiswa','id_matakuliah'];
 protected $useTimestamps = true;   
    protected $useSoftDeletes = false;

    // protected $validationRules = [
    //     'is_matakuliah'     => 'required|min_length[6]|max_length[10]|alpha_numeric',
    //     'nama_matakuliah'        => 'required|alpha_numeric_space',
    //     'sks'        => 'required|integer|less_than_equal_to[4]',
    // ];
    // protected $validationMessages = [
    //     'kode_matakuliah' => [
    //         'required' => 'Kode Matakuliah tidak boleh kosong',
    //         'integer' => 'Masukkan Kode Matakuliah dengan benar!',
    //         'min_length' => 'Kode Matakuliah minimal 6 karakter!',
    //         'max_length' => 'Kode Matakuliah maksimal 10 karakter!',
    //         'alpha_numeric' => 'Kode hanya boleh menggunakan angka dan huruf'
    //     ],
    //     'nama_matakuliah' => [
    //         'required' => 'Nama tidak boleh kosong!',
    //         'alpha_numeric_space' => 'Nama Matakuliah tidak boleh bermuatan simbol!'
    //     ],
    //     'sks' => [
    //         'required' => 'SKS tidak boleh kosong!',
    //         'integer' => 'Inputan yang anda masukkan bukan angka!',
    //         'less_than_equal_to' => 'Maksimal 4 SKS!'
    //     ],

    // ];

    protected $skipValidation = false;
    
    function getPaginated($num, $keyword = null) {
        $builder = $this->builder();
        if($keyword != '') {
            $builder->like('kode_matakuliah', $keyword);
            $builder->orLike('nama_matakuliah', $keyword);
        }
        return [
            'matakuliah' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
