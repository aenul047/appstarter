<?php

namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
    protected $User;
    protected $session;

    public function __construct()       
    {
        $this->Session = session();
        $this->User = new UserModel();
    }
    public function Register()
    {
        $data = [
            'title' => 'Register esi Sumbawa',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }
    public function Login()
    {
        $data = [
            'title' => 'Login esi Sumbawa'
        ];
        return view('Auth/login', $data);
    }
    public function verifikasi()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->User->where('email', $email)->first();

        if ($data) {
            $verify_pass = password_verify($password, $data['password']);
            if ($verify_pass) {
                // echo "berhasil";
                $user = [
                    'role' => $data['hak_akses'],
                    'user' => $data,
                    'id' => $data['id'],
                    'logged_in' => true
                ];
                $this->Session->set($user);
                return redirect()->to('/EventController');
            } else {
                echo "password salah";
            }
        }else{
            echo "data tidak ada";

        }
        // dd($data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Auth');
    }
}