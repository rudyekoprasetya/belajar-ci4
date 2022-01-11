<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function index()
    {
        echo "Ini adalah laman Product";
    }

    public function komentar() 
    {
        echo "ini adalah komentar";
    }

    public function nama($nama,$umur)
    {
        echo "Haloo, nama saya adalah, $nama dan umur saya $umur";
    }

    public function product()
    {
        
    }

}