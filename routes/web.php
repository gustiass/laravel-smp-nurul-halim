<?php

use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {

    //settings
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('setting', 'SettingController');
    });



    Route::group(['middleware' => ['permission:manajemen users|manajemen roles']], function () {
        Route::get('/roles/search', 'RoleController@search')->name('roles.search');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        // Route::resource('setting', 'SettingController');        
    });

    // Produk
    Route::group(['middleware' => ['permission:manajemen produk']], function () {
        Route::get('/produk/search', 'ProdukController@search')->name('produk.search');
        Route::get('/produk/pdf', 'ProdukController@reportPdf')->name('produk.pdf');
        Route::get('/produk/export/', 'ProdukController@export')->name('produk.export');
        Route::post('/produk/import/', 'ProdukController@import')->name('produk.import');
        Route::resource('produk', 'ProdukController');
    });

    // Kategori
    Route::group(['middleware' => ['permission:manajemen kategori']], function () {
        Route::resource('kategori', 'KategoriController');
    });

    // Informasi
    Route::group(['middleware' => ['permission:manajemen informasi']], function () {
        Route::resource('informasi', 'InformasiController');
    });

    Route::resource('pengumuman', 'PengumumanController');
    Route::resource('kegiatan', 'KegiatanController');
    Route::resource('galeri', 'GaleriController');

    //profile
    Route::resource('/profile', 'ProfileController');

    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/', function () {
    $profile = \App\Profile::find(1);
    $artikels = \App\Informasi::latest('created_at')->where('jenis', 'Artikel')->limit(2)->get();
    $kegiatans = \App\Kegiatan::latest('created_at')->where('jenis', 'Agenda')->limit(2)->get();
    return view('pages.home', compact('profile', 'artikels', 'kegiatans'));
});

Route::get('/profile', function () {
    $profile = \App\Profile::find(1);
    return view('pages.profile.profile', compact('profile'));
});

Route::get('/osis', function () {
    return view('pages.kesiswaan.osis');
});

Route::get('/ekstrakulikuler', function () {
    return view('pages.kesiswaan.ekstrakulikuler');
});

Route::get('/prestasi-siswa', function () {
    return view('pages.kesiswaan.prestasi-siswa');
});

Route::get('/artikel', function () {
    $artikels = \App\Informasi::latest('created_at')->where('jenis', 'Artikel')->get();
    return view('pages.berita.artikel', compact('artikels'));
});

Route::get('/kegiatan-sekolah', function () {
    $kegiatans = \App\Kegiatan::latest('created_at')->where('jenis', 'Agenda')->get();
    return view('pages.berita.kegiatan-sekolah', compact('kegiatans'));
});

Route::get('/pengumuman', function () {
    $pengumumans = \App\Kegiatan::latest('created_at')->where('jenis', 'Pengumuman')->get();
    return view('pages.informasi.pengumuman', compact('pengumumans'));
});

Route::get('/guru-staf', function () {
    return view('pages.informasi.guru-staf');
});


Route::get('/gallery', function () {
    $galeris = \App\Galeri::latest()->get();
    return view('pages.galeri', compact('galeris'));
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});

Route::get('/download', function () {
    return view('pages.download');
});
