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
}