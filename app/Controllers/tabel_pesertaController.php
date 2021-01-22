<?php

namespace App\Controllers;

use App\Models\tabel_pesertaModel;
use App\Models\tabel_squadModel;

class tabel_pesertaController extends BaseController
{
    protected $tabel_peserta;
    protected $session;
    protected $Squad;

    public function __construct()
    {
        $this->tabel_peserta = new tabel_pesertaModel();
        $this->Session = session();
        $this->Squad = new tabel_squadModel();
    }

    public function index()
    {
        $data = [
            'tabel_peserta' => $this->tabel_peserta->findAll(),
            'session' => $this->Session->get('role')
        ];

        return view('tabel_peserta/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role'),
            'nama_squad' => $this->Squad->findAll()
        ];
        return view('tabel_peserta/add', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        $this->tabel_peserta->save([
            "id_squad" => $this->request->getVar("id_squad"),
            "nama" => $this->request->getVar("nama"),
            "in_game_name" => $this->request->getVar("in_game_name"),
            "id_game" => $this->request->getVar("id_game"),

        ]);
        session()->setflashdata("pesan", "tabel_peserta berhasil ditambahkan.");
        return redirect()->to("/index.php/tabel_pesertaController");
    }

    public function update($id)
    {
        $data = [
            'tabel_peserta' => $this->tabel_peserta->find($id),
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role'),
            'nama_squad' => $this->Squad->findAll()
        ];
        return view('tabel_peserta/update', $data);
    }

    public function saveUpdate()
    {
        $this->tabel_peserta->save([
            "id" => $this->request->getVar("id"),
            "id_squad" => $this->request->getVar("id_squad"),
            "nama" => $this->request->getVar("nama"),
            "in_game_name" => $this->request->getVar("in_game_name"),
            "id_game" => $this->request->getVar("id_game"),

        ]);
        session()->setflashdata("pesan", "tabel_peserta berhasil ditambahkan.");
        return redirect()->to("/index.php/tabel_pesertaController");
    }

    public function delete($id)
    {
        $this->tabel_peserta->delete($id);
        return redirect()->to("/index.php/tabel_pesertaController");
    }

    public function detail($id)
    {
        $data = [
            'tabel_peserta' => $this->tabel_peserta->find($id),
            'session' => $this->Session->get('role'),
            
        ];

        return view('tabel_peserta/detail', $data);
    }
}
