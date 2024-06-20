<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Ifsnop\Mysqldump\Mysqldump;

class Backup extends BaseController
{

    public function backup()
    {
        if(session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == ""){
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $data = [
            'pages' => 'backup'
        ];

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Backup/backup', $data);
        echo view('Backend/Template/footer');
    }

    public function doBackup()
{
    try {
        $tglSkrg = date('dmy');
        $dump = new Mysqldump('mysql:host=localhost;dbname=perpustakaan_154b;port=3306', 'root', '');
        $dump->start('database/backup/db_perpus-' . $tglSkrg . '.sql');

        session()->setFlashdata('success', 'Backup database berhasil dibuat');

        return redirect()->back();
    } catch (\Exception $e) {

        session()->setFlashdata('error', 'Gagal membuat backup database: ' . $e->getMessage());

        return redirect()->back();
    }
}

    public function doRestore()
    {

        $db = \Config\Database::connect();

        try {

            $db->transBegin();

            $db->table('tbl_admin')->update(['is_delete_admin' => '0']);
            $db->table('tbl_anggota')->update(['is_delete_anggota' => '0']);
            $db->table('tbl_buku')->update(['is_delete_buku' => '0']);
            $db->table('tbl_kategori')->update(['is_delete_kategori' => '0']);
            $db->table('tbl_rak')->update(['is_delete_rak' => '0']);

            $db->transCommit();

            session()->setFlashdata('success', 'Semua data berhasil dipulihkan');

            return redirect()->back();
        } catch (\Exception $e) {

            $db->transRollback();

            session()->setFlashdata('error', 'Gagal memulihkan semua data');

            return redirect()->back();
        }
    }
}
