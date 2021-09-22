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

    public function edit($id) {
        $data['judul']='Edit Employe';
        //ambil data berdasarkan id yang dikirm
        // $data['employe']=$this->employeModel->getDataByID($id);
        $data['employe']=$this->employeModel->where('id', $id)->findAll();;
        //tampilkan data di view 
        return view('edit_data',$data);
    }

    public function update() {
        //ambil data dari form dan masukan ke array
        $data=[
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'gender' => $this->request->getPost('gender'),
            'gaji' => $this->request->getPost('gaji')
        ];
        //panggil fungsi ubah di model dan kirimkan datanya
        // $this->employeModel->ubah($data,['id' => $this->request->getPost('id')]);
        $this->employeModel->update(['id' => $this->request->getPost('id')],$data);
        //kembali ke table employe
        return redirect()->to('/employe');
    }
}