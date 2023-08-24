<?php

namespace App\Controllers;

use App\Models\KrsModel;
use App\Models\MatakuliahModel;
use CodeIgniter\RESTful\ResourceController;
use PDO;
use TCPDF;

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
        $query = $db->query("SELECT krs.id_krs, matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, sks FROM Krs, Matakuliah WHERE krs.id_matakuliah = matakuliah.id_matakuliah AND krs.id_mahasiswa = $id_mahasiswa");
        $data['krs'] = $query->getResult();

        $query2 = $db->query("SELECT nim, nama, email_mahasiswa FROM Mahasiswa WHERE nim = $id_mahasiswa");
        $data['mahasiswa'] = $query2->getResult();

        $query3 = $db->query("SELECT nim, nama, email_mahasiswa FROM Mahasiswa WHERE nim = $id_mahasiswa");
        $data['mahasiswa'] = $query3->getResult();

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

        $html = view('krs/show', $data);

		$pdf = new TCPDF('R', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('invoice.pdf', 'I');
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
        $this->krs->delete($id);
        return redirect()->to(site_url('krs'))->with('success', 'Data Berhasil Dihapus');
    }
}
