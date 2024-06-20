<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
			<li class="active">Master Data Buku</li>
		</ol>
	</div><!--/.row-->				
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Master Data Buku
						<a href="<?= base_url('admin/input-data-buku'); ?>"><button type="button" class="btn btn-sm btn-primary pull-right">Tambah Buku</button></a>
					</h3>
					<hr />
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					    <thead>
							<tr>
								<th data-sortable="true">No</th>
								<th data-sortable="true">Judul Buku</th>
								<th data-sortable="true">Pengarang</th>
								<th data-sortable="true">Penerbit</th>
								<th data-sortable="true">Tahun</th>
								<th data-sortable="true">Jumlah Eksemplar</th>
								<th data-sortable="true">Kategori Buku</th>
								<th data-sortable="true">Rak</th>
								<th data-sortable="true">Keterangan</th>
								<th data-sortable="true">Cover Buku</th>
								<th data-sortable="true">E-Book</th>
								<th data-sortable="true">Opsi</th>
							</tr>
					    </thead>
						<tbody>
							<?php
							$no = 0;
							foreach($data_buku as $data){
							?>
							<tr>
								<td data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-sortable="true"><?php echo $data['judul_buku'];?></td>
								<td data-sortable="true"><?php echo $data['pengarang'];?></td>
								<td data-sortable="true"><?php echo $data['penerbit'];?></td>
								<td data-sortable="true"><?php echo $data['tahun'];?></td>
								<td data-sortable="true"><?php echo $data['jumlah_eksemplar'];?></td>
								<td data-sortable="true"><?php echo $data['nama_kategori'];?></td>
								<td data-sortable="true"><?php echo $data['nama_rak'];?></td>
								<td data-sortable="true"><?php echo $data['keterangan'];?></td>
								<td data-sortable="true">
									<?php if ($data['cover_buku']): ?>
										<a href="/Assets/Cover_buku/<?php echo $data['cover_buku'];?>" target="_blank">
											<img src="/Assets/Cover_buku/<?php echo $data['cover_buku'];?>" alt="Cover Buku" class="cover-image">
										</a>
									<?php else: ?>
										Tidak ada cover
									<?php endif; ?>
								</td>
								<td data-sortable="true">
									<?php if ($data['e_book']): ?>
										<a href="/Assets/E-book/<?php echo $data['e_book'];?>" target="_blank">Lihat E-Book</a>
									<?php else: ?>
										Tidak ada e-book
									<?php endif; ?>
								</td>
								<td data-sortable="true">
									<a href="<?= base_url('admin/edit-data-buku/' . sha1($data['id_buku'])); ?>"><button type="button" class="btn btn-sm btn-success">Edit</button></a>
									<a href="#" onclick="doDelete('<?= sha1($data['id_buku']); ?>')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->		
</div><!--/.main-->

<script type="text/javascript">
	function doDelete(idDelete) {
		swal({
			title: "Hapus Data Buku?",
			text: "Data ini akan terhapus secara permanen!!",
			icon: "warning",
			buttons: true,
			dangerMode: false,
		})
		.then(ok => {
			if (ok) {
				window.location.href = '<?= base_url(); ?>/admin/hapus-data-buku/' + idDelete;
			} else {
				$(this).removeAttr('disabled');
			}
		});
	}
</script>

<style>
    .cover-image {
        width: 100px;
        height: auto;
        max-width: 100%;
    }
</style>
