<?php

namespace App\Controllers;

class Employe extends BaseController {

    protected $employeModel;

    public function __construct() {
        //load model
        $this->employeModel=new \App\Models\EmployeModel();
    }
   
    public function index() {
        // dd($this->employeModel->getData());
        $data['judul']='CRUD Employe'; 
        // $data['employe']=$this->employeModel->getData(); 
        $data['employe']=$this->employeModel->findAll(); 
        // dd($data['employe']);
        return view('tampil_data',$data);
    }

    public function create() {
        $data['judul'] = 'Add Employe';
        return view('tambah_data',$data);
    }

    public function save() {
        //ambil data dari form dan masukan ke array
        $data=[
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'gaji' => $this->request->getPost('gaji')
        ];

        //panggil function save di model
        // $this->employeModel->simpan($data);
        $this->employeModel->insert($data);
        //kembali ke table employe
        return redirect()->to('/employe');
    }
}