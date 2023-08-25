<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $modelProduk;
    protected $modelKontak;
    protected $validation;

    public function __construct()
    {
        $this->modelProduk = new ProductModel();
        $this->modelKontak = new ContactModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'products' => $this->modelProduk->getFewData()
        ];

        return view('public/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];

        return view('public/about', $data);
    }

    public function menu()
    {
        $data = [
            'title' => 'Produk',
            'products' => $this->modelProduk->getData()
        ];

        return view('public/menu', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];

        return view('public/contact', $data);
    }

    public function send_message()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'message' => [
                    'label' => 'Pesan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'email' => $this->validation->getError('email'),
                        'message' => $this->validation->getError('message')
                    ]
                ];
            } else {
                $data = array(
                    'contact_name' => $this->request->getPost('nama'),
                    'contact_email' => $this->request->getPost('email'),
                    'contact_message' => $this->request->getPost('message')
                );

                $this->modelKontak->saveData($data);

                $msg = [
                    'success' => 'Pesan Anda Berhasil Terkirim !!!'
                ];
            }
            echo json_encode($msg);
        }
    }
}
