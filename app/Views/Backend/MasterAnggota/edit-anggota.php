<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Anggota</li>
            <li class="active">Edit Data Anggota</li>
        </ol>
    </div><!--/.row-->				

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Edit Anggota</h3>
                    <hr />
                    <form action="<?= base_url('admin/update-data-anggota'); ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>ID Anggota</label>
                            <input type="text" class="form-control" name="id_anggota" value="<?= $data_anggota['id_anggota']; ?>" readonly>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" value="<?= $data_anggota['nama_anggota']; ?>" placeholder="Masukkan Nama Anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" required="required">
                            <option value="" disabled <?= empty($data_anggota['jenis_kelamin']) ? 'selected' : ''; ?>>-- Pilih Jenis Kelamin --</option>
                                <option value="L" <?= ($data_anggota['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?= ($data_anggota['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_tlp" value="<?= $data_anggota['no_tlp']; ?>" placeholder="Masukkan Nomor Telepon" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required="required"><?= $data_anggota['alamat']; ?></textarea>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $data_anggota['email']; ?>" placeholder="Masukkan Email" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                             <label>Password</label>
                             <input type="password" class="form-control" name="password_anggota" placeholder="Masukkan Password" value="<?= $data_anggota['password_anggota']; ?>">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url('admin/master-data-anggota'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->