<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Backup</li>
        </ol>
    </div><!--/.row-->				

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Backup Data</h3>
                    <hr />
                    <p>Di sini Anda dapat melakukan backup data.</p>
                    <a href="<?= base_url('admin/backup/doBackup'); ?>"><button type="button" class="btn btn-sm btn-primary">Backup Data</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Restore Data</h3>
                    <hr />
                    <p>Di sini Anda dapat melakukan restore data.</p>
                    <a href="<?= base_url('admin/backup/doRestore'); ?>"><button type="button" class="btn btn-sm btn-primary">Restore Data</button></a>
                </div>
            </div>
        </div>
    </div><!--/.row-->		
</div><!--/.main-->
