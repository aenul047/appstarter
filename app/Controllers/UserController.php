<?php

namespace App\Controllers;

use App\Models\UserModel;


class UserController extends BaseController
{
    protected $User;
    protected $session;

    public function __construct()
    {
        $this->User = new UserModel();
        $this->Session = session();
    }

    public function index()
    {
        $data = [
            'User' => $this->User->findAll(),
            'session' => $this->Session->get('role')
        ];

        return view('User/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role')
        ];
        return view('User/add', $data);
    }

    public function save()
    {
        if($this->request->getVar("image")){
            $image = $this->request->getVar("image");
        }else{
            $image = "default.jpg";
        }
        $this->User->save([
            "nama" => $this->request->getVar("nama"),
            "image" => $image,
            "komunitas" => $this->request->getVar("komunitas"),
            "email" => $this->request->getVar("email"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT),
            "contact" => $this->request->getVar("contact"),
            "tgl" => date('Y/m/d'),
            "hak_akses" => 'user',
        ]);
        session()->setflashdata("pesan", "User berhasil ditambahkan.");
        return redirect()->to("/auth/login");
    }

    public function update($id)
    {
        $data = [
            'User' => $this->User->find($id),
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role')
        ];
        return view('User/update', $data);
    }

    public function saveUpdate()
    {
        if($this->request->getVar("image")){
            $image = $this->request->getVar("image");
        }else{
            $image = "default.jpg";
        }
        $this->User->save([
            "id" => $this->request->getVar("id"),
            "nama" => $this->request->getVar("nama"),
            "image" => $image,
            "komunitas" => $this->request->getVar("komunitas"),
            "email" => $this->request->getVar("email"),
            "password" => $this->request->getVar("password"),
            "contact" => $this->request->getVar("contact"),
            "tgl" => date('Y/m/d'),
            "hak_akses" => 'user',

        ]);
        session()->setflashdata("pesan", "User berhasil ditambahkan.");
        return redirect()->to("/index.php/UserController");
    }

    public function delete($id)
    {
        $this->User->delete($id);
        return redirect()->to("/index.php/UserController");
    }

    public function detail($id)
    {
        $data = [
            'User' => $this->User->find($id),
            'session' => $this->Session->get('role')
        ];

        return view('User/detail', $data);
    }
}
