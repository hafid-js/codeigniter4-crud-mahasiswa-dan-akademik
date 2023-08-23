<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;
use CodeIgniter\RESTful\ResourceController;

class Matakuliah extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->matakuliah = new MatakuliahModel();
    }

    protected $helpers = ['custom'];
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->matakuliah->getPaginated(10, $keyword);

        //untuk menampilkan kata yang dicari
        // $data['keyword'] = $keyword;
        return view('matakuliah/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('matakuliah/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'kode_matakuliah' => $this->request->getVar('kode_matakuliah'),
            'nama_matakuliah' => $this->request->getVar('nama_matakuliah'),
            'sks' => $this->request->getVar('sks'),
        ];

        $kode_matakuliah = $this->request->getVar('kode_matakuliah');
        $db      = db_connect();
        $cek = $db->query("SELECT * FROM Matakuliah WHERE kode_matakuliah = '$kode_matakuliah'");
        if ($cek->getNumRows() >= 1) {
            return redirect()->back()->withInput()->with('error', 'Kode Matakuliah tersebut sudah digunakan, silahkan gunakan yang lain!');
        } else {
            $save = $this->matakuliah->insert($data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->matakuliah->errors());
            } else {
                return redirect()->to(site_url('matakuliah'))->with('success', 'Data Berhasil Disimpan');
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $matakuliah = $this->matakuliah->find($id);
        if (is_object($matakuliah)) {
            $data['matakuliah'] = $matakuliah;
            return view('matakuliah/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        
        $data = $this->request->getPost();
        $save = $this->matakuliah->update($id, $data);
        if(!$save) {
         return redirect()->back()->withInput()->with('errors', $this->matakuliah->errors());
       } else {
         return redirect()->to(site_url('matakuliah'))->with('success', 'Data Berhasil Diupdate');
       }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
