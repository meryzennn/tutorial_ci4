<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Buku extends Model
{
    protected $table = 'tbl_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = [
        'id_buku', 'judul_buku', 'pengarang', 'penerbit', 'tahun',
        'jumlah_eksemplar', 'id_kategori', 'keterangan', 'id_rak',
        'cover_buku', 'e_book', 'is_delete_buku', 'created_at', 'updated_at'
    ];

    public function getDataBuku($where = [])
    {
        return $this->where($where)->get();
    }

    public function getDataBukuJoin($where = [])
    {
    
        return $this->select('tbl_buku.*, tbl_kategori.nama_kategori, tbl_rak.nama_rak')
                    ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
                    ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak')
                    ->where($where)
                    ->findAll();
    }

    public function saveDataBuku($data)
    {
        return $this->insert($data);
    }

    public function updateDataBuku($data, $where)
    {
        return $this->where($where)->set($data)->update();
    }

    public function autoNumber()
    {
        return $this->select('id_buku')->orderBy('id_buku', 'DESC')->limit(1)->get();
    }
}
?>
