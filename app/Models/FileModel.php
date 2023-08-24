<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table            = 'file';
    protected $primaryKey       = 'id_file';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_file', 'id_mahasiswa', 'file', 'keterangan', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    //     protected $useSoftDeletes = false;



    function getPaginated($num, $keyword = null) {
        $builder = $this->builder();
        $builder->join('mahasiswa','mahasiswa.nim = file.id_mahasiswa');
        if($keyword != '') {
            $builder->like('mahasiswa.nim', $keyword);
            // $builder->orLike('nim', $keyword);
            // $builder->orLike('jenis_kelamin', $keyword);
            // $builder->orLike('alamat', $keyword);
        }
        return [
            'file' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
