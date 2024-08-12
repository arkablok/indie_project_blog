@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
        <x-home.navbar />
<div class="site-wrap" id="home-section">

<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<div class="ftco-blocks-cover-1">
<div class="site-section-cover overlay" style="background-image: url('{{ asset('blog/images/hero.jpg') }}')">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5" data-aos="fade-right">
        <h1 class="mb-3 text-white">Indie Spirits, Unleash Your Uniqueness!</h1>
        <p>Kamu adalah kreator dalam kisah ini, mengukir jalanmu sendiri di antara catatan kehidupan yang unik dan autentik. Bersama-sama, kita merayakan keunikan dan semangat indie yang membentuk kita menjadi komunitas yang bersemangat dan penuh inspirasi. </p>
        <p class="d-flex align-items-center">
          <a href="https://vimeo.com/191947042" data-fancybox class="play-btn-39282 mr-3"><span class="icon-play"></span></a> 
          <span class="small">Watch the video</span>
        </p>
      </div>
    </div>
  </div>
</div>
</div>


<div class="site-section py-5">
<div class="container">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="heading-39101 mb-5">
        <span class="backdrop">Tentang Blog</span>
        <span class="subtitle-39191">Discover Story</span>
        <h3>Tentang Anak Indie</h3>
      </div>
      <p>Selamat datang di Indie Blog, ruang di mana semangat kreatif anak muda dan esensi indie bertemu dalam harmoni. Kami adalah komunitas bersemangat yang mengeksplorasi segala aspek keunikan melalui tulisan, seni, dan inspirasi indie. Dari cerita pribadi yang menggugah hingga sorotan terkini dalam musik, fashion, dan seni jalanan, kami berkomitmen untuk menjadi sumber inspirasi dan tempat bersatu bagi anak muda kreatif. Bergabunglah dengan kami di [Nama Website], tempat di mana kreativitas dihargai, dan cerita Anda menjadi bagian dari melodi indie yang membentuk dunia kami.</p>
    </div>
    <div class="col-md-6" data-aos="fade-right">
      <img src="{{ asset('blog/images/fajarbos.png') }}" alt="Image" class="img-fluid">
    </div>
  </div>
</div>
</div>

<div class="site-section">

<div class="container">
  <div class="row justify-content-center text-center">
    <div class="col-md-7">
      <div class="heading-39101 mb-5">
        <span class="backdrop text-center">Blog</span>
        <span class="subtitle-39191">Blog</span>
        <h3>Our Blog</h3>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($posts as $item)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
        <a href="{{ route('posts', $item->slug) }}">
            <div class="listing-item">
                <div class="listing-image">
                    @if ($item->image)
                        <img src="{{ asset('/storage/'. $item->image) }}" alt="{{ $item->title }} image" class="img-fluid">
                    @else
                        <img src="{{ asset('blog/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                    @endif
                </div>
            </div>
          </a>
            <div class="post-entry-1 h-100">
              <div class="post-entry-1-contents">
              <a class="px-3 mb-3 category bg-primary" href="#">INDIE BLOG</a> <br>
            @if(strlen($item->title) <= 40)
                    <h2><a href="{{ route('posts', $item->slug) }}">{{ $item->title }}</a></h2>
                    @else
                    <h2><a href="{{ route('posts', $item->slug) }}">{{ substr($item->title, 0, 40) }}...</a></h2>
                    @endif
                    <span class="meta d-inline-block mb-3">{{ $item->created_at->format('d, M y') }}</span><b> by {{ $item->user->name }}</b>
                    <br>
                      {{ substr(strip_tags($item->content), 0, 60) }}...
                    <a href="{{ route('posts', $item->slug) }}">Read more</a>
                    </br>
              </div>
          </div>
      </div>
    @endforeach
</div>

<div class="flex justify-center mt-8">
    {{ $posts->links() }}
</div>
</div>

<div class="site-section">

<div class="container">
  <div class="row justify-content-center text-center">
    <div class="col-md-10">
      <div class="heading-39101 mb-5">
        <span class="backdrop text-center">Our Comunity</span>
        <span class="subtitle-39191">New Member</span>
        <h3>Selamat Bergabung Ke Komunitas, Ayo Jadi Si Paling Indie dengan Jelajahi Semua yang Pasti</h3>
      </div>
    </div>
  </div>

  <div id="user-carousel" class="owl-carousel slide-one-item">
    @php
    $usersChunks = array_chunk($users->where('is_admin', 1)->toArray(), 3);
@endphp

@foreach ($usersChunks as $usersChunk)
    <div class="row">
        @foreach ($usersChunk as $index => $user)
            @if ($index >= 0 && $index <= 2)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="person-29191 text-center">
                        <div class="px-4">
                            <h2 class="mb-2">{{ $user['name'] }}</h2>
                            <p class="caption mb-4">SI PALING INDIE</p>
                            <p>Email: {{ $user['email'] }}</p>
                            <div class="social_29128 mt-5">
                                <a href="#"><span class="icon-facebook"></span></a>
                                <a href="#"><span class="icon-instagram"></span></a>
                                <a href="#"><span class="icon-twitter"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endforeach
</div>

</div>

<div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg')">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-bold text-white">Join Bersama Kami</h2>
            <p class="text-white">Ayo gabung dengan komunitas ini abadikan setiap perjalanan dan ceritamu disini</p>
            <p class="mb-0"><a href="/signup" class="btn btn-primary text-white py-3 px-4">JOIN</a></p>
          </div>
        </div>
      </div>
    </div>
</div>


<script src="{{ asset('blog/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('blog/js/popper.min.js') }}"></script>
<script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('blog/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('blog/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('blog/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('blog/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('blog/js/aos.js') }}"></script>

<script src="{{ asset('blog/js/main.js') }}"></script>


        <x-home.footer />
@endsection
