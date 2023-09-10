<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'id_mahasiswa';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_mahasiswa','nim','nama','email_mahasiswa','jenis_kelamin','alamat'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $validationRules = [
        'nim'     => 'required|integer|min_length[8]|max_length[8]',
        'nama'        => 'required|alpha_space',
        'email_mahasiswa'        => 'required|valid_email',
        'jenis_kelamin'        => 'required',
    ];
    protected $validationMessages = [
        'nim' => [
            'required' => 'NIM tidak boleh kosong',
            'integer' => 'Masukkan NIM dengan benar!',
            'min_length' => 'NIM minimal 8 karakter!',
            'max_length' => 'NIM maksimal 8 karakter!'
        ],
        'nama' => [
            'required' => 'Nama tidak boleh kosong!',
            'alpha_space' => 'Nama Mahasiswa tidak boleh bermuatan angka maupun simbol!'
        ],
        'email_mahasiswa' => [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Inputan yang anda masukkan bukan email!'
        ],
        'jenis_kelamin' => [
            'required' => 'Pilih Jenis Kelamin!',
        ],

    ];

    protected $skipValidation = false;

    function getAll() {
        $builder = $this->db->table('mahasiswa');
        $query = $builder->get();
        return $query->getResult();
    }
    
    function getPaginated($num, $keyword = null) {
        $builder = $this->builder();
        $builder->select('mahasiswa.*, krs.id_matakuliah');
        $builder->select('count(krs.id_matakuliah) as total_matakuliah');
        $builder->join('krs', 'krs.id_mahasiswa = mahasiswa.nim', 'left');
        $builder->groupBy('mahasiswa.nim');
        $builder->orderBy('created_at DESC');
        if($keyword != '') {
            $builder->like('nama', $keyword);
            $builder->orLike('nim', $keyword);
            $builder->orLike('jenis_kelamin', $keyword);
            $builder->orLike('alamat', $keyword);
            $builder->groupBy('mahasiswa.nim');
        }
        return [
            'mahasiswa' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }



    
}




