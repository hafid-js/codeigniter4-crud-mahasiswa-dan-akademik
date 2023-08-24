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

    public function data(){
        $keyword = $this->request->getGet('keyword');
        $data = $this->file->getPaginatedMahasiswa(10, $keyword);
        return view('file/data', $data);
    }
    public function show($id = null)
    {
   
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('file/add');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'file' => [
				'rules' => 'uploaded[file]|mime_in[file,application/pdf]|',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa pdf',
				]
                ],
			'keterangan' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			]
			
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$file = new FileModel();
		$dataFile = $this->request->getFile('file');
        $id_mahasiswa = session()->get('id_user');
		$fileName = "KRS-".$id_mahasiswa."-".date('d-m-Y H:i:s').".pdf";
		$file->insert([
            'id_mahasiswa' => $id_mahasiswa,
			'file' => $fileName,
			'keterangan' => $this->request->getPost('keterangan')
		]);
		$dataFile->move('uploads/krs/', $fileName);
		session()->setFlashdata('success', 'KRS Berhasil diupload');
		return redirect()->to(site_url('file/data'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
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
        $data = $this->file->find($id);
        $filepdf = $data->file;
        if(file_exists("uploads/krs/".$filepdf)) {
            unlink("uploads/krs/".$filepdf);
        }
        $this->file->delete($id);
        return redirect()->to(site_url('file/data'))->with('success', 'Data Berhasil Dihapus');
    }
}
