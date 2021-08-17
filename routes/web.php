<?php

use App\Guru;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    Route::resource('kategori', 'KategoriController');
    Route::resource('informasi', 'InformasiController');
    Route::resource('guru', 'GuruController');
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
    // $profile = \App\Profile::latest('created_at')->get();
    return view('pages.profile.profile', compact('profile'));
});


Route::get('/ekstrakulikuler', function () {
    $ekstrakulikulers = \App\Informasi::latest('created_at')->where('jenis', 'Ekstrakulikuler')
    ->paginate(9);

    return view('pages.kesiswaan.ekstrakulikuler', ['ekstrakulikulers'=> $ekstrakulikulers]);
});

Route::get('/prestasi-siswa', function () {
    $prestasis = \App\Informasi::latest('created_at')->where('jenis', 'Prestasi-ssiswa')
    ->paginate(9);

    return view('pages.kesiswaan.prestasi-siswa', ['prestasis'=> $prestasis]);
});

Route::get('/prestasi-sekolah', function () {
    $prestasis = \App\Informasi::latest('created_at')->where('jenis', 'Prestasi-sekolah')
    ->paginate(9);

    return view('pages.informasi.prestasi-sekolah', ['prestasis'=> $prestasis]);
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

Route::get('/gurus', function () {
    $gurus = Guru::where('jabatan','=', 'Guru')
        ->orWhere('jabatan','=', 'Staff')
        // ->get()
        ->paginate(8);


    return view('pages.informasi.guru')
        ->with('gurus', $gurus);

})->name('guru');

Route::post('/guru', 'GuruController@store')->name('guru.store');

Route::get('/gallery', function () {
    $galeris = \App\Galeri::latest()
    ->paginate(9);

    return view('pages.galeri', ['galeris'=> $galeris]);
});

Route::get('/kontak', function () {
    return view('pages.kontak');
});
