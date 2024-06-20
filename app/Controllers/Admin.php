<?php

namespace App\Controllers;

use App\Models\M_Admin;

class Admin extends BaseController
{
    protected $helpers = ['form'];

    public function implementasi_forms()
    {
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;
        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Forms/forms');
        echo view('Backend/Template/footer');
    }

    public function post_form(){
        $rules = [
            'nim' => ['label' => 'NIM','rules' => 'required|max_length[8]|min_length[8]'],
            'nama' => ['label' => 'Nama Lengkap','rules' => 'required|max_length[100]'],
            'email'    => ['label' => 'Email Aktif','rules' => 'required|max_length[100]|valid_email'],
            'jekel' => ['label' => 'Jenis Kelamin','rules' => 'required'],
            'kode_cabang' => ['label' => 'Kode Cabang','rules' => 'required'],
            'kelas' => ['label' => 'Kelas','rules' => 'required|max_length[8]|min_length[8]'],
            'alamat' => ['label' => 'Alamat','rules' => 'required'],
        ];

        if (!$this->request->is('post')) {
            session()->set(['error_list' => validation_list_errors()]);
            session()->setFlashdata('error', 'Data Yang Anda Masukkan Salah');
            return redirect()->back();
        }
        elseif (!$this->validate($rules)) {
            session()->set(['error_list' => validation_list_errors()]);
            session()->setFlashdata('error', 'Data Yang Anda Masukkan Salah');
            return redirect()->back();
        }
        else {
            session()->remove('error_list');
            session()->set([
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'jekel' => $this->request->getPost('jekel'),
                'kode_cabang' => $this->request->getPost('kode_cabang'),
                'kelas' => $this->request->getPost('kelas'),
                'alamat' => $this->request->getPost('alamat'),
            ]);
            session()->setFlashdata('success', 'Data Yang Anda Masukkan Benar!');
            return redirect()->to(base_url('admin/form-sukses'));
        }
    }        

    public function form_sukses()
    {
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;
        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Latihan/form-sukses');
        echo view('Backend/Template/footer');
    }

    public function login()
    {
        //  echo password_hash("developer", PASSWORD_DEFAULT). "\n";
        return view('Backend/Login/login');
    }

    public function biodata()
    {
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Biodata/biodata');
        echo view('Backend/Template/footer');
    }

