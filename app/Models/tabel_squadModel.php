<?php

namespace App\Models;

use CodeIgniter\Model;

class tabel_squadModel extends Model
{
    protected $table      = "tabel_squad";
    protected $primaryKey = "id";
    protected $allowedFields = ["id","id_event","nama_squad","ketua","contact_person","status_pembayaran",];

    public function getSquad($id)
    {
        return $this->db->table('tabel_squad')
        ->join('tabel_peserta','tabel_peserta.id_squad=tabel_squad.id')
         ->where('tabel_squad.id', $id)
         ->get()->getResultArray();
    }
    public function getSquadbyevent($id)
    {
        return $this->db->table('tabel_squad')
        ->join('event','event.id_event=tabel_squad.id_event')
         ->where('event.id_komunitas', $id)
         ->get()->getResultArray();
    }
    public function getEvent($id, $id_event)
    {
        return $this->db->table('tabel_squad')
        ->join('event','event.id_event=tabel_squad.id_event')
         ->where('event.id_event', $id_event)
         ->where('tabel_squad.id', $id)
         ->get()->getResultArray();
    }


}

