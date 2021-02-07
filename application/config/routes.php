<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['sitemap\.xml'] = 'sitemap';

// admin
$route['admin'] = 'login/login_admin';
$route['admin/kategori'] = 'admin/banner/kategori';
$route['admin/kategori/tambah'] = 'admin/banner/tambah_kategori';
$route['admin/kategori/ubah/(:any)'] = 'admin/banner/ubah_kategori/$1';
$route['admin/paket'] = 'admin/banner/paket';
$route['admin/paket/tambah'] = 'admin/banner/tambah_paket';
$route['admin/paket/ubah/(:any)'] = 'admin/banner/ubah_paket/$1';
$route['admin/paket/detail/(:any)'] = 'admin/banner/detail_paket/$1';
$route['admin/paket/tambah_paket/(:any)'] = 'admin/banner/tambah_sub_paket/$1';
$route['admin/paket/detail/subdetail/(:any)'] = 'admin/banner/detail_sub_paket/$1';
$route['admin/paket/detail/ubah/(:any)'] = 'admin/banner/ubah_sub_paket/$1';
$route['admin/paket/detail/hapus/(:any)'] = 'admin/banner/hapus_sub_paket/$1';
$route['admin/produk'] = 'admin/produk';
$route['admin/produk/tambah'] = 'admin/produk/tambah';
$route['admin/produk/detail/(:any)'] = 'admin/produk/detail/$1';
$route['admin/produk/ubah/(:any)'] = 'admin/produk/ubah/$1';
$route['admin/produk/hapus/(:any)'] = 'admin/produk/hapus/$1';
$route['admin/galeri'] = 'admin/galeri';
$route['admin/galeri/tambah'] = 'admin/galeri/tambah';
$route['admin/galeri/ubah/(:any)'] = 'admin/galeri/ubah/$1';
$route['admin/galeri/hapus/(:any)'] = 'admin/galeri/hapus/$1';
$route['admin/kategori-blog'] = 'admin/blog/kategori';
$route['admin/kategori-blog/tambah'] = 'admin/blog/tambah_kategori';
$route['admin/kategori-blog/ubah/(:any)'] = 'admin/blog/ubah_kategori/$1';
$route['admin/blog'] = 'admin/blog';
$route['admin/blog/tambah'] = 'admin/blog/tambah';
$route['admin/blog/ubah/(:any)'] = 'admin/blog/ubah/$1';
$route['admin/blog/hapus/(:any)'] = 'admin/blog/hapus/$1';
$route['admin/blog/detail/(:any)'] = 'admin/blog/detail/$1';
$route['admin/testimoni'] = 'admin/testimoni';
$route['admin/testimoni/tambah'] = 'admin/testimoni/tambah';
$route['admin/testimoni/ubah/(:any)'] = 'admin/testimoni/ubah/$1';
$route['admin/testimoni/hapus/(:any)'] = 'admin/testimoni/hapus/$1';
$route['admin/pengaturan'] = 'admin/pengaturan';
// admin

// pengunjung
$route['default_controller'] = 'beranda';
$route['paket'] = 'beranda/paket';
$route['faq'] = 'beranda/faq';
$route['tentang-kami'] = 'beranda/tentang_kami';
$route['menu'] = 'beranda/menu';
$route['menu/(:any)'] = 'beranda/menu/$1';
$route['galeri'] = 'beranda/galeri';
$route['kontak'] = 'beranda/kontak';
$route['menu/detail/(:any)'] = 'beranda/menu_detail/$1';
$route['produk-unggulan'] = 'beranda/produk_unggulan';
$route['produk-unggulan/detail/(:any)'] = 'beranda/menu_unggulan/$1';
$route['blog'] = 'beranda/blog';
$route['blog/(:any)'] = 'beranda/blog/$1';
$route['blog/detail/(:any)'] = 'beranda/blog_detail/$1';
// pengunjung

$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;
