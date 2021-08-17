@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>GALERI</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="galeri" class="galeri">
        <div class="container">
            <div class="row">
                @foreach ($galeris as $galeri)
                    <div class="col-md-4">
                        <img src="{{ asset('img/gambar/'.$galeri->gambar) }}" alt="..." class="img-thumbnail" class="card-img-top mt-2" alt="" style="height:300px; max width: 200%; object-fit: contain;">
                    </div>
                @endforeach
            </div>
            {{$galeris->links()}} - Jumlah :
            {{$galeris->count()}} -
        </div>
    </section>
</main>
