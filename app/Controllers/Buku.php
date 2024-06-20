<?php

namespace App\Controllers;

use App\Models\M_Buku;
use App\Models\M_Kategori;
use App\Models\M_Rak;

class Buku extends BaseController
{
    public function master_data_buku()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
            return redirect()->to(base_url('admin/login-admin'));
        } else {
            $modelBuku = new M_Buku();

            $uri = service('uri');
            $pages = $uri->getSegment(2);
            $dataBuku = $modelBuku->getDataBukuJoin(['is_delete_buku' => '0']);

            $kirimData['pages'] = 'buku'; // Menetapkan nilai pages untuk sidebar
            $kirimData['data_buku'] = $dataBuku;

            return view('Backend/Template/header', $kirimData) .
                   view('Backend/Template/sidebar', $kirimData) .
                   view('Backend/MasterBuku/master-data-buku', $kirimData) .
                   view('Backend/Template/footer');
        }
    }

    public function input_data_buku()
{
    if(session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == ""){
        session()->setFlashdata('error', 'Silahkan Login Terlebih Dahulu!!');
        return redirect()->to(base_url('admin/login-admin'));
    }

    $modelKategori = new M_Kategori();
    $kategori = $modelKategori->findAll();
     
    $modelRak = new M_Rak();
    $rak = $modelRak->findAll(); 

    $data = [
        'pages' => 'buku',
        'kategori' => $kategori,
        'rak' => $rak
    ];

    echo view('Backend/Template/header', $data);
    echo view('Backend/Template/sidebar', $data);
    echo view('Backend/MasterBuku/input-buku', $data);
    echo view('Backend/Template/footer', $data);
}

    public function simpan_data_buku()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            echo '<script>document.location = "' . base_url('admin/login-admin') . '";</script>';
        } else {
            $modelBuku = new M_Buku();

            $judul = $this->request->getPost('judul_buku');
            $pengarang = $this->request->getPost('pengarang');
            $penerbit = $this->request->getPost('penerbit');
            $tahun = $this->request->getPost('tahun');
            $jumlah = $this->request->getPost('jumlah_eksemplar');
            $kategori = $this->request->getPost('id_kategori');
            $keterangan = $this->request->getPost('keterangan');
            $rak = $this->request->getPost('id_rak');
            $cover = $this->request->getPost('cover_buku');
            $ebook = $this->request->getPost('e_book');

            $hasil = $modelBuku->autoNumber()->getRowArray();
            if (!$hasil) {
                $id = "BUK001";
            } else {
                $kode = $hasil['id_buku'];
                $noUrut = (int)substr($kode, -3);
                $noUrut++;
                $id = "BUK" . sprintf("%03s", $noUrut);
            }

            $dataSimpan = [
                'id_buku' => $id,
                'judul_buku' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahun,
                'jumlah_eksemplar' => $jumlah,
                'id_kategori' => $kategori,
                'keterangan' => $keterangan,
                'id_rak' => $rak,
                'cover_buku' => $cover,
                'e_book' => $ebook,
                'is_delete_buku' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $modelBuku->saveDataBuku($dataSimpan);
            session()->setFlashdata('success', 'Data Buku Berhasil Ditambahkan!!');
            echo '<script>document.location = "' . base_url('admin/master-data-buku') . '";</script>';
        }
    }

    public function edit_data_buku()
{
    if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
        session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
        return redirect()->to(base_url('admin/master-data-buku'));
    } else {
        $modelBuku = new M_Buku();

        $uri = service('uri');
        $idEdit = $uri->getSegment(3);

        $dataEdit = $modelBuku->getDataBuku(['is_delete_buku' => '0', 'sha1(id_buku)' => $idEdit])->getRowArray();

        session()->set(['idUpdate' => $dataEdit['id_buku']]);

        $modelKategori = new M_Kategori();
        $kategori = $modelKategori->findAll();

        $modelRak = new M_Rak();
        $rak = $modelRak->findAll();

        $data = [
            'kategori' => $kategori,
            'rak' => $rak,
            'pages' => 'buku',
            'data_edit' => $dataEdit,
        ];

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterBuku/edit-buku', $data);
        echo view('Backend/Template/footer', $data);
    }
}

    public function update_data_buku()
{
    if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
        session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
        return redirect()->to(base_url('admin/master-data-buku'));
    } else {
        $modelBuku = new M_Buku();

        $judul = $this->request->getPost('judul_buku');
        $pengarang = $this->request->getPost('pengarang');
        $penerbit = $this->request->getPost('penerbit');
        $tahun = $this->request->getPost('tahun');
        $jumlah = $this->request->getPost('jumlah_eksemplar');
        $kategori = $this->request->getPost('id_kategori');
        $keterangan = $this->request->getPost('keterangan');
        $rak = $this->request->getPost('id_rak');
        $idUpdate = session()->get('idUpdate');

        if ($this->request->getFile('cover_buku')) {
            $cover = $this->request->getFile('cover_buku');
            if (!$cover->isValid()) {
                session()->setFlashdata('error', 'File cover buku tidak valid.');
                return redirect()->back();
            }
            if (!$cover->hasMoved()) {
                $newCoverName = 'Cover-Buku-' . date('YmdHis') . '.' . $cover->getExtension();
                $cover->move(ROOTPATH . 'public/Assets/Cover_buku', $newCoverName);
            }
        } else {
            $cover = $this->request->getPost('cover_buku');
        }

        if ($this->request->getFile('e_book')) {
            $ebook = $this->request->getFile('e_book');
            if (!$ebook->isValid()) {
                session()->setFlashdata('error', 'File e-book tidak valid.');
                return redirect()->back();
            }
            if (!$ebook->hasMoved()) {
                $newEbookName = 'E-Book-' . date('YmdHis') . '.' . $ebook->getExtension();
                $ebook->move(ROOTPATH . 'public/Assets/E-book', $newEbookName);
            }
        } else {
            $ebook = $this->request->getPost('e_book');
        }

        $dataSimpan = [
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun' => $tahun,
            'jumlah_eksemplar' => $jumlah,
            'id_kategori' => $kategori,
            'keterangan' => $keterangan,
            'id_rak' => $rak,
            'cover_buku' => $cover,
            'e_book' => $ebook,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $modelBuku->updateDataBuku($dataSimpan, ['id_buku' => $idUpdate]);
        session()->remove('idUpdate');
        session()->setFlashdata('success', 'Data Buku Berhasil Diperbarui!!');
        return redirect()->to(base_url('admin/master-data-buku'));
    }
}

    public function hapus_data_buku()
    {
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            echo '<script>document.location = "' . base_url('admin/login-admin') . '";</script>';
        } else {
            $modelBuku = new M_Buku(); // inisiasi

            $uri = service('uri');
            $idHapus = $uri->getSegment(3);

            $dataSimpan = [
                'is_delete_buku' => "1",
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $modelBuku->updateDataBuku($dataSimpan, ['sha1(id_buku)' => $idHapus]);
            session()->setFlashdata('success', 'Data Buku Berhasil Dihapus!!');
            echo '<script>document.location = "' . base_url('admin/master-data-buku') . '";</script>';
        }
    }
}
?>
