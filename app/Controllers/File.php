<?php

namespace App\Controllers;

use App\Models\FileModel;
use CodeIgniter\RESTful\ResourceController;

class File extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */


    function __construct()
    {

        $this->file = new FileModel();
    }

    protected $helpers = ['custom'];

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->file->getPaginated(10, $keyword);
        return view('file/index', $data);
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }


    public function change($id = null)
    {
       
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // $data = [
        //     'status' => $this->request->getVar('status'),
        // ];

        // // $status = $this->request->getVar('status');
        // $this->db->table('file')->where([
        //     'id_file' => $id
        // ])->update($data);
        // return redirect()->to(site_url('file'))->with('success', 'Berhasil Menolak Data KRS');

        $data = [
            'status' => $this->request->getVar('status'),
        ];

        $status = $this->request->getVar('status');
        $save = $this->file->update($id, $data);
        if(!$save) {
         return redirect()->to(site_url('file'))->with('error', 'Gagal Menolak Data KRS');
       } else {
        if($status == 1) {
            return redirect()->to(site_url('file'))->with('success', 'Berhasil Menyetujui Data KRS');
        } else {
            return redirect()->to(site_url('file'))->with('success', 'Berhasil Menolak Data KRS');
        }
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
