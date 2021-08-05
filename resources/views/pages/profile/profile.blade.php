@extends('layouts.frontend.master')
@section('content')

<main id="main" class="mt-5">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>PROFIL</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="identitas" class="identitas">
        <div class="container">
            <!-- Identitas Sekolah -->
            <div class="row">
                <div class="col-md-6">
                    <h3>Identitas Sekolah</h3>
                    <hr>
                    <p>{{ $profile->identitas_sekolah }}</p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="mx-auto">
                            <img src="https://placeimg.com/400/400/tech" alt="Logo Sekolah">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Identitas Sekolah -->

    <!-- Sejarah Singkat Yayasan -->
    <section id="sejarah" class="sejarah">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Sejarah Singkat Yayasan</h3>
                    <hr>
                    {!! $profile->sejarah_singkat !!}
                </div>
            </div>
        </div>
    </section>
    <!-- end sejarah singkat yayasan -->

    <!-- visi dan misi -->
    <section id="visi-misi" class="visi-misi">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Visi dan Misi</h3>
                    <hr>
                    {!! $profile->visi_misi !!}
                </div>
            </div>
        </div>
    </section>
    <!-- end visi dan misi -->

    <!-- Fasilitas -->
    <section id="fasilitas" class="fasilitas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Fasilitas</h3>
                    {!! $profile->fasilitas !!}
                </div>
            </div>
        </div>
    </section>

    <!-- end Fasilitas -->

</main>
