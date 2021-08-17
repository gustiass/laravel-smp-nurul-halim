@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>GURU PENGAJAR</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="guru-staf" class="guru-staf">
        <div class="container">
            <div class="row  text-center">
                @if ($gurus)
                @foreach ($gurus as $guru)
               <div class="col-md-3">
                    <div class="card">
                        <br>
                        <img class="card-img-top img-fluid" src="{{asset('/img/gambar').'/'. $guru->foto}}" alt="Card image cap" class="card-img-top mt-2" alt="" style="height:300px; max width: 200%; object-fit: contain;">
                        <div class="card-body">
                            <strong>
                                <p class="card-title">{{$guru['nama']}}</p>
                            </strong>
                            <div class="card-text">
                                {{$guru['jabatan']}}<br>
                                {{$guru['mapel']}}
                            </div>
                            {{-- <p class="card-text">{{$guru['mapel']}}</p> --}}

                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
                @endforeach
                @endif

            </div>
            <br/>
            {{$gurus->links()}} - Jumlah :
            {{$gurus->count()}} -
        </div>
    </section>
</main>
