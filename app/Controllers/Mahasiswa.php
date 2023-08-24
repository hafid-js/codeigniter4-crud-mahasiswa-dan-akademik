<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
        $this->users = new UserModel();
    }

    protected $helpers = ['custom'];

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->mahasiswa->getPaginated(10, $keyword);

        //untuk menampilkan kata yang dicari
        // $data['keyword'] = $keyword;
        return view('mahasiswa/index', $data);
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
        return view('mahasiswa/new');
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'email_mahasiswa' => $this->request->getVar('email_mahasiswa'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
        ];
            
        $nim = $this->request->getVar('nim');
        $db      = db_connect();
        $cek = $db->query("SELECT * FROM Mahasiswa WHERE nim = '$nim'");
        if ($cek->getNumRows() >= 1) {
            return redirect()->back()->withInput()->with('error', 'Kode Mahasiswa tersebut sudah digunakan, silahkan gunakan yang lain!');
        } else {
            $save = $this->mahasiswa->insert($data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->mahasiswa->errors());
            } else {
                $data = [
                    'id_user' => $this->request->getVar('nim'),
                    'email_user' => $this->request->getVar('email_mahasiswa'),
                    'password_user' => password_hash($this->request->getVar('nim'), PASSWORD_DEFAULT),
                    'level' => 2,
                ];
                $this->users->insert($data);
                return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Disimpan');
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
        $mahasiswa = $this->mahasiswa->find($id);
        if (is_object($mahasiswa)) {
            $data['mahasiswa'] = $mahasiswa;
            return view('mahasiswa/edit', $data);
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
        // $data = $this->request->getPost();
        // $save = $this->mahasiswa->update($id, $data);
        // if (!$save) {
        //     return redirect()->back()->withInput()->with('errors', $this->mahasiswa->errors());
        // } else {
        //     return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Diupdate');
        // }





        // if ($cek->getNumRows() <= 2) {
        //     $save = $this->mahasiswa->update($id, $data);
        //     if (!$save) {
        //         return redirect()->back()->withInput()->with('errors', $this->mahasiswa->errors());
        //     } else {
        //         return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Disimpan');
        //     }
        // }
        // else {
        //     return redirect()->back()->withInput()->with('error', 'NIM tersebut sudah digunakan, silahkan cek kembali!');
        // }

        $data = $this->request->getPost();
        $nim = $this->request->getVar('nim');
        $save = $this->mahasiswa->update($id, $data);
        if(!$save) {
         return redirect()->back()->withInput()->with('errors', $this->mahasiswa->errors());
       } else {
        $data = [
            'id_user' => $this->request->getVar('nim'),
            'email_user' => $this->request->getVar('email_mahasiswa'),
            'password_user' => password_hash($nim, PASSWORD_BCRYPT),
            'level' => 2,
        ];
         return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Diupdate');
       }
    
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $id_user = $this->request->getVar('nim');
        $this->users->query("Delete FROM users WHERE id_user = $id_user");
        $this->mahasiswa->delete($id);
      
        return redirect()->to(site_url('mahasiswa'))->with('success', 'Data Berhasil Dihapus');
    }
}
