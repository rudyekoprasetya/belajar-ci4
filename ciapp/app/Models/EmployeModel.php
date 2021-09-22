<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeModel extends Model {

    protected $db;

    protected $table='employes';

    protected $primaryKey = 'id';

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
}