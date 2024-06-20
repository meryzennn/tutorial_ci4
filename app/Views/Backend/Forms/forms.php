<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Biodata</li>
        </ol>
</div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">Biodata</div>
                <div class="panel-body">

                    <form role="form" method="post" action="<?= base_url('admin/post-form');?>">
						<div class="form-group col-md-6">
							<label>NIM</label>
							<input type="text" class="form-control" placeholder="Masukkan NIM Anda" name="nim" id="nim" onKeyPRess="return goodchars(event, '1234567890', this)" required maxlength="8">
						</div>
														
						<div class="form-group col-md-6">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Anda" name="nama" onKeyPress="return goodcharts(event, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ\'-',this)" required maxlength="50">
						</div>
						<div style="clear:both;"></div>

						<div class="form-group col-md-6">
							<label>Email Aktif</label>
							<input type="email" class="form-control" placeholder="Masukkan Email Aktif Anda" name="email" required maxlength="50">
						</div>
						
						<div class="form-group col-md-6">
							<label>Jenis Kelamin</label>
							<br /><input type="radio" name="jekel" value="Laki-laki"> <checked>Laki-laki</cheked>
							&nbsp;<input type="radio" name="jekel" value="Perempuan"> Perempuan
						</div>
						<div style="clear:both;"></div>
						
						<div class="form-group col-md-6">
							<label>Kode Cabang</label>
							<select class="form-control" name="kode_cabang">
								<option value="">----</option>
								<option value="01">Kampus Margonda</option>
								<option value="02">Kampus Fatmawati</option>
								<option value="03">Kampus Tangerang</option>
								<option value="04">Kampus Bekasi</option>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Kelas</label>
							<input type="text" class="form-control" placeholder="Masukkan Kelas Anda" name="kelas">
						</div>
						<div style="clear:both;"></div>

						<div class="form-group col-md-12">
							<label>Alamat</label>
							<textarea class="form-control" placeholder="Masukkan Alamat Anda" name="alamat" rows="5"></textarea>
						</div>
						<div style="clear:both;"></div>

						<div class="form-group col-md-12">
							<button class="btn btn-primary" type="submit">Submit</button>
							<button class="btn btn-warning" type="reset">Reset</button>
						</div>
						<div style="clear:both;"></div>
					</form>
                </div>
            </div>
        </div><!--/.col-->
    </div><!--/.row -->

</div><!--/.main-->