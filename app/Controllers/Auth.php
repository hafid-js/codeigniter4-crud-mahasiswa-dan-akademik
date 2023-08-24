<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Auth_Model = new AuthModel();
    }

    public function login()
    {
       return view('login');
    }

    public function cek_login(){
        if($this->validate([
            'email_user' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi dan tidak boleh kosong!'
                ]
            ],
            'password_user' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi dan tidak boleh kosong!'
                ]
            ],
        ])) {
            // jika valid
            $email_user = $this->request->getPost('email_user');
            $password_user = $this->request->getPost('password_user');
            $cek = $this->Auth_Model->login($email_user, $password_user);
            if ($cek) {
                session()->set('log', true);
                session()->set('id_user', $cek['id_user']);
                session()->set('email_user', $cek['email_user']);
                session()->set('level', $cek['level']);
                //login
                return redirect()->to(site_url('home'));
            } else {
                //jika datanya tidak cocok
                session()->setFlashdata('error','Login Gagal !, Username atau Password tidak cocok');
                return redirect()->to(site_url('auth/login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('auth/login'));
        }
    }

    public function logout() {
        session()->remove('log');
        session()->remove('email_user');
        session()->remove('level');
        session()->setFlashdata('pesan','Logout Suksess...!');
        return redirect()->to(site_url('auth/login'));
    }


}
