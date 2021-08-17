@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>EKSTRAKULIKULER</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="ekstrakulikuler" class="ekstrakulikuler">
            <div class="container">
                <div class="row">
                    @foreach ($ekstrakulikulers as $ekstrakulikuler)
                        <div class="col-md-4">
                            <div class="card">
                                <br>
                                <img class="card-img-top" src="{{ asset('img/gambar/'.$ekstrakulikuler->gambar) }}" alt="Card image cap"class="card-img-top mt-2" alt="" style="height:300px; max width: 200%; object-fit: contain;">
                                <div class="card-body">
                                    <strong>
                                        <p class="card-title text-center">{{ $ekstrakulikuler->judul}}</p>
                                    </strong>
                                    <p class="card-text">{{ $ekstrakulikuler->deskripsi }}</p>
                                </div>
                            </div>
                            <br/>
                            <br/>
                        </div>
                    @endforeach
                </div>
                {{$ekstrakulikulers->links()}} - Jumlah :
                {{$ekstrakulikulers->count()}} -
            </div>
    </section>
</main>
