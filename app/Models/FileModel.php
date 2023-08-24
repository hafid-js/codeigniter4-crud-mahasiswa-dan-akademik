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

    function getPaginatedMahasiswa($num, $keyword = null) {
        $id_mahasiswa = session()->get('id_user');
        $builder = $this->builder();
        $builder->join('mahasiswa','mahasiswa.nim = file.id_mahasiswa');
        $builder->where('file.id_mahasiswa =' .$id_mahasiswa);
        if($keyword != '') {
            $builder->like('file.id_mahasiswa', $keyword);
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
