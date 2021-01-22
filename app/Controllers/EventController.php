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
        return view('Event/event');
    }

    public function index()
    {
        
        if ($this->Session->get('role')=='user') {
            $event=$this->Event->getEventUser($this->Session->get('id'));
        }
        else{
            $event=$this->Event->getEvent();
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
        if ($this->request->getVar("image_event")) {
            $image = $this->request->getVar("image_event");
        }else{
            $image = 'default.jpg';
        }
        if ($this->request->getVar("id_komunitas")) {
            $id_komunitas = $this->request->getVar("id_komunitas");
        }else{
            $id_komunitas = $this->Session->get('id');

        }
        if ($this->request->getVar("status")) {
            $status = $this->request->getVar("status");
        }else{
            $status = 'Pending';
        }
        
        $this->Event->save([
            "id_komunitas" => $id_komunitas,
            "nama_event" => $this->request->getVar("nama_event"),
            "image_event" => $image,
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
        return redirect()->to("/index.php/EventController");
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
//         $image =  $this->Event->find($this->request->getVar("id_event"));
// dd($image);
        if ($this->request->getVar("image_event")) {
            $image = $this->request->getVar("image_event");
        }else{
            $image =  $this->Event->find($this->request->getVar("id_event"));

            $image = $image['image_event'];
        }
        if ($this->request->getVar("id_komunitas")) {
            $id_komunitas = $this->request->getVar("id_komunitas");
        }else{
            $id_komunitas = $this->Session->get('id');

        }
        if ($this->request->getVar("status")) {
            $status = $this->request->getVar("status");
        }else{
            $status = $this->Event->find($this->request->getVar("id_event"));

            $status = $status['status'];
        }

        // dd($this->request->getVar());
        $this->Event->save([
            "id_event" => $this->request->getVar("id_event"),
            "id_komunitas" =>$id_komunitas,
            "nama_event" => $this->request->getVar("nama_event"),
            "image_event" => $image,
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
        return redirect()->to("/index.php/EventController");
    }

    public function delete($id)
    {
        $this->Event->delete($id);
        return redirect()->to("/index.php/EventController");
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
