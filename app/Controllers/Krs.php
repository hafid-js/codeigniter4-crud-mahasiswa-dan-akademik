<?php

namespace App\Controllers;

use App\Models\KrsModel;
use App\Models\MatakuliahModel;
use CodeIgniter\RESTful\ResourceController;
use PDO;

class Krs extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->krs = new KrsModel();
        $this->matakuliah = new MatakuliahModel();
    }

    protected $helpers = ['custom'];

    public function index()
    {
        $query = $this->db->query("SELECT matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, count(sks) as jumlah_sks FROM Krs, Matakuliah");
        $data['krs'] = $query->getResult();
        $data['matakuliah'] = $this->matakuliah->findAll();
        return view('krs/index', $data);
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
        $conn = new PDO('mysql:host=127.0.0.1;dbname=db_mahasiswa', 'root', '');
		foreach ($_POST['id_mahasiswa'] as $key => $id_mahasiswa ) {
			$sql = 'INSERT INTO krs(id_mahasiswa, id_matakuliah) VALUES(:id_mahasiswa, :id_matakuliah)';
			$stmt = $conn->prepare($sql);
			$stmt->execute([
				'id_mahasiswa' => $id_mahasiswa,
				'id_matakuliah' => $_POST['id_matakuliah'][$key],
			]);
		}
        return redirect()->to(site_url('krs'))->with('success', 'Data Berhasil Ditambahkan');
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

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
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
