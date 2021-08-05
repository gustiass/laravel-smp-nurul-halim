@extends('layouts.frontend.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>HUBUNGI KAMI</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="kontak" class="kontak">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3>Kontak</h3><br>
                    <h4>Tinggalkan Pesan</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="nama" placeholder="Nama">
                        </div>
                        <div class="form-group mt-4">
                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                        </div>
                        <div class="form-group mt-4">
                            <input type="number" class="form-control" id="no-telp" placeholder="No. Telp">
                        </div>
                        <div class="form-group mt-4">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Pesan"></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
