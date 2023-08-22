<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $modelAkun;
    protected $modelKategori;
    protected $modelProduk;
    protected $modelKontak;
    protected $validation;
    protected $emailService;

    public function __construct()
    {
        $this->modelAkun = new AccountModel();  
        $this->modelKategori = new CategoryModel();
        $this->modelProduk = new ProductModel();
        $this->modelKontak = new ContactModel();
        $this->validation = \Config\Services::validation();
        $this->emailService = \Config\Services::email();
    }

    public function index(){
        $login = $this -> request -> getPost('btnLogin');

        if($login){
            $username = $this -> request -> getPost('username');
            $password = $this -> request -> getPost('password');

            $dataAkun = $this->modelAkun -> where("username", $username) -> first();

            if(!$dataAkun) {
                $err = "Username & Password Tidak Valid !!!";
            } else if($password != $dataAkun['password']){
                $err = "Password Tidak Sesuai !!!";
            }
            
            if(empty($err)){
                $dataSesi = [
                    'user_id' => $dataAkun['user_id'],
                    'username' => $dataAkun['username'],
                    'nama_lengkap' => $dataAkun['nama_lengkap'],
                    'email' => $dataAkun['email'],
                    'password' => $dataAkun['password']
                ];

                session() -> set($dataSesi);
                
                session()->set('logged_in', true);
                session()->setFlashdata('message', 'Berhasil Login Sebagai Admin !!!');
                return redirect() -> to('admin/akun');
            }
            
            if($err){
                session() -> setFlashData('error', $err);
            }
        }
        return view('admin/login');
    }

    public function forget_password(){
        $sendToken = $this -> request -> getPost('btnSendToken');

        if($sendToken){
            $email = $this -> request -> getPost('email');
            $akunData = $this-> modelAkun -> where('email', $email)->first();

            if($akunData){
                if($email == $akunData['email']){
                    // Character That Been Use In Reset Token
                    $tokenCharacter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $pieces  = [];
                    $max = mb_strlen($tokenCharacter, '8bit') - 1;
                    
                    // Generate Random 12 Reset Token
                    for($i = 0; $i < 12; ++$i){
                        $pieces[] = $tokenCharacter[random_int(0, $max)];
                    }
    
                    $resetToken = implode('', $pieces);
    
                    $recipientsName = $akunData['nama_lengkap'];
    
                    // Send Reset Token To User Email
                    $this->emailService->setFrom("andryancoolz@gmail.com", "Andryan");
                    $this->emailService->setTo($email);
                    $this->emailService->setSubject("Password Reset Token");
                    $this->emailService->setMessage("Hi, <b>{$recipientsName}</b> We're sending you this email because you requested a password reset.<br>
                    Here is your token to reset your password <b>{$resetToken}</b>.<br>
                    To reset your password go to link below :<br>
                    <b>http://localhost:8080/home/reset_password</b><br><br><br>
                    Thanks & Regards<br>
                    Andryan");
                    $sendResetToken = $this->emailService->send();

                    // Update New Reset Token in User Database
                    $data = array(
                        'reset_token' => $resetToken
                    );
                    $setNewResetToken = $this -> modelAkun -> updateData($data, $akunData['id_user']);

                    if($sendResetToken && $setNewResetToken){
                    session() -> setFlashdata('forget_password_message', 'Berhasil Mengirim Reset Token & Update Reset Token !!!');
                    }
    
                    else{
                        session() -> setFlashdata('forget_password_error', 'Gagal Mengirim Reset Token !!!');
                    }
                } 
            } else {
                session() -> setFlashdata('forget_password_error', 'Email Tidak Terdaftar !!!');
            }
        }
        return view('admin/forget_password');
    }

    public function reset_password(){
        $resetPassword = $this -> request -> getPost('btnResetPass');

        if($resetPassword){
            $email = $this -> request -> getPost('email');
            $token = $this -> request -> getPost('token');
            $password = $this -> request -> getPost('password');
            $confirmPassword = $this -> request -> getPost('confirmPassword');

            $dataAkun = $this -> modelAkun -> where("email", $email) -> first();

            if($email != $dataAkun['email']) :
                $err = "Email Tidak Terdaftar !!!";
                session() -> setFlashData('reset_password_error', $err);
            endif;

            if($token != $dataAkun['reset_token'] || $token == "") :
                $err = "Reset Token Tidak Sesuai !!!";
                session() -> setFlashData('reset_password_error', $err);
            endif;

            if(empty($err)){
                if($email == $dataAkun['email'] && $token == $dataAkun['reset_token']){
                    if($password == $confirmPassword){
                        $data = array(
                            'password' => $password,
                            'reset_token' => ""
                        );
                        $this -> modelAkun -> updateData($data, $dataAkun['id_user']);

                        $recipientsName = $dataAkun['nama_lengkap'];
    
                        // Send Password Reset Message To User Email
                        $this->emailService->setFrom("andryancoolz@gmail.com", "Andryan");
                        $this->emailService->setTo($email);
                        $this->emailService->setSubject("Reset Password Successful");
                        $this->emailService->setMessage("Hi, <b>{$recipientsName}</b> We're want to inform you that you're successfully reset your password.<br>
                        Now You Can Use Your New Password to Login.<br><br><br><br>
                        Thanks & Regards<br>
                        Andryan");
                        $this->emailService->send();

                        session() -> setFlashdata('reset_password_message', 'Berhasil Mereset Password & Reset Token !!!');
                    } else {
                        session()->setFlashdata('reset_password_error', 'Password & Password Konfirmasi Tidak Sama !!!');
                    }
                }
            }
        }
        return view('admin/reset_password');
    }

    public function update_profile(){
        $id = $this->request->getPost('idUser');
        $data = array(
            'nama_lengkap' => $this->request->getPost('namaUser'),
            'email' => $this->request->getPost('emailUser'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('passUser')
        );
        
        $success = $this->modelAkun->updateProfile($id, $data);

        if($success){
            session()->regenerate(true);
            
            $nama = $this->request->getPost('namaUser');
            $email = $this->request->getPost('emailUser');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('passUser');
            
            session()->set('nama_lengkap', $nama);
            session()->set('email', $email);
            session()->set('username', $username);
            session()->set('password', $password);
            
            session()->setFlashdata('message', 'Profil Berhasil di Update !!!');
        } else {
            session()->setFlashdata('error', 'Profil Gagal di Update !!!');
        }

        return redirect()->to('/admin/akun');
    }

    public function akun(){
        if(!session()->has("logged_in")){
            return redirect()->to('/admin');
        } else {
            $data = [
                'title' => 'Daftar Akun',
                'accounts' => $this->modelAkun->getData()
            ];
            return view('admin/akun', $data);
        }
    }

    public function save_akun(){
        $akun = $this->modelAkun;

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'namaUser' => [
                    'label' => 'Nama Lengkap User',
                    'rules' => 'required|is_unique[data_user.nama_lengkap]|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[data_user.username]|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'emailUser' => [
                    'label' => 'Email User',
                    'rules' => 'required|is_unique[data_user.email]|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'passUser' => [
                    'label' => 'Password User',
                    'rules' => 'required|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'statusAkunUser' => [
                    'label' => 'Status Akun User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                    ]
                ],
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('namaUser'),
                        'username' => $this->validation->getError('username'),
                        'email' => $this->validation->getError('emailUser'),
                        'password' => $this->validation->getError('passUser'),
                        'is_active' => $this->validation->getError('statusAkunUser')
                    ]
                ];
            } else {
                $data = array(
                    'nama_lengkap' => $this->request->getPost('namaUser'),
                    'email' => $this->request->getPost('emailUser'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('passUser'),
                    'is_active' => $this->request->getPost('statusAkunUser')
                );
        
                $akun->saveData($data);

                $msg = [
                    'success' => 'Data Akun Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_akun(){
        $akun = $this->modelAkun;
        $id = $this->request->getPost('idUser');

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'editNamaUser' => [
                    'label' => 'Nama Lengkap User',
                    'rules' => 'required|is_unique[data_user.nama_lengkap]|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'editUsername' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[data_user.username]|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'editEmailUser' => [
                    'label' => 'Email User',
                    'rules' => 'required|is_unique[data_user.email]|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!',
                        'valid_email' => '{field} tidak valid !!!'
                    ]
                ],
                'editPassUser' => [
                    'label' => 'Password User',
                    'rules' => 'required|min_length[8]|max_length[12]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'min_length' => '{field} tidak boleh kurang dari 8 karakter !!!',
                        'max_length' => '{field} tidak boleh lebih dari 12 karakter !!!'
                    ]
                ],
                'editStatusAkunUser' => [
                    'label' => 'Status Akun User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                    ]
                ],
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('editNamaUser'),
                        'username' => $this->validation->getError('editUsername'),
                        'email' => $this->validation->getError('editEmailUser'),
                        'password' => $this->validation->getError('editPassUser'),
                        'is_active' => $this->validation->getError('editStatusAkunUser')
                    ]
                ];
            } else {
                $data = array(
                    'nama_lengkap' => $this->request->getPost('editNamaUser'),
                    'email' => $this->request->getPost('editEmailUser'),
                    'username' => $this->request->getPost('editUsername'),
                    'password' => $this->request->getPost('editPassUser'),
                    'is_active' => $this->request->getPost('editStatusAkunUser')
                );
                
                $akun->updateData($data, $id);

                $msg = [
                    'success' => 'Data Akun Berhasil Di Update !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function kategori(){
        if(!session()->has("logged_in")){
            return redirect()->to('/admin');
        } else {
            $data = [
                'title' => 'Daftar Kategori',
                'categories' => $this->modelKategori->getData()
            ];
            return view('admin/kategori', $data);
        }
    }

    public function save_kategori(){
        $kategori = $this->modelKategori;

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'namaKategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|is_unique[data_category.category_name]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!'
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'category_name' => $this->validation->getError('namaKategori')
                    ]
                ];
            } else {
                $data = array(
                    'category_name' => $this->request->getPost('namaKategori')
                );

                $kategori->saveData($data);

                $msg = [
                    'success' => 'Data Kategori Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);  
        }
    }

    public function update_kategori(){
        $kategori = $this->modelKategori;
        $id = $this->request->getPost('idKategori');

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'editNamaKategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|is_unique[data_category.category_name]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!'
                    ]
                ]
            ]);

            $valid = $this->validate([
                'editNamaKategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|is_unique[data_category.category_name]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'is_unique' => '{field} tidak boleh sama !!!'
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'category_name' => $this->validation->getError('editNamaKategori')
                    ]
                ];   
            } else {
                $data = array(
                    'category_name' => $this->request->getPost('editNamaKategori')
                );
                
                $kategori->updateData($data, $id);

                $msg = [
                    'success' => 'Data Kategori Berhasil Di Update !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function delete_kategori(){
        $kategori = $this->modelKategori;
        $id = $this->request->getPost('deleteIdKategori');

        $kategori->deleteData($id);

        return redirect()->to('/admin/kategori');
    }

    public function produk(){
        if(!session()->has("logged_in")){
            return redirect()->to('/admin');
        } else {
            $data = [
                'title' => 'Daftar Kategori',
                'products' => $this->modelProduk->getData(),
                'categories' => $this->modelKategori->getData()
            ];
            return view('admin/produk', $data);
        }
    }

    public function save_produk(){
        $produk = $this->modelProduk;

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'namaProduk' => [
                    'label' => 'Nama Produk',
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'kategoriProduk' => [
                    'label' => 'Kategori Produk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'hargaProduk' => [
                    'label' => 'Harga Produk',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'integer' => '{field} harus berupa angka !!!'
                    ]
                ],
                'gambarProduk' => [
                    'label' => 'Gambar Produk',
                    'rules' => 'max_size[gambarProduk,2048]|mime_in[gambarProduk,image/png,image/jpg,image/jpeg,image/gif]|is_image[gambarProduk]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'descProduk' => [
                    'label' => 'Deskripsi Produk',
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 255 karakter !!!'
                    ]
                ]
            ]);
            if(!$valid){
                $msg = [
                    'error' => [
                        'product_name' => $this->validation->getError('namaProduk'),
                        'product_category' => $this->validation->getError('kategoriProduk'),
                        'product_price' => $this->validation->getError('hargaProduk'),
                        'product_image' => $this->validation->getError('gambarProduk'),
                        'product_desc' => $this->validation->getError('descProduk')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('gambarProduk');
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('img/uploads', $namaGambar);
    
                $data = array(
                    'category_id' => $this->request->getPost('kategoriProduk'),
                    'product_name' => $this->request->getPost('namaProduk'),
                    'product_price' =>$this->request->getPost('hargaProduk'),
                    'product_image' => $namaGambar,
                    'product_desc' => $this->request->getPost('descProduk')
                );
    
                $produk->saveData($data);
    
                $msg = [
                    'success' => 'Data Produk Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_produk(){
        $produk = $this->modelProduk;
        $id = $this->request->getPost('idProduk');

        if($this->request->isAJAX()){
            $valid = $this->validate([
                'editNamaProduk' => [
                    'label' => 'Nama Produk',
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 30 karakter !!!'
                    ]
                ],
                'editKategoriProduk' => [
                    'label' => 'Kategori Produk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'editHargaProduk' => [
                    'label' => 'Harga Produk',
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'integer' => '{field} harus berupa angka !!!'
                    ]
                ],
                'editGambarProduk' => [
                    'label' => 'Gambar Produk',
                    'rules' => 'max_size[editGambarProduk,2048]|mime_in[editGambarProduk,image/png,image/jpg,image/jpeg,image/gif]|is_image[editGambarProduk]',
                    'errors' => [
                        'max_size' => 'Ukuran dari {field} tidak boleh lebih dari 2 MB!!!',
                        'mime_in' => 'Jenis {field} yang diperbolehkan hanya jpg, jpeg, png, dan gif!!!',
                        'is_image' => '{field} yang diupload bukanlah gambar!!!'
                    ]
                ],
                'editDescProduk' => [
                    'label' => 'Deskripsi Produk',
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!',
                        'max_length' => '{field} tidak boleh lebih dari 255 karakter !!!'
                    ]
                ]
            ]);
            if(!$valid){
                $msg = [
                    'error' => [
                        'product_name' => $this->validation->getError('editNamaProduk'),
                        'product_category' => $this->validation->getError('editKategoriProduk'),
                        'product_price' => $this->validation->getError('editHargaProduk'),
                        'product_image' => $this->validation->getError('editGambarProduk'),
                        'product_desc' => $this->validation->getError('editDescProduk')
                    ]
                ];
            } else {
                $fileGambar = $this->request->getFile('editGambarProduk');
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('img/uploads', $namaGambar);
    
                $data = array(
                    'category_id' => $this->request->getPost('editKategoriProduk'),
                    'product_name' => $this->request->getPost('editNamaProduk'),
                    'product_price' =>$this->request->getPost('editHargaProduk'),
                    'product_image' => $namaGambar,
                    'product_desc' => $this->request->getPost('editDescProduk')
                );
    
                $produk->updateData($data, $id);
    
                $msg = [
                    'success' => 'Data Produk Berhasil Tersimpan !!!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function contact(){
        if(!session()->has("logged_in")){
            return redirect()->to('/admin');
        } else {
            $data = [
                'title' => 'Daftar Pesan Contact Us',
                'contacts' => $this->modelKontak->getData()
            ];
            return view('admin/contact', $data);
        }
    }

    public function reply_message(){
        if($this->request->isAJAX()){
            $valid = $this->validate([
                'subjekEmail' => [
                    'label' => 'Subjek Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
                'pesanEmail' => [
                    'label' => 'Pesan Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !!!'
                    ]
                ],
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'email_subject' => $this->validation->getError('subjekEmail'),
                        'email_message' => $this->validation->getError('pesanEmail')
                    ]
                ];
            } else {
                $sender = "andryancoolz@gmail.com";
                $recipient = $this -> request -> getPost('emailPenerima');
                $subject = $this -> request -> getPost('subjekEmail');
                $message = $this -> request -> getPost('pesanEmail');

                $this->emailService->setFrom($sender, "Andryan");
                $this->emailService->setTo($recipient);
                $this->emailService->setSubject($subject);
                $this->emailService->setMessage($message);

                $success = $this->emailService->send();

                if($success){
                    $msg = [
                        'success' => 'Pesan Berhasil Terkirim !!!'
                    ];
                } else {
                    $msg = [
                        'error' => 'Pesan Gagal Dikirim !!!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }

    public function logout(){
        $id = session() -> user_id;
        date_default_timezone_set('Asia/Jakarta');
        $date = array('last_login' => date('Y-m-d H:i:s'));

        $this-> modelAkun -> where('user_id', $id) -> updateData($date, $id);

        session() -> remove('logged_in');
        session() -> destroy();
        
        return redirect() -> to('/admin');
    }
}