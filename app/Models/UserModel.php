<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["id","nama","image","komunitas","email","password","contact","tgl","hak_akses",];
}
