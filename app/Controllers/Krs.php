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
        $id_mahasiswa = session()->get('id_user');
        $db = db_connect();
        $query = $db->query("SELECT matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, sks FROM Krs, Matakuliah WHERE krs.id_mahasiswa = $id_mahasiswa GROUP BY matakuliah.kode_matakuliah");
        $data['krs'] = $query->getResult();

        $query2 = $db->query("SELECT nim, nama, email_mahasiswa FROM Mahasiswa WHERE nim = $id_mahasiswa");
        $data['mahasiswa'] = $query2->getResult();

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
        $db = db_connect();
        $query = $db->query("SELECT matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks FROM Krs, Matakuliah WHERE krs.id_matakuliah = matakuliah.id_matakuliah AND krs.id_mahasiswa = $id");
        $data['krs'] = $query->getResult();

        $query2 = $db->query("SELECT nim, nama, email_mahasiswa FROM Mahasiswa WHERE nim = $id");
        $data['mahasiswa'] = $query2->getResult();
        $data['matakuliah'] = $this->matakuliah->findAll();
 

        // $mpdf = new \Mpdf\Mpdf();
		// $html = view('krs/show', $data);
		// $mpdf->WriteHTML($html);
		// $this->response->setHeader('Content-Type', 'application/pdf');
		// $mpdf->Output();

        // $html = route_to('krs/show', $data, true);
		// $mpdf = new \Mpdf\Mpdf(array('enable_remote' => true));
		// $mpdf->WriteHTML($html);
		// $mpdf->Output();
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
