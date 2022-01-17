<?php

namespace App\Controllers;

class Admin extends BaseController {

    protected $adminModel;

    public function __construct() {
        //load model
        $this->adminModel=new \App\Models\AdminModel();
    }
   
    public function index() {
        $data['judul']='CRUD Admin';  
        $data['admin']=$this->adminModel->findAll(); 
        return view('tampil_admin',$data);
    }

    public function create() {
        $data['judul'] = 'Add Employe';
        return view('tambah_admin',$data);
    }

    public function save() {
        //ambil data dari form dan masukan ke array
        $data=[
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
        ];

        //panggil function save di model
        $this->adminModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/admin');
    }

    public function edit($id_admin) {
        $data['judul']='Edit Admin';
        //ambil data berdasarkan id yang dikirm
        $data['admin']=$this->adminModel->where('id_admin', $id_admin)->findAll();;
        //tampilkan data di view 
        return view('edit_admin',$data);
    }

    public function update() {
        //ambil data dari form dan masukan ke array
        $data=[
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        $this->adminModel->update(['id_admin' => $this->request->getPost('id_admin')],$data);
        //kembali ke table employe
        return redirect()->to('/admin');
    }

    public function destroy($id_admin) {
        // hapus data berdasarkan id
        $this->adminModel->delete($id_admin);
        //kembali ke table employe
        return redirect()->to('/admin');
    }
}