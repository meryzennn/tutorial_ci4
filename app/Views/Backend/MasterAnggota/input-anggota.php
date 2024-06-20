<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Anggota</li>
            <li class="active">Tambah Data Anggota</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Tambah Anggota</h3>
                    <hr />
                    <form method="post" action="<?= base_url('admin/simpan-data-anggota'); ?>">
                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" name="nama_anggota" class="form-control" id="nama_anggota" placeholder="Masukkan Nama Anggota" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                            <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">Nomor Telepon</label>
                            <input type="text" name="no_tlp" class="form-control" id="no_tlp" placeholder="Masukkan Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password_anggota">Password</label>
                            <input type="password" name="password_anggota" class="form-control" id="password_anggota" placeholder="Masukkan Password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->