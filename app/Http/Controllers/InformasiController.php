<?php

namespace App\Http\Controllers;

use PDF;
use App\Informasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $informasi = Informasi::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;

            $informasi = $informasi->where('judul', 'like', "%" . $this->keyword . "%");
            $informasi = $informasi->orWhere('jenis', 'like', "%" . $this->keyword . "%");
        }

        return view('informasi.index')->with('informasi', $informasi->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->session()->get('_previous')['url']);

        return view('informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2000'
        ]);

        $gambar = '';
        if ($request->hasFile('gambar')) {
            $gambar = $this->uploadGambar($request);
        } else {
            $gambar = "produk_default.jpg";
        }
        // $image = $request->cover->store('cover');

        Informasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'jenis' => $request->jenis
        ]);

        session()->flash('success', 'Informasi Berhasil Ditambahkan');

        return redirect(route('informasi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        return view('informasi.edit')->with('informasi', $informasi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        $data = $request->only([
            'judul',
            'deskripsi',
            'jenis'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $this->uploadGambar($request);

            if ($informasi->gambar !== "produk_default.jpg") {
                File::delete('img/gambar/' . $informasi->gambar);
            }

            $data['gambar'] = $gambar;
        }


        $informasi->update($data);

        session()->flash('success', "Data Produk : $informasi->judul  Berhasil Di ubah");

        //redirect user
        return redirect(route('informasi.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        if ($informasi->gambar !== "produk_default.jpg") {
            File::delete('img/gambar/' . $informasi->gambar);
        }

        $informasi->delete();

        session()->flash('success', "Data Informasi : $informasi->judul Berhasil Dihapus");

        return redirect(route('informasi.index'));
    }


    /**
     * Cetak data ke PDF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PDF
     */
    public function reportPdf(Request $request)
    {

        $produk = Produk::all();

        $pdf = PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
        ])
            ->loadView('produk.report.pdf', [
                'produk' => $produk,
            ]);

        return $pdf->stream();
    }

    /**
     * Upload gambar.
     *
     * @param  mixed  $request
     * @return string $gambar nama file
     */
    public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->judul);
        $ext = explode('/', $request->gambar->getClientMimeType())[1];
        $uniq = uniqid();
        $gambar = "$namaFile-$uniq.$ext";
        $request->gambar->move(public_path('img/gambar'), $gambar);

        return $gambar;
    }
}
