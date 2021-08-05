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

    <!-- search -->
    <section id="search" class="search">
        <div class="container">
            <div class="row mt-0">
                <div class="col-md-4">
                    <h3></h3>
                </div>
                <div class="col-md-4 offset-md-4">
                    {{-- <form class="form-inline">
                        <label class="sr-only" for="search">Search</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="search" placeholder="Search">

                        <button type="submit" class="btn btn-success mb-2">Submit</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- end search -->

    <!-- Kegiatan -->

    @foreach ($kegiatans as $kegiatan)
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $kegiatan->judul }}
                        {{ $kegiatan->tanggal }}
                    </div>
                    <div class="card-body">
                        <p>{{ $kegiatan->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- end Kegiatan -->
</main>
