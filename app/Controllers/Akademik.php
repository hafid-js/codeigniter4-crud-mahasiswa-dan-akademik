<?php

namespace App\Controllers;

use App\Models\AkademikModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Akademik extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        $this->akademik = new AkademikModel();
        $this->users = new UserModel();
    }

    protected $helpers = ['custom'];

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->akademik->getPaginated(10, $keyword);

        //untuk menampilkan kata yang dicari
        // $data['keyword'] = $keyword;
        return view('akademik/index', $data);
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
        return view('akademik/new');
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'email_akademik' => $this->request->getVar('email_akademik'),
        ];
            
        $nip = $this->request->getVar('nip');
        $db      = db_connect();
        $cek = $db->query("SELECT * FROM Akademik WHERE nip = '$nip'");
        if ($cek->getNumRows() >= 1) {
            return redirect()->back()->withInput()->with('error', 'Nomor Induk Pegawai tersebut sudah digunakan, silahkan gunakan yang lain!');
        } else {
            $save = $this->akademik->insert($data);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->akademik->errors());
            } else {
                $data = [
                    'id_user' => $this->request->getVar('nip'),
                    'email_user' => $this->request->getVar('email_akademik'),
                    'password_user' => password_hash($this->request->getVar('nip'), PASSWORD_DEFAULT),
                    'level' => 1,
                ];
                $this->users->insert($data);
                return redirect()->to(site_url('akademik'))->with('success', 'Data Berhasil Disimpan');
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
        $akademik = $this->akademik->find($id);
        if (is_object($akademik)) {
            $data['akademik'] = $akademik;
            return view('akademik/edit', $data);
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

        $data = [
            'nama' => $this->request->getVar('nama'),
        ];
        $save = $this->akademik->update($id, $data);
        if(!$save) {
         return redirect()->back()->withInput()->with('errors', $this->akademik->errors());
       } else {
        $data = [
            'id_user' => $this->request->getVar('nip'),
            'email_user' => $this->request->getVar('email_akademik'),
            'password_user' => $this->request->getVar('nip'),
            'level' => 2,
        ];
         return redirect()->to(site_url('akademik'))->with('success', 'Data Berhasil Diupdate');
       }
    
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $id_user = $this->request->getVar('nip');
        $this->users->query("Delete FROM akademik WHERE nip = $id_user");
        $this->users->query("Delete FROM users WHERE id_user = $id_user");
        return redirect()->to(site_url('akademik'))->with('success', 'Data Berhasil Dihapus');
    }
}
