<?php

namespace App\Http\Controllers;

use App\Informasi;
use App\Galeri;
use App\Kegiatan;
use App\Guru;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $informasi = Informasi::count();
        $kegiatan = Kegiatan::count();
        $galeri = Galeri::count();
        $guru = Guru::count();
        return view('home', compact('informasi', 'kegiatan', 'galeri', 'guru'));
    }
}
