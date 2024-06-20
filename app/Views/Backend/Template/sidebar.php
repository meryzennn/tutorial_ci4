<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <!-- Menu Dashboard -->
        <li class="<?= ($pages == 'dashboard') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/dashboard'); ?>">
                <span class="glyphicon glyphicon-dashboard"></span> Dashboard
            </a>
        </li>
        <!-- Menu Master Data Admin -->
        <li class="parent <?= ($pages == 'admin') ? 'active' : ''; ?>">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Master Data Admin 
                <span data-toggle="collapse" href="#sub-item-admin" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-admin">
                <li>
                    <a class="" href="<?= base_url('admin/master-data-admin');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Data Admin
                    </a>
                </li>
                <li>
                    <a class="" href="<?= base_url('admin/input-data-admin');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Input Admin
                    </a>
                </li>
            </ul>
        </li>
        <!-- Menu Master Data Anggota -->
        <li class="parent <?= ($pages == 'anggota') ? 'active' : ''; ?>">
            <a href="#">
                <span class="glyphicon glyphicon-user"></span> Master Data Anggota
                <span data-toggle="collapse" href="#sub-item-anggota" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-anggota">
                <li>
                    <a class="" href="<?= base_url('admin/master-data-anggota'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Data Anggota
                    </a>
                </li>
                <li>
                    <a class="" href="<?= base_url('admin/input-data-anggota'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Input Anggota
                    </a>
                </li>
            </ul>
        </li>
        <!-- Menu Master Data Buku -->
        <li class="parent <?= ($pages == 'buku') ? 'active' : ''; ?>">
            <a href="#">
                <span class="glyphicon glyphicon-book"></span> Master Data Buku 
                <span data-toggle="collapse" href="#sub-item-buku" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-buku">
                <li>
                    <a class="" href="<?= base_url('admin/master-data-buku'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Data Buku
                    </a>
                </li>
                <li>
                    <a class="" href="<?= base_url('admin/input-data-buku'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Input Buku
                    </a>
                </li>
            </ul>
        </li>
        <!-- Menu Master Data Kategori -->
        <li class="parent <?= ($pages == 'kategori') ? 'active' : ''; ?>">
            <a href="#">
                <span class="glyphicon glyphicon-tags"></span> Master Data Kategori 
                <span data-toggle="collapse" href="#sub-item-kategori" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-kategori">
                <li>
                    <a class="" href="<?= base_url('admin/master-data-kategori'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Data Kategori
                    </a>
                </li>
                <li>
                    <a class="" href="<?= base_url('admin/input-data-kategori'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Input Kategori
                    </a>
                </li>
            </ul>
        </li>
        <!-- Menu Master Data Rak -->
        <li class="parent <?= ($pages == 'rak') ? 'active' : ''; ?>">
            <a href="#">
                <span class="glyphicon glyphicon-inbox"></span> Master Data Rak 
                <span data-toggle="collapse" href="#sub-item-rak" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-rak">
                <li>
                    <a class="" href="<?= base_url('admin/master-data-rak'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Data Rak
                    </a>
                </li>
                <li>
                    <a class="" href="<?= base_url('admin/input-data-rak'); ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Input Rak
                    </a>
                </li>
            </ul>
        </li>
        <!-- Menu Backup -->
        <li class="<?= ($pages == 'backup') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/backup'); ?>">
                <span class="glyphicon glyphicon-save"></span> Backup
            </a>
        </li>
        <!-- Menu Widgets -->
        <li class="<?= ($pages == 'widgets') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/widgets'); ?>">
                <span class="glyphicon glyphicon-th"></span> Widgets
            </a>
        </li>
        <!-- Menu Charts -->
        <li class="<?= ($pages == 'charts') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/charts'); ?>">
                <span class="glyphicon glyphicon-stats"></span> Charts
            </a>
        </li>
        <!-- Menu Tables -->
        <li class="<?= ($pages == 'tables') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/tables'); ?>">
                <span class="glyphicon glyphicon-list-alt"></span> Tables
            </a>
        </li>
        <!-- Menu Forms -->
        <li class="<?= ($pages == 'forms') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/forms'); ?>">
                <span class="glyphicon glyphicon-pencil"></span> Forms
            </a>
        </li>
        <!-- Menu Panels -->
        <li class="<?= ($pages == 'panels') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/panels'); ?>">
                <span class="glyphicon glyphicon-info-sign"></span> Alerts & Panels
            </a>
        </li>
        <!-- Menu Logout -->
        <li role="presentation" class="divider"></li>
        <li class="<?= ($pages == 'login-admin') ? 'active' : ''; ?>">
            <a href="<?= base_url('admin/logout'); ?>">
                <span class="glyphicon glyphicon-log-out"></span> Logout
            </a>
        </li>
    </ul>
    <div class="attribution">
    </div>
</div><!--/.sidebar-->
