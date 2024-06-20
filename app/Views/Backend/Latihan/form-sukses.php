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
				<div class="form-group col-md-6">
						<label>NIM</label>
						<br /><?= session()->get('nim'); ?>
					</div>
													
					<div class="form-group col-md-6">
						<label>Nama Lengkap</label>
						<br /><?= session()->get('nama'); ?>
					</div>
					<div style="clear:both;"></div>

					<div class="form-group col-md-6">
						<label>Email Aktif</label>
						<br /><?= session()->get('email'); ?>
					</div>
					
					<div class="form-group col-md-6">
						<label>Jenis Kelamin</label>
						<br /><?= session()->get('jekel'); ?>
					</div>
					<div style="clear:both;"></div>
					
					<div class="form-group col-md-6">
						<label>Kode Cabang</label>
						<?php
						if(session()->get('kode_cabang') == "01"){
							echo "<br />".session()->get('kode_cabang')." - Kampus Margonda";
						}
						elseif(session()->get('kode_cabang') == "02"){
							echo "<br />".session()->get('kode_cabang')." - Kampus Fatmawati";
						}
						elseif(session()->get('kode_cabang') == "03"){
							echo "<br />".session()->get('kode_cabang')." - Kampus Tangerang";
						}
						elseif(session()->get('kode_cabang') == "04"){
							echo "<br />".session()->get('kode_cabang')." - Kampus Bekasi";
						}
						?>
					</div>

					<div class="form-group col-md-6">
						<label>Kelas</label>
						<br /><?= session()->get('kelas'); ?>
					</div>
					<div style="clear:both;"></div>

					<div class="form-group col-md-12">
						<label>Alamat</label>
						<br /><?= session()->get('alamat'); ?>
					</div>
					<div style="clear:both;"></div>

					<div class="form-group col-md-12">
						<a href="<?= base_url('admin/forms');?>"><button class="btn btn-primary" type="button">Kembali</button></a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	
</div><!--/.main-->