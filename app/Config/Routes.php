<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/login-admin', 'Admin::login');
$routes->post('/admin/autentikasi-login', 'Admin::autentikasi');
$routes->get('/admin/forms', 'Admin::forms');
$routes->get('/admin/biodata', 'Admin::biodata');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/logout', 'Admin::logout');

// Routes untuk Master Data Admin
$routes->get('/admin/master-data-admin', 'Admin::master_data_admin');
$routes->get('/admin/input-data-admin', 'Admin::input_data_admin');
$routes->post('/admin/simpan-admin', 'Admin::simpan_data_admin');
$routes->get('/admin/edit-data-admin/(:alphanum)', 'Admin::edit_data_admin/$1');
$routes->post('/admin/update-admin/(:alphanum)', 'Admin::update_data_admin/$1');
$routes->get('/admin/hapus-data-admin/(:alphanum)', 'Admin::hapus_data_admin/$1');

// Routes untuk Manajemen Anggota
$routes->get('admin/master-data-anggota', 'Anggota::master_data_anggota');
$routes->get('admin/input-data-anggota', 'Anggota::input_data_anggota');
$routes->post('admin/simpan-data-anggota', 'Anggota::simpan_data_anggota');
$routes->get('admin/edit-data-anggota/(:segment)', 'Anggota::edit_data_anggota/$1');
$routes->post('admin/update-data-anggota', 'Anggota::update_data_anggota');
$routes->get('admin/hapus-anggota/(:segment)', 'Anggota::hapus_data_Anggota/$1');

// Routes untuk Manajemen Buku
$routes->get('admin/master-data-buku', 'Buku::master_data_buku');
$routes->get('admin/input-data-buku', 'Buku::input_data_buku');
$routes->post('admin/simpan-data-buku', 'Buku::simpan_data_buku');
$routes->get('admin/edit-data-buku/(:any)', 'Buku::edit_data_buku/$1');
$routes->post('admin/update-data-buku', 'Buku::update_data_buku');
$routes->get('admin/hapus-data-buku/(:any)', 'Buku::hapus_data_buku/$1');

// Routes untuk Manajemen Kategori
$routes->get('admin/master-data-kategori', 'Kategori::master_data_kategori');
$routes->get('admin/input-data-kategori', 'Kategori::input_data_kategori');
$routes->post('admin/simpan-data-kategori', 'Kategori::simpan_data_kategori');
$routes->get('admin/edit-data-kategori/(:segment)', 'Kategori::edit_data_kategori/$1');
$routes->post('admin/update-data-kategori', 'Kategori::update_data_kategori');
$routes->get('admin/hapus-data-kategori/(:segment)', 'Kategori::hapus_data_kategori/$1');

// Routes untuk Manajemen Rak
$routes->get('admin/master-data-rak', 'Rak::master_data_rak');
$routes->get('admin/input-data-rak', 'Rak::input_data_rak');
$routes->post('admin/simpan-data-rak', 'Rak::simpan_data_rak');
$routes->get('admin/edit-data-rak/(:any)', 'Rak::edit_data_rak/$1');
$routes->post('admin/update-data-rak', 'Rak::update_data_rak');
$routes->get('admin/hapus-data-rak/(:any)', 'Rak::hapus_data_rak/$1');

// Routes untuk Backup
$routes->get('/admin/backup', 'Backup::backup');
$routes->get('/admin/backup/doBackup', 'Backup::doBackup');
$routes->get('/admin/backup/doRestore', 'Backup::doRestore');

// Routes tambahan untuk fitur lainnya
$routes->get('/admin/charts', 'Admin::charts');
$routes->get('/admin/panels', 'Admin::panels');
$routes->get('/admin/tables', 'Admin::tables');
$routes->get('/admin/widgets', 'Admin::widgets');
$routes->get('/admin/dashboard-hitung/(:num)/(:num)', 'Admin::hitung/$1/$2');
$routes->get('/admin/dashboard-banding/(:num)/(:num)', 'Admin::banding/$1/$2');
$routes->get('/admin/belajar-forms', 'Admin::implementasi_forms');
$routes->post('/admin/post-form', 'Admin::post_form');
$routes->get('/admin/form-sukses', 'Admin::form_sukses');