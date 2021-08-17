@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>KEGIATAN SEKOLAH</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Kegiatan -->
    <section id="kegiatan" class="kegiatan">
        @foreach ($kegiatans as $kegiatan)
        <div class="container mb-3">
            <div class="row">
                <div class="col-md-12">
                    {{-- <br/>
                    <br/> --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6"><h4>{{ $kegiatan->judul }}</h4></div>
                                <div class="col-md-6"><h5>{{ date('d M Y', strtotime($kegiatan->tanggal)) }}</h5></div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $kegiatan->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- end Kegiatan -->
</main>
