<?php

namespace App\Models;

use CodeIgniter\Model;

class AkademikModel extends Model
{
    protected $table            = 'akademik';
    protected $primaryKey       = 'id_akademik';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_akademik','nip','nama','email_akademik'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $validationRules = [
        'nip'     => 'required|integer|min_length[8]|max_length[8]',
        'nama'        => 'required|alpha_space',
        'email_akademik'        => 'required|valid_email',
    ];
    protected $validationMessages = [
        'nip' => [
            'required' => 'Nomor Induk Pegawai tidak boleh kosong',
            'integer' => 'Masukkan Nomor  Induk Pegawai dengan benar!',
            'min_length' => 'Nomor  Induk Pegawai minimal 8 karakter!',
            'max_length' => 'Nomor  Induk Pegawai maksimal 8 karakter!'
        ],
        'nama' => [
            'required' => 'Nama tidak boleh kosong!',
            'alpha_space' => 'Nama Pegawai tidak boleh bermuatan angka maupun simbol!'
        ],
        'email_akademik' => [
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Inputan yang anda masukkan bukan email!'
        ],

    ];

    protected $skipValidation = false;

    function getAll() {
        $builder = $this->db->table('akademik');
        $query = $builder->get();
        return $query->getResult();
    }
    
    function getPaginated($num, $keyword = null) {
        $builder = $this->builder();
        if($keyword != '') {
            $builder->like('nama', $keyword);
            $builder->orLike('nip', $keyword);
        }
        return [
            'akademik' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
