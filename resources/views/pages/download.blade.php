@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>DOWNLOAD</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="download" class="download">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Files</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Oleh</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>gambar.jpg</td>
                                <td>2 Agustus 2021</td>
                                <td>Guru</td>
                                <td><button type="button" class="btn btn-primary">Download</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
