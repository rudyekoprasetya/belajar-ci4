<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $authModel;

    public function __construct() 
    {
        //load model auth
        $this->authModel=new \App\Models\AuthModel();
    }

    public function index()
    {
        $data['judul']='Register Admin Employe';
        //tampilkan laman register
        return view('register',$data);   
    }

    public function register()
    {
        $validasi = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[admins.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password_new' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter'
                ]
            ],
            'password' => [
                //password keduanya harus sama
                'rules' => 'matches[password_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ]);

        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if(!$validasi){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        //Jika data sesuai lakukan penyimpanan data
        $data=[
            'username' => $this->request->getPost('username'),
            //enkripsi password dengan BCRYPT
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
        ];

        //memasukan data dalam database
        $this->authModel->insert($data);

        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');

    }

    public function login() {
        $data['judul']='Login Admin Employe';
        //tampilkan laman login
        return view('login',$data);
    }
}
