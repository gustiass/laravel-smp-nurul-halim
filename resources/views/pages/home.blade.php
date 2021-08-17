@extends('layouts.frontend.master')
@section('style')
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    </style>
@endsection
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1 class="text-center">TERWUJUD KULTUR BELAJAR<br>DAN <br>AKHLAKUL KARIMAH</h1>
    {{-- <h2>Terwujud Kultur Belajar dan akhlakul Karimah</h2>
      <a href="courses.html" class="btn-get-started">Get Started</a> --}}
  </div>
 </section>
    <!-- End Hero -->
<main id="main">

    <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
            <h2>About</h2>
            <p>Sambutan Kepala Sekolah</p>
      </div>

      <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="assets/img/sambutan.jpeg" width="60%" height="auto">
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 content">
                <p class="text-justify">
                    {!! substr($profile->sambutan, 0, 5000) !!}
                </p>
            </div>
      </div>
      <br>
      <br>
      <div class="section-title">
            <p>Sejarah Singkat</p>
        </div>

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2">

                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div>
                    <img src="assets/img/img-1.jpeg" width="100%" height="auto">
                    </div>

                    <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="assets/img/img-2.jpeg" width="100%" height="auto">
                    </div>

                    <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="assets/img/img-4.jpeg" width="100%" height="auto">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 4</div>
                        <img src="assets/img/img-5.jpeg" width="100%" height="auto">
                        </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 content">
                <p class="text-justify">
                    {!! substr($profile->sejarah_singkat, 0,5000) !!}
                </p>
                <a href="{{ url('profile') }}" class="learn-more-btn">Baca Selengkapnya</a>
            </div>
        </div>
  </div>

    </div>
  </section><!-- End About Section -->

  <!-- Berita dan kegiatan -->
  <section id="berita-kegiatan" class="berita-kegiatan">
    <div class="container">
      <div class="row">
        <!-- berita -->
        <div class="col-md-6 col-lg-6">
        <i class="far fa-newspaper fa-2x"> Berita Terbaru</i>
          <div class="row">
            @foreach($artikels as $artikel)
            <div class="col-md-6">
              <div class="card">
                <img class="card-img-top" src="{{ asset('img/gambar/'.$artikel->gambar) }}" alt="Card image cap" class="img-thumbnail" class="card-img-top mt-2" alt="" style="height:300px; max width: 200%; object-fit: contain;">
                <div class="card-body">
                  <h5 class="card-title">{{ $artikel->judul }}</h5>
                  <p class="small">{{ date('d M Y H:i:s', strtotime($artikel->created_at)) }}</p>
                  <p class="card-text">{{ substr($artikel->deskripsi, 0,20) }}</p>
                  <a href="{{ url('artikel') }}" class="btn btn-primary">More Info</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- end berita -->

        <div class="col-md-6 col-lg-6">
        <i class="far fa-calendar fa-2x"> Info Kegiatan</i>
          @foreach ($kegiatans as $kegiatan)
          <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-6">{{ $kegiatan->judul }}</div>
                      <div class="col-md-6"><h6>{{ date('d M Y', strtotime($kegiatan->tanggal)) }} {{ $kegiatan->jam }}</h6></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>{{ $kegiatan->deskripsi }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>

      </div>


    </div>
  </section>
  <!-- end Berita dan kegiatan -->

</main><!-- End #main -->
@endsection

@section('script')
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 3 seconds
    }
    </script>
@endsection
