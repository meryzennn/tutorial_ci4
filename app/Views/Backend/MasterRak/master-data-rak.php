<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Master Data Rak</li>
        </ol>
    </div><!--/.row-->				

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Master Data Rak
                        <a href="<?= base_url('admin/input-data-rak'); ?>"><button type="button" class="btn btn-sm btn-primary pull-right">Tambah Rak</button></a>
                    </h3>
                    <hr />
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">ID Rak</th>
                                <th data-sortable="true">Nama Rak</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_rak as $data) {
                            ?>
                            <tr>
                                <td data-sortable="true"><?= $no++; ?></td>
                                <td data-sortable="true"><?= $data['id_rak']; ?></td>
                                <td data-sortable="true"><?= $data['nama_rak']; ?></td>
                                <td data-sortable="true">
                                    <a href="<?= base_url('admin/edit-data-rak/' . $data['id_rak']); ?>"><button type="button" class="btn btn-sm btn-success">Edit</button></a>
                                    <a href="<?= base_url('admin/hapus-data-rak/' . $data['id_rak']); ?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
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