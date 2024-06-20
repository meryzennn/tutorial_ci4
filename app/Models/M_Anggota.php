<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Anggota extends Model
{
    protected $table = 'tbl_anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = [
        'id_anggota', 'nama_anggota', 'jenis_kelamin', 'no_tlp', 
        'email', 'password_anggota', 'alamat', 'is_delete_anggota', 
        'created_at', 'updated_at'
    ];

    public function getDataAnggota($conditions = [])
    {
        return $this->where($conditions)->findAll();
    }

    public function saveDataAnggota($data)
    {
        return $this->insert($data);
    }

    public function updateDataAnggota($data, $conditions)
    {
        return $this->where($conditions)->set($data)->update();
    }

    public function autoNumber()
    {
        $query = $this->db->query("SELECT MAX(id_anggota) as max_id FROM tbl_anggota");
        $hasil = $query->getRowArray();
        return $hasil;
    }
}
