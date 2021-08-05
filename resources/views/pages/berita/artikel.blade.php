@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>ARTIKEL</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- search -->
    <section id="search" class="search">
        <div class="container">
            <div class="row mt-5">
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

    <!-- artikel -->
    @foreach ($artikels as $artikel)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>{{ $artikel->judul }}</h4>
                <p class="small">{{ date('d M Y', strtotime($artikel->created_at)) }}</p>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <img src="{{ asset('img/gambar/'.$artikel->gambar) }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p>{{ $artikel->deskripsi }}</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- end artikel -->
</main>
