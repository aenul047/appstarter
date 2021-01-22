<?php
namespace App\Controllers;

use App\Models\tabel_squadModel;
use App\Models\EventModel;
use App\Models\tabel_pesertaModel;



class tabel_squadController extends BaseController
{
    protected $tabel_squad;
    protected $event;
    protected $session;
    protected $tabel_peserta;

    public function __construct()
    {
        $this->tabel_squad = new tabel_squadModel();
        $this->Event = new EventModel();
        $this->Session = session();
        $this->tabel_peserta = new tabel_pesertaModel();
    }

    public function index()
    {
        if ($this->Session->get('role')=='user') {
            $tabel_squad=$this->tabel_squad->getSquadbyevent($this->Session->get('id'));
        }
        else{
            $tabel_squad=$this->tabel_squad->findAll();
        }
        $data = [
            'tabel_squad'=> $tabel_squad,
            'session' => $this->Session->get('role')
        ];

        return view('tabel_squad/index', $data);
    }

    public function add()
    {
        if ($this->Session->get('id')=='user') {
            $event=$this->Event->where('id_komunitas', $this->Session->get('id'))->find();
        }
        else{
            $event=$this->Event->findAll();
        }
        $data = [
            'validation' => \Config\Services::validation(),
            'Event' => $event,
            'session' => $this->Session->get('role')
        ];
        return view('tabel_squad/add', $data);
    }

    public function save()
    {
        $this->tabel_squad->save([
            "id_event" => $this->request->getVar("id_event"),
            "nama_squad" => $this->request->getVar("nama_squad"),
            "ketua" => $this->request->getVar("ketua"),
            "contact_person" => $this->request->getVar("contact_person"),
            "status_pembayaran" => 'Belum Lunas',

        ]);
        session()->setflashdata("pesan", "tabel_squad berhasil ditambahkan.");
        return redirect()->to("/index.php/tabel_squadController");
    }

    public function update($id, $id_event)
    {
        $data = [
            'tabel_squad' => $this->tabel_squad->getEvent($id, $id_event),
            'Event' => $this->Event->findAll(),
            'validation' => \Config\Services::validation(),
            'session' => $this->Session->get('role')

        ];
        // dd($data);
        return view('tabel_squad/update', $data);
    }

    public function saveUpdate()
    {
        $this->tabel_squad->save([
            "id" => $this->request->getVar("id"),
            "id_event" => $this->request->getVar("id_event"),
            "nama_squad" => $this->request->getVar("nama_squad"),
            "ketua" => $this->request->getVar("ketua"),
            "contact_person" => $this->request->getVar("contact_person"),
            "status_pembayaran" => $this->request->getVar("status_pembayaran"),

        ]);
        session()->setflashdata("pesan", "tabel_squad berhasil ditambahkan.");
        return redirect()->to("/index.php/tabel_squadController");
    }
    
    public function delete($id)
    {
        $this->tabel_squad->delete($id);
        return redirect()->to("/index.php/tabel_squadController");
    }

    public function detail($id)
    {
        $data = [
            'tabel_squad' => $this->tabel_squad->find($id),
            'session' => $this->Session->get('role'),
            'roster' => $this->tabel_peserta->where('id_squad', $id)->find()
        ];
        // dd($data);
        
        return view('tabel_squad/detail', $data);
    }
}