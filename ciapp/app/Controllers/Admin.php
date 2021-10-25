<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController {
    protected $adminModel;

    public function __construct() {
        // load model admin
        $this->adminModel=new \App\Models\AdminModel();
    }

    public function index() {
        $data['judul']='Register Admin Employe'; 
        //tampilkan laman register
        return view('register',$data);        
    }

    public function register() {
        $validasi = $this->validate([
            'username'=>[
                'rules' => 'required | is_unique[admins.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required | min_lenght[4]',
                'errors' => [
                    'required' => 
                ]
            ]

        ]);
        //ambil data dari form
        $data=[
            'username' => $this->request->getPost('username'),
            //enkripsi password dengan BCRYPT
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
        ];
        //memasukan data dalam database
        $this->adminModel->insert($data);

        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');
    }

    public function login() {
        $data['judul']='Login Admin Employe'; 
        //tampilkan laman register
        return view('login',$data); 
    }


}
