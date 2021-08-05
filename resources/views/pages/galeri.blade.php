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
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-5">  
                @foreach ($galeris as $galeri)    
                    <div class="col-md-4">
                        <img src="{{ asset('img/gambar/'.$galeri->gambar) }}" alt="..." class="img-thumbnail">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