    public function autentikasi()
    {
        $modelAdmin = new M_Admin;
        
        $username = $this->request->getPost('username');
        $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username])->getNumRows();
        if($cekUsername == 0){
            session()->setFlashdata('error','Masukkan Username Dengan Benar!');
            ?>
            <script>
                history.go(-1);
            </script>
            <?php
        }
        else{
            $dataUser = $modelAdmin->getDataAdmin(['username_admin' => $username,'is_delete_admin' => '0'])->getRowArray();
            $password = $this->request->getPost('password');

            $verifikasi_password = password_verify($password, $dataUser['password_admin']);
            if(!$verifikasi_password){
                session()->setFlashdata('error','Masukkan Password Dengan Benar!');
            ?>
            <script>
                history.go(-1);
            </script>
            <?php
        }
            else{
                session()->setFlashData('success', 'Berhasil Login!');
                $dataSession = [
                    'ses_id' => $dataUser['id_admin'],
                    'ses_user' => $dataUser['nama_admin'],
                    'ses_level' => $dataUser['akses_level']
                ];
                session()->set($dataSession);
                ?>
                <script>
                    document.location = "<?= base_url('admin/dashboard');?>";
                </script>
                <?php        
    }
}
    }

    public function logout(){
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
            session()->remove('ses_id');
            session()->remove('ses_user');
            session()->remove('ses_level');
            session()->setFlashdata('info','Anda Telah Logout!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
    }

    public function master_data_admin()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
            $modelAdmin = new M_Admin;

        $uri = service('uri');
        $pages = 'admin';
        $dataUser = $modelAdmin->getDataAdmin(['is_delete_admin' => '0'])->getResultArray();

        $kirimData['pages'] = $pages;
        $kirimData['data_user'] = $dataUser;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/MasterAdmin/master-data-admin',$kirimData);
        echo view('Backend/Template/footer');
    }
    }

    public function input_data_admin()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = 'admin';
        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header',$kirimData);
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/MasterAdmin/input-admin',$kirimData);
        echo view('Backend/Template/footer',$kirimData);
    }
}

    public function simpan_data_admin(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error','Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
            $modelAdmin = new M_Admin;

            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');

            $cekUname = $modelAdmin->getDataAdmin(['username_admin' => $username])->getNumRows();
            if($cekUname > 0){
                session()->setFlashdata('error','Username sudah digunakan!!');
                ?>
                <script>
                    history.go(-1);
                </script>
                <?php
            }
            else{
                $hasil = $modelAdmin->autoNumber()->getRowArray();
                if(!$hasil){
                    $id = "ADM001";
                }
                else{
                    $kode = $hasil['id_admin'];
                    $noUrut = (int) substr($kode, -3);
                    $noUrut++;
                    $id = "ADM".sprintf("%03s", $noUrut);
                }

                $dataSimpan = [
                    'id_admin' => $id,
                    'nama_admin' => $nama,
                    'username_admin' => $username,
                    'password_admin' => password_hash('pass_admin', PASSWORD_DEFAULT),
                    'akses_level' => $level,
                    'is_delete_admin' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $modelAdmin->saveDataAdmin($dataSimpan);
                session()->setFlashdata('success', 'Data Admin Berhasil Ditambahkan!!');
                ?>
                <script>
                    document.location = "<?= base_url('admin/master-data-admin');?>";
                </script>
                <?php
            }

        }
    }

    public function edit_data_admin(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error','Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/master-data-admin');?>";
            </script>
            <?php
        }
        else{
            $modelAdmin = new M_Admin;

            $uri = service('uri');
            $pages = 'admin';
            $idEdit = $uri->getSegment(3);
            $dataEdit = $modelAdmin->getDataAdmin(['is_delete_admin' => '0', 'sha1(id_admin)' => $idEdit])->getRowArray();

            session()->set(['idUpdate' => $dataEdit['id_admin']]);
            $data['pages'] = $pages;
            $data['data_edit'] = $dataEdit;
            
            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterAdmin/edit-admin', $data);
            echo view('Backend/Template/footer', $data);
        }
    }

    public function update_data_admin($id)
{
    if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
        session()->setFlashdata('error','Silakan login terlebih dahulu!');
        return redirect()->to(base_url('admin/master-data-admin'));
    }
    else {
        $modelAdmin = new M_Admin;

        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');

        $dataSimpan = [
            'nama_admin' => $nama,
            'akses_level' => $level,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $modelAdmin->updateDataAdmin($dataSimpan, ['id_admin' => $id]);
        session()->setFlashdata('success', 'Data Admin Berhasil Diperbarui!!');
        return redirect()->to(base_url('admin/master-data-admin'));
    }
}

    public function hapus_data_admin(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error','Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/l');?>";
            </script>
            <?php
        }
        else{
            $modelAdmin = new M_Admin;

            $uri = service('uri');
            $idHapus = $uri->getSegment(3);

            $dataSimpan = [
                'is_delete_admin' => "1",
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $modelAdmin->updateDataAdmin($dataSimpan, ['sha1(id_admin)' => $idHapus]);
            session()->setFlashdata('success', 'Data Admin Berhasil Dihapus!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/master-data-admin');?>";
            </script>
            <?php
        }
    }


    public function dashboard()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Dashboard/dashboard');
        echo view('Backend/Template/footer');
    }

    }
    public function widgets()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData); 
        echo view('Backend/Widgets/widgets');
        echo view('Backend/Template/footer');
    }
    }
    public function charts()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Charts/charts');
        echo view('Backend/Template/footer');
    }
    }
    public function tables()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Tables/tables');
        echo view('Backend/Template/footer');
    }
}
    public function forms()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Forms/forms');
        echo view('Backend/Template/footer');
    }
    }
    public function panels()
    {
        if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == ""){
            session()->setFlashdata('error','Silahkan Login Terlebih Dahulu!!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin');?>";
            </script>
            <?php
        }
        else{
        $uri = service('uri');
        $pages = $uri->getSegment(2);

        $kirimData['pages'] = $pages;

        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar',$kirimData);
        echo view('Backend/Panels/panels');
        echo view('Backend/Template/footer');
    }
}
    public function hitung()
    {
        $uri = service('uri');

        $parameter1 = $uri->getSegment(3);
        $parameter2 = $uri->getSegment(4);

        $hasilJumlah = $parameter1+$parameter2;
        $hasilKurang = $parameter1-$parameter2;
        $hasilKali = $parameter1*$parameter2;
        $hasilBagi = $parameter1/$parameter2;

        $kirimData ['prmtr1'] = $parameter1;
        $kirimData ['prmtr2'] = $parameter2;
        $kirimData ['Jumlah'] = $hasilJumlah;
        $kirimData ['Kurang'] = $hasilKurang;
        $kirimData ['Kali'] = $hasilKali;
        $kirimData ['Bagi'] = $hasilBagi;

        echo view('Backend/Latihan/dashboard-hitung',$kirimData);

    }
    public function banding()
    {
        $uri = service('uri');

        $parameter1 = $uri->getSegment(3);
        $parameter2 = $uri->getSegment(4);

        $hasilsamadengan = $parameter1==$parameter2;
        $hasilTidaksamadengan = $parameter1!=$parameter2;
        $hasilLebihbesar = $parameter1>$parameter2;
        $hasilLebihbesaratausamadengan = $parameter1>=$parameter2;
        $hasilLebihkecil = $parameter1<$parameter2;
        $hasilLebihkecilatausamadengan = $parameter1<=$parameter2;

        $kirimData ['prmtr1'] = $parameter1;
        $kirimData ['prmtr2'] = $parameter2;
        $kirimData ['sama'] = $hasilsamadengan;
        $kirimData ['tidaksama'] = $hasilTidaksamadengan;
        $kirimData ['lebih'] = $hasilLebihbesar;
        $kirimData ['lebihsama'] = $hasilLebihbesaratausamadengan;
        $kirimData ['kecil'] = $hasilLebihkecil;
        $kirimData ['kecilsama'] = $hasilLebihkecilatausamadengan;

        echo view('Backend/Latihan/dashboard-banding',$kirimData);

    }
}