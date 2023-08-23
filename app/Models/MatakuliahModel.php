<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    protected $table            = 'matakuliah';
    protected $primaryKey       = 'id_matakuliah';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_matakuliah','kode_matakuliah','nama_matakuliah','sks'];
//  protected $useTimestamps = true;   
//     protected $useSoftDeletes = false;

    protected $validationRules = [
        'kode_matakuliah'     => 'required|min_length[6]|max_length[10]|alpha_numeric',
        'nama_matakuliah'        => 'required|alpha_numeric_space',
        'sks'        => 'required|integer|less_than_equal_to[4]',
    ];
    protected $validationMessages = [
        'kode_matakuliah' => [
            'required' => 'Kode Matakuliah tidak boleh kosong',
            'integer' => 'Masukkan Kode Matakuliah dengan benar!',
            'min_length' => 'Kode Matakuliah minimal 6 karakter!',
            'max_length' => 'Kode Matakuliah maksimal 10 karakter!',
            'alpha_numeric' => 'Kode hanya boleh menggunakan angka dan huruf'
        ],
        'nama_matakuliah' => [
            'required' => 'Nama tidak boleh kosong!',
            'alpha_numeric_space' => 'Nama Matakuliah tidak boleh bermuatan simbol!'
        ],
        'sks' => [
            'required' => 'SKS tidak boleh kosong!',
            'integer' => 'Inputan yang anda masukkan bukan angka!',
            'less_than_equal_to' => 'Maksimal 4 SKS!'
        ],

    ];

    protected $skipValidation = false;

    function getAll() {
        $builder = $this->db->table('matakuliah');
        $query = $builder->get();
        return $query->getResult();
    }
    
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
