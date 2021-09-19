<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {

    public function __construct() {
        //aktifkan url helper
        helper('url');
    }

    public function index() {
        $data['judul']='Laman Home'; 
        $data['isi']='Lorem ipsum dolor sit amet'; 
        return view('dashboard',$data);
    }

    public function gallery() {
        $data['judul']='Laman Gallery';  
        return view('gallery',$data);
    }

    public function about() {
        $data['judul']='Laman About'; 
        $data['isi']='Ini adalah halaman about'; 
        return view('about',$data);
    }
}
