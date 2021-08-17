@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>PENGUMUMAN</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="pengumuman" class="pengumuman">
        <!-- isi pengumuman -->
        @foreach ($pengumumans as $pengumuman)
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-1">
                    <i class="far fa-calendar fa-5x"></i>
                </div>
                <div class="col-md-11">
                    <h4>{{ $pengumuman->judul }}</h4>
                    <p class="small">{{ date('d M Y', strtotime($pengumuman->created_at)) }}</p>
                    <p>{{ $pengumuman->deskripsi }}</p>
                    <hr>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end isi pengumuman -->
    </section>
</main>
