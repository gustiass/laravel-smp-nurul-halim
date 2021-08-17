@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>PRESTASI SISWA</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="prestasi" class="prestasi">
        <div class="container">
            <div class="row">
                <!-- isi prestasi -->
                @foreach ($prestasis as $prestasi)
                <div class="col-md-4">
                    <div class="card">
                        <br>
                        <img class="card-img-top" src="{{ asset('img/gambar/'.$prestasi->gambar) }}" alt="Card image cap" class="card-img-top mt-2" alt="" style="height:300px; max width: 200%; object-fit: contain;">
                        <div class="card-body">
                            <strong>
                                <p class="card-title text-center">{{ $prestasi->judul}}</p>
                            </strong>
                            <p class="card-text">{{ $prestasi->deskripsi }}</p>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
                @endforeach
            </div>
            {{$prestasis->links()}} - Jumlah :
            {{$prestasis->count()}} -
        </div>
    </section>
</main>

<!-- https://stackoverflow.com/questions/30031751/php-foreach-loop-wrapping-every-2-items -->
