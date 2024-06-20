<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Buku</li>
            <li class="active">Edit Data Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Edit Buku</h3>
                    <hr />
                    <form action="<?= base_url('admin/update-data-buku');?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" value="<?= $data_edit['judul_buku'];?>" placeholder="Masukkan Judul Buku" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" value="<?= $data_edit['pengarang'];?>" placeholder="Masukkan Nama Pengarang" required="required">
                        </div>
                        <div style="clear:both;"></div>
                        
                        <div class="form-group col-md-6">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="<?= $data_edit['penerbit'];?>" placeholder="Masukkan Nama Penerbit" required="required">
                        </div>
                        <div style="clear:both;"></div>
                        
                        <div class="form-group col-md-6">
                            <label>Tahun</label>
                            <input type="number" class="form-control" name="tahun" value="<?= $data_edit['tahun'];?>" placeholder="Masukkan Tahun Terbit" required="required">
                        </div>
                        <div style="clear:both;"></div>
                        
                        <div class="form-group col-md-6">
                            <label>Jumlah Eksemplar</label>
                            <input type="number" class="form-control" name="jumlah_eksemplar" value="<?= $data_edit['jumlah_eksemplar'];?>" placeholder="Masukkan Jumlah Eksemplar" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="form-control" name="id_kategori" required="required">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row['id_kategori'] ?>" <?php if($row['id_kategori'] == $data_edit['id_kategori']) echo 'selected="selected"'; ?>>
                                        <?= $row['nama_kategori'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Rak</label>
                            <select class="form-control" name="id_rak" required="required">
                                <option value="">-- Pilih Rak --</option>
                                <?php foreach ($rak as $row) : ?>
                                    <option value="<?= $row['id_rak'] ?>" <?php if($row['id_rak'] == $data_edit['id_rak']) echo 'selected="selected"'; ?>>
                                        <?= $row['nama_rak'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan"><?= $data_edit['keterangan'];?></textarea>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
							<label>Cover Buku</label>
							<img src="/Assets/Cover_buku/<?php echo $data_edit['cover_buku'];?>" width="100%">
							<input type="file" class="form-control" name="cover_buku" value="<?php echo $data_edit['cover_buku'];?>">
							<em>Format file yang diizinkan : jpg, jpeg, png</em>
                        	<em>Maksimal ukuran 1 MB</em>
						</div>
						<div style="clear:both;"></div>

						<div class="form-group col-md-6">
							<label>E-Book</label>
							<iframe src="/Assets/E-book/<?php echo $data_edit['e_book'];?>" width="100%"> </iframe>
							<input type="file" class="form-control" name="e_book" value="<?php echo $data_edit['e_book'];?>">
							<em>Format file yang diizinkan : pdf</em>
                        	<em>Maksimal ukuran 10 MB</em>	
						</div>
						<div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url('admin/master-data-buku');?>" class="btn btn-danger">Batal</a>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->