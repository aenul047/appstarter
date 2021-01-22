<?php

namespace App\Models;

use CodeIgniter\Model;

class tabel_pesertaModel extends Model
{
    protected $table      = "tabel_peserta";
    protected $primaryKey = "id";
    protected $allowedFields = ["id","id_squad","nama","in_game_name","id_game",];
}
