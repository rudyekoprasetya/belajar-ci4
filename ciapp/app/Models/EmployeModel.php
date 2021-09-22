<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'nama', 'alamat', 'gender', 'gaji'];


    // public function __construct() {
    //     parent:: __construct();
    //     //koneksikan ke database
    //     $this->db = db_connect();
       
    // }

    // public function getData() {
    //     //query
    //     // $query="SELECT * FROM employes";
    //     //ambil data dan jadikan array
    //     // return $data=$this->db->query($query)->getResultArray();
    //     $builder=$this->db->table($this->table);
    //     return $data=$builder->get()->getResultArray();
    // }

    // public function simpan($data) {
    //     //simpan data ke database
    //     $builder=$this->db->table($this->table);
    //     $builder->insert($data);
    // }

    // public function getDataByID($id) {
    //     $builder=$this->db->table($this->table);
    //     //ambil data berdasarkan id
    //     //SELECT * FROM employe WHERE id='$id'
    //     return $data=$builder->getWhere([ 'id' => $id ])->getResultArray();
    // }

    // public function ubah($key,$data) {
    //     $builder=$this->db->table($this->table);
    //     //ubah data dalam tabel
    //     //update employe set field1, field2 WHERE id='$id'
    //     $builder->update($key,$data);
    // }
}