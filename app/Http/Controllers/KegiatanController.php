<?php

namespace App\Http\Controllers;

use PDF;
use App\Kegiatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;

            $kegiatan = $kegiatan->where('judul', 'like', "%" . $this->keyword . "%");
        }

        return view('kegiatan.index')->with('kegiatan', $kegiatan->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->session()->get('_previous')['url']);

        return view('kegiatan.create');
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
            'jenis' => 'required|string',
            'tanggal' => 'nullable',
            'jam' => 'nullable',
        ]);

        if (isset($request->tanggal_agenda)) {
            $tanggal = $request->tanggal_agenda;
        } else {
            $tanggal = $request->tanggal_pengumuman;
        }

        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $tanggal,
            'jam' => date('H:i:s'),
            'jenis' => $request->jenis
        ]);

        session()->flash('success', 'Kegiatan Berhasil Ditambahkan');

        return redirect(route('kegiatan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit')->with('kegiatan', $kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'jenis' => 'required|string',
            'tanggal' => 'nullable',
            'jam' => 'nullable',
        ]);

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'jenis' => $request->jenis
        ]);

        session()->flash('success', "Data Kegiatan : $kegiatan->judul  Berhasil Di ubah");

        //redirect user
        return redirect(route('kegiatan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->gambar !== "kegiatan_default.jpg") {
            File::delete('img/gambar/' . $kegiatan->gambar);
        }

        $kegiatan->delete();

        session()->flash('success', "Data Kegiatan : $kegiatan->judul Berhasil Dihapus");

        return redirect(route('kegiatan.index'));
    }
}
