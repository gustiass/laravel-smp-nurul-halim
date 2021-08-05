<?php

namespace App\Http\Controllers;

use PDF;
use App\Galeri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galeri = Galeri::latest();

        return view('galeri.index')->with('galeri', $galeri->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = '';
        if ($request->hasFile('gambar')) {
            $gambar = $this->uploadGambar($request);
        } else {
            $gambar = "galeri_default.jpg";
        }

        Galeri::create([
            'gambar' => $gambar
        ]);

        session()->flash('success', 'Data Galeri Berhasil Ditambahkan');

        return redirect(route('galeri.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri.edit')->with('galeri', $galeri);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        if ($request->hasFile('gambar')) {
            $gambar = $this->uploadGambar($request);

            if ($galeri->gambar !== "galeri_default.jpg") {
                File::delete('img/gambar/' . $galeri->gambar);
            }

            $data['gambar'] = $gambar;
        }

        $galeri->update($data);

        session()->flash('success', "Data Galeri : $galeri->nama_galeri  Berhasil Di ubah");

        return redirect(route('galeri.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar !== "galeri_default.jpg") {
            File::delete('img/gambar/' . $galeri->gambar);
        }

        $galeri->delete();

        session()->flash('success', "Data Galeri : $galeri->nama_galeri Berhasil Dihapus");

        return redirect(route('galeri.index'));
    }

    /**
     * Upload gambar galeri.
     *
     * @param  mixed  $request
     * @return string $gambar nama file galeri
     */
    public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->nama_galeri);
        $ext = explode('/', $request->gambar->getClientMimeType())[1];
        $uniq = uniqid();
        $gambar = "$namaFile-$uniq.$ext";
        $request->gambar->move(public_path('img/gambar'), $gambar);

        return $gambar;
    }
}
