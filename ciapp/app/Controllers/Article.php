<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Article extends ResourceController
{    
    protected $articleModel;
    public function __construct() {
        //load model
        $this->articleModel=new \App\Models\ArticleModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //tampilkan semua data
        $data=$this->articleModel->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //tampilkan data dengan id tertentu
        $data=$this->articleModel->where('id',$id)->first();
        
        //jika data ketemu
        if($data) {
            return $this->respond($data);
        } else {
            //jika data tidak ditemukan
            return $this->failNotFound('data tidak ditemukan');
        }
        
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //untuk tambah data
        $data = [
            'title' =>$this->request->getVar('title'),
            'articles' =>$this->request->getVar('articles'),
            'author' =>$this->request->getVar('author')
        ];

        //masukan dalam database
        $this->articleModel->insert($data);

        //untuk respon
        return $this->respondCreated($data, 'Data berhasil disimpan');

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //ambil data
        $data=[
            'title' =>$this->request->getVar('title'),
            'articles' =>$this->request->getVar('articles'),
            'author' =>$this->request->getVar('author')
        ];

        //ubah data
        $this->articleModel->update($id,$data);

        //respon 
        return $this->respondUpdated($data,'Data berhasil diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //cari data berdasarkan id
        $cari=$this->articleModel->find($id);
        
        //jika ada hapus data
        if($cari) {
            $this->articleModel->delete($id);
            return $this->respondDeleted(['id'=>$id.' Data Berhasil dihapus']);
        } else {
            return $this->failNotFound('data tidak ditemukan');
        }
    }
}
