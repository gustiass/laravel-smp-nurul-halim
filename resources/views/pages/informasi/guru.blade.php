@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>GURU</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="guru-staf" class="guru-staf">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- row -->
            <div class="row mt-5 mb-3 text-center">
                @if ($gurus)
                @foreach ($gurus as $guru)
               <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{asset('/img/gambar').'/'. $guru->foto}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$guru['nama']}}</h5>
                            <p class="card-text">{{$guru['jabatan']}}</p>
                            <p class="card-text">{{$guru['mapel']}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            <br/>
            {{$gurus->links()}} - test
            {{$gurus->count()}} - test
        </div>
    </section>
</main>
