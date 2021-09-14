<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// user routes 
$routes->get('/', 'Home::index');
$routes->get('pencarian', 'Pencarian::search');
$routes->get('pencarian/(:any)', 'Pencarian::search/$1');


// admin routes 
$routes->get('/admin/login', 'Admin/AdminLogin::index');
$routes->get('/admin/logout', 'Admin/AdminLogin::logout');
$routes->group('admin', ['filter' => 'authadminfilter'], function($routes) {
	
	$routes->get('/', 'Admin/AdminDashboard::index');
	$routes->get('dashboard', 'Admin/AdminDashboard::index');

	$routes->get('kategori', 'Admin/Kategori::index');

	$routes->get('berita', 'Admin/Berita::index');
	$routes->get('berita/tambah_data', 'Admin/Berita::tambah_data');
	$routes->post('berita/actiontambah', 'Admin/Berita::actiontambah');
	$routes->get('berita/edit_data/:id_berita', 'Admin/Berita::edit_data');
	$routes->post('berita/actionedit/:id_berita', 'Admin/Berita::actionedit');
	$routes->get('berita/actiondelete/:id_berita', 'Admin/Berita::actiondelete');

	$routes->get('tag', 'Admin/Tag::index');
	$routes->get('tag/tambah_data', 'Admin/Tag::tambah_data');
	$routes->post('tag/actiontambah', 'Admin/Tag::actiontambah');
	$routes->get('tag/edit_data/:id_tag', 'Admin/Tag::edit_data');
	$routes->post('tag/actionedit/:id_tag', 'Admin/Tag::actionedit');
	$routes->get('tag/actiondelete/:id_tag', 'Admin/Tag::actiondelete');

	$routes->get('pesan', 'Admin/Pesan::index');

	$routes->get('komentar', 'Admin/Komentar::index');

	$routes->get('contact', 'Admin/Contact::index');
	$routes->get('contact/edit_data/:id', 'Admin/Contact::edit_data');
	$routes->post('contact/actionedit/:id', 'Admin/Contact::actionedit');

	$routes->get('socmed', 'Admin/Socmed::index');
	$routes->get('socmed/edit_data/:id', 'Admin/Socmed::edit_data');
	$routes->post('socmed/actionedit/:id', 'Admin/Socmed::actionedit');

	$routes->get('slide', 'Admin/Slide::index');
	$routes->get('slide/tambah_data', 'Admin/Slide::tambah_data');
	$routes->post('slide/actiontambah', 'Admin/Slide::actiontambah');
	$routes->get('slide/edit_data/:id_Slide', 'Admin/Slide::edit_data');
	$routes->post('slide/actionedit/:id_Slide', 'Admin/Slide::actionedit');
	$routes->get('slide/actiondelete/:id_Slide', 'Admin/Slide::actiondelete');

	$routes->get('banner', 'Admin/Banner::index');
	$routes->get('banner/tambah_data', 'Admin/Banner::tambah_data');
	$routes->post('banner/actiontambah', 'Admin/Banner::actiontambah');
	$routes->get('banner/edit_data/:id_Banner', 'Admin/Banner::edit_data');
	$routes->post('banner/actionedit/:id_Banner', 'Admin/Banner::actionedit');
	$routes->get('banner/actiondelete/:id_Banner', 'Admin/Banner::actiondelete');

	$routes->get('struktur_redaksi', 'Admin/Struktur_redaksi::index');
	$routes->get('struktur_redaksi/actionedit', 'Admin/Struktur_redaksi::actionedit');

	$routes->get('tentang_kami', 'Admin/Tentang_kami::index');
	$routes->get('tentang_kami/actionedit', 'Admin/Tentang_kami::actionedit');

	$routes->get('privacy_policy', 'Admin/Privacy_policy::index');
	$routes->get('privacy_policy/actionedit', 'Admin/Privacy_policy::actionedit');

	$routes->get('users', 'Admin/Users::index');
	$routes->get('users/actionaktif/:id', 'Admin/Users::actionaktif');
	$routes->get('users/actiontidakaktif/:id', 'Admin/Users::actiontidakaktif');
});

// api routes


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
