<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Master Data Anggota</li>
        </ol>
    </div><!--/.row-->				

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3>Master Data Anggota
                        <a href="<?= base_url('admin/input-data-anggota'); ?>">
                            <button type="button" class="btn btn-sm btn-primary pull-right">Tambah Anggota</button>
                        </a>
                    </h3>
                    <hr />
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">ID Anggota</th>
                                <th data-sortable="true">Nama Anggota</th>
                                <th data-sortable="true">Jenis Kelamin</th>
                                <th data-sortable="true">Nomor Telepon</th>
                                <th data-sortable="true">Alamat</th>
                                <th data-sortable="true">Email</th>
                                <th data-sortable="true">Password</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_anggota as $anggota) {
                            ?>
                            <tr>
                                <td data-sortable="true"><?= $no++; ?></td>
                                <td data-sortable="true"><?= $anggota['id_anggota']; ?></td>
                                <td data-sortable="true"><?= $anggota['nama_anggota']; ?></td>
                                <td data-sortable="true"><?= ($anggota['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                                <td data-sortable="true"><?= $anggota['no_tlp']; ?></td>
                                <td data-sortable="true"><?= $anggota['alamat']; ?></td>
                                <td data-sortable="true"><?= $anggota['email']; ?></td>
                                <td data-sortable="true"><?= $anggota['password_anggota']; ?></td>
                                <td data-sortable="true">
                                    <a href="<?= base_url('admin/edit-data-anggota/' . $anggota['id_anggota']); ?>">
                                        <button type="button" class="btn btn-sm btn-success">Edit</button>
                                    </a>
                                    <a href="<?= base_url('admin/hapus-anggota/' . $anggota['id_anggota']); ?>">
                                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                    </a>
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