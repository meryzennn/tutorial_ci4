<?php

namespace App\Controllers;

use App\Models\M_Rak;

class Rak extends BaseController
{
    public function master_data_rak()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelRak = new M_Rak();
        $dataRak = $modelRak->getDataRak(['is_delete_rak' => '0']);

        $data = [
            'pages' => 'rak',
            'data_rak' => $dataRak
        ];

        return view('Backend/Template/header', $data) .
               view('Backend/Template/sidebar', $data) .
               view('Backend/MasterRak/master-data-rak', $data) .
               view('Backend/Template/footer');
    }

    public function input_data_rak()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $data = [
            'pages' => 'rak'
        ];

        return view('Backend/Template/header', $data) .
               view('Backend/Template/sidebar', $data) .
               view('Backend/MasterRak/input-rak', $data) .
               view('Backend/Template/footer');
    }

    public function simpan_data_rak()
{
    if(session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == ""){
        session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
        return redirect()->to(base_url('admin/login-admin'));
    }

    $modelRak = new M_Rak();

    $hasil = $modelRak->autoNumber();
    if (!$hasil) {
        $id_rak = "RAK001";
    } else {
        $kode = $hasil['max_id'];
        $noUrut = (int)substr($kode, -3);
        $noUrut++;
        $id_rak = "RAK" . sprintf("%03s", $noUrut);
    }

    $nama_rak = $this->request->getPost('nama_rak');

    $data = [
        'id_rak' => $id_rak,
        'nama_rak' => $nama_rak,
        'is_delete_rak' => '0',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    $modelRak->saveDataRak($data);
    session()->setFlashdata('success', 'Data Rak Berhasil Ditambahkan!!');
    return redirect()->to(base_url('admin/master-data-rak'));
}

    public function edit_data_rak($id)
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelRak = new M_Rak();
        $dataRak = $modelRak->find($id);

        $data = [
            'pages' => 'rak',
            'data_rak' => $dataRak
        ];

        return view('Backend/Template/header', $data) .
               view('Backend/Template/sidebar', $data) .
               view('Backend/MasterRak/edit-rak', $data) .
               view('Backend/Template/footer');
    }

    public function update_data_rak()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelRak = new M_Rak();

        $id_rak = $this->request->getPost('id_rak');
        $nama_rak = $this->request->getPost('nama_rak');

        $data = [
            'nama_rak' => $nama_rak,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $modelRak->updateDataRak($data, ['id_rak' => $id_rak]);
        session()->setFlashdata('success', 'Data Rak Berhasil Diperbarui!!');
        return redirect()->to(base_url('admin/master-data-rak'));
    }

    public function hapus_data_rak($id)
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        }

        $modelRak = new M_Rak();

        $data = [
            'is_delete_rak' => '1',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $modelRak->updateDataRak($data, ['id_rak' => $id]);
        session()->setFlashdata('success', 'Data Rak Berhasil Dihapus!!');
        return redirect()->to(base_url('admin/master-data-rak'));
    }
}
       
