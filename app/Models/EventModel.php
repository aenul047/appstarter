<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table      = "Event";
    protected $primaryKey = "id_event";
    protected $allowedFields = ["id_event","id_komunitas","nama_event","image_event","registrasi_slot","hadiah","estimasi_waktu","tanggal_mulai","tanggal_selesei","tempat","status","keterangan",];

    public function getEvent()
    {
        return $this->db->table('Event')
         ->join('user','user.id=event.id_komunitas')
         ->get()->getResultArray();
    }

    public function getWhere($id)
    {
        return $this->db->table('Event')
         ->join('user','user.id=event.id_komunitas')
         ->where('id_event', $id)
         ->get()->getResultArray();
    }
    
    public function detail_event($id)
    {
        return $this->db->table('Event')
         ->join('user','user.id=event.id_komunitas')
        //  ->join('tabel_squad','tabel_squad.id_event=event.id_event')
         ->where('event.id_event', $id)
         ->get()->getResultArray();
    }
    public function getEventUser($id)
    {
        return $this->db->table('Event')
         ->join('user','user.id=event.id_komunitas')
         ->where('event.id_komunitas', $id)
         ->get()->getResultArray();
    }

    public function findEvent()
    {
        return $this->db->table('Event')
        ->select('nama_event, tanggal_mulai, tanggal_selesei')
         ->get()->getResultArray();
    }
}