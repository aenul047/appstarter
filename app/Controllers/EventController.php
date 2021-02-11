<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\UserModel;
use App\Models\tabel_squadModel;


class EventController extends BaseController
{
    protected $Event;
    protected $User;
    protected $session;

    public function __construct()
    {
        $this->Event = new EventModel();
        $this->User = new UserModel();
        $this->Squad = new tabel_squadModel();
        $this->Session = session();
    }

    public function Event()
    {
        $data = [
            'session' => $this->Session->get('role')
        ];

        return view('Event/event', $data);
    }

    public function index()
    {

        if ($this->Session->get('role') == 'user') {
            $event = $this->Event->getEventUser($this->Session->get('id'));
        } else {
            $event = $this->Event->getEvent();
        }
        $data = [
            'Event' => $event,
            'session' => $this->Session->get('role')
        ];

        return view('Event/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'User' => $this->User->findAll(),
            'session' => $this->Session->get('role')

        ];
        return view('Event/add', $data);
    }

    public function save()
    {
        // ambil gambar
        $fileGambar = $this->request->getFile('image_event');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = '';
        } else {

            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke gambar
            $fileGambar->move('event', $namaGambar);
        }

        if ($this->request->getVar("id_komunitas")) {
            $id_komunitas = $this->request->getVar("id_komunitas");
        } else {
            $id_komunitas = $this->Session->get('id');
        }
        if ($this->request->getVar("status")) {
            $status = $this->request->getVar("status");
        } else {
            $status = 'Pending';
        }

        $this->Event->save([
            "id_komunitas" => $id_komunitas,
            "nama_event" => $this->request->getVar("nama_event"),
            "image_event" => $namaGambar,
            "registrasi_slot" => $this->request->getVar("registrasi_slot"),
            "hadiah" => $this->request->getVar("hadiah"),
            "estimasi_waktu" => $this->request->getVar("estimasi_waktu"),
            "tanggal_mulai" => $this->request->getVar("tanggal_mulai"),
            "tanggal_selesei" => $this->request->getVar("tanggal_selesei"),
            "tempat" => $this->request->getVar("tempat"),
            "status" => $status,
            "keterangan" => $this->request->getVar("keterangan"),

        ]);
        session()->setflashdata("pesan", "Event berhasil ditambahkan.");
        return redirect()->to("/EventController");
    }

    public function update($id)
    {
        // dd($id);
        $data = [
            'Event' => $this->Event->getWhere($id),
            'User' => $this->User->findAll(),
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role')
        ];
        return view('Event/update', $data);
    }

    public function saveUpdate()
    {
        $fileGambar = $this->request->getFile('image_event');
        $gambarLama =  $this->Event->find($this->request->getVar("id_event"));
        $gambarLama = $gambarLama['image_event'];
        // cek gambar, apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $gambarLama;
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // upload gambar
            $fileGambar->move('event', $namaGambar);
            // hapus file lama
            if ($gambarLama) {
                unlink('event/' . $gambarLama);
            }
        }

        if ($this->request->getVar("id_komunitas")) {
            $id_komunitas = $this->request->getVar("id_komunitas");
        } else {
            $id_komunitas = $this->Session->get('id');
        }
        if ($this->request->getVar("status")) {
            $status = $this->request->getVar("status");
        } else {
            $status = $this->Event->find($this->request->getVar("id_event"));

            $status = $status['status'];
        }

        // dd($this->request->getVar());
        $this->Event->save([
            "id_event" => $this->request->getVar("id_event"),
            "id_komunitas" => $id_komunitas,
            "nama_event" => $this->request->getVar("nama_event"),
            "image_event" => $namaGambar,
            "registrasi_slot" => $this->request->getVar("registrasi_slot"),
            "hadiah" => $this->request->getVar("hadiah"),
            "estimasi_waktu" => $this->request->getVar("estimasi_waktu"),
            "tanggal_mulai" => $this->request->getVar("tanggal_mulai"),
            "tanggal_selesei" => $this->request->getVar("tanggal_selesei"),
            "tempat" => $this->request->getVar("tempat"),
            "status" => $status,
            "keterangan" => $this->request->getVar("keterangan"),

        ]);
        session()->setflashdata("pesan", "Event berhasil ditambahkan.");
        return redirect()->to("/EventController");
    }

    public function delete($id)
    {
        $gambarLama =  $this->Event->find($id);
        if ($gambarLama) {
            unlink('event/' . $gambarLama['image_event']);
        }
        
        $this->Event->delete($id);
        return redirect()->to("/EventController");
    }

    public function detail($id)
    {
        $data = [
            'Event' => $this->Event->detail_event($id),
            'Squad' => $this->Squad->where('id_event', $id)->find(),
            'session' => $this->Session->get('role')

        ];

        return view('Event/detail', $data);
    }
}
