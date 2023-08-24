<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    public function menu_admin()
    {
        if(session()->get('level') <> 1) {
            return redirect()->to(site_url('home'));
        }
        $data = array (
            'title' => 'Menu Admin',
            'isi' => 'v_halaman'
        );
        return view('layout/v_wrapper', $data);
    }

    public function menu_user()
    {
        if(session()->get('level') <> 2) {
            return redirect()->to(site_url('home'));
        }
        $data = array (
            'title' => 'Menu User',
            'isi' => 'v_halaman'
        );
        return view('layout/v_wrapper', $data);
    }

}
