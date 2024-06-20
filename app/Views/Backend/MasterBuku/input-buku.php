<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Buku</li>
            <li class="active">Tambah Data Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Tambah Buku</h3>
                    <hr />
                    <form action="<?= base_url('admin/simpan-data-buku');?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Nama Pengarang" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tahun</label>
                            <input type="number" class="form-control" name="tahun" placeholder="Masukkan Tahun Terbit" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jumlah Eksemplar</label>
                            <input type="number" class="form-control" name="jumlah_eksemplar" placeholder="Masukkan Jumlah Eksemplar" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="form-control" name="id_kategori" required="required">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Rak</label>
                            <select class="form-control" name="id_rak" required="required">
                                <option value="">-- Pilih Rak --</option>
                                <?php foreach ($rak as $row) : ?>
                                    <option value="<?= $row['id_rak'] ?>"><?= $row['nama_rak'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                        <label>Cover Buku</label>
                        <input type="file" class="form-control" name="cover_buku" required="required">
                        <em>Format file yang diizinkan : jpg, jpeg, png</em>
                        <em>Maksimal ukuran 1 MB</em>
                    </div>
                    <div style="clear:both;"></div>

                    <div class="form-group col-md-6">
                        <label>E-Book</label>
                        <input type="file" class="form-control" name="e_book" required="required">
                        <em>Format file yang diizinkan : pdf</em>
                        <em>Maksimal ukuran 10 MB</em>
                    </div>
                    <div style="clear:both;"></div>

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