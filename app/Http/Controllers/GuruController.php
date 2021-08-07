<?php

namespace App\Http\Controllers;

use App\Guru;
use PDF;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guru = Guru::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;

            $guru = $guru->where('nomer_induk', 'like', "%" . $this->keyword . "%");
            $guru = $guru->orWhere('nama', 'like', "%" . $this->keyword . "%");
        }

        return view('guru.index')->with('guru', $guru->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->session()->get('_previous')['url']);

        return view('guru.create');
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
            'nama' => 'required|string',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2000',
            'jabatan' => 'required|string',
            'mapel' => 'required|string'
        ]);

        $foto = '';
        if ($request->hasFile('foto')) {
            $foto = $this->uploadGambar($request);
        } else {
            $foto = "produk_default.jpg";
        }
        // $image = $request->cover->store('cover');

        Guru::create([
            'nomer_induk' => $request->nomer_induk,
            'nama'=> $request->nama,
            'foto' => $foto,
            'jabatan' => $request->jabatan,
            'mapel' => $request->mapel
        ]);

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect(route('guru.index'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Produk  $produk
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Produk $produk)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit')->with('guru', $guru);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $data = $request->only([
            'nomor_induk',
            'nama',
            'jabatan',
            'mapel'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $this->uploadGambar($request);

            if ($guru->foto!== "produk_default.jpg") {
                File::delete('img/gambar/' . $guru->foto);
            }

            $data['foto'] = $foto;
        }


        $guru->update($data);

        session()->flash('success', "Data Produk : $guru->nomer_induk  Berhasil Di ubah");

        //redirect user
        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        if ($guru->foto !== "produk_default.jpg") {
            File::delete('img/gambar/' . $guru->foto);
        }

        $guru->delete();

        session()->flash('success', "Data : $guru->nomer_induk Berhasil Dihapus");

        return redirect(route('guru.index'));
    }


    /**
     * Cetak data ke PDF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PDF
     */
    public function reportPdf(Request $request)
    {

        // $produk = Produk::all();

        // $pdf = PDF::setOptions([
        //     'dpi' => 150,
        //     'defaultFont' => 'sans-serif',
        // ])
        //     ->loadView('produk.report.pdf', [
        //         'produk' => $produk,
        //     ]);

        // return $pdf->stream();
    }

    /**
     * Upload gambar.
     *
     * @param  mixed  $request
     * @return string $gambar nama file
     */
    public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->nomer_induk);
        $ext = explode('/', $request->foto->getClientMimeType())[1];
        $uniq = uniqid();
        $foto = "$namaFile-$uniq.$ext";
        $request->foto->move(public_path('img/gambar'), $foto);

        return $foto;
    }
}

