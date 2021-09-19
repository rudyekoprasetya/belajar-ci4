<?php

namespace App\Controllers;

class Web extends BaseController {
    public function index() {
        echo "hallo nama saya Code Igniter 4 salam Kenal";
    }

    public function komentar() {
        echo "ini adalah fungsi komentar";
    }

    public function nama($nama,$umur) {
        echo "Haloo nama saya $nama, umur $umur";
    }

    public function biodata() {
        $data['nama'] = 'Rudy Eko Prasetya';
        $data['alamat'] = 'Kediri';
        return view('biodata',$data);
    }

    public function hitung() {
        $data['judul'] = 'Kalkulator Sederhana'; 
        $data['angka1'] = 0; 
        $data['angka2'] = 0; 
        $data['hasil'] = 0; 
        return view('kalkulator',$data); 
    }

    public function proses() {
        $data['judul'] = 'Kalkulator Sederhana'; 
        $data['angka1']=$this->request->getPost('angka1');
        $data['angka2']=$this->request->getPost('angka2');
        $data['hasil'] = $data['angka1'] * $data['angka2']; 
        return view('kalkulator',$data); 
    }
}