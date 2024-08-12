@extends('layouts.app')
@section('title', 'Posts')
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

      <!-- Menampilkan konten artikel  -->
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <div data-aos="fade-left" id="imageContainer">
            @if ($post->image)
              <img src="{{ asset('/storage/'.$post->image) }}" alt="Image" class="img-fluid" id="centeredImage">
              @endif
            </div>
            <p class="lead">{{ $post->title }}</p>
            <span>{{ $post->created_at->diffForHumans() }}</span>
            <br>
            <br>
            <p>{!! $post->content !!}</p>
            <br>

            @auth
    <div class="pt-5">
        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Beri Komentar</h3>
            <form action="{{ route('comments.store', $post->slug) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="comment">Komentar</label>
                    <textarea name="content" id="comment" class="form-control" placeholder="Masukkan Komentar..." required></textarea>
                    @error('content')
                        <x-alerts.error :message="$message" />
                    @enderror
                    <button type="submit" class="bg-indigo-600 text-white font-medium py-2 px-4 rounded hover:bg-indigo-700 transition duration-300">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endauth

<h3 class="mb-5">Comments</h3>
<ul class="comment-list">
    @foreach ($comments as $key => $comment)
        <li class="comment">
            <div class="vcard bio">
                <img src="{{ asset('blog/images/person.jpg') }}" alt="Image">
            </div>
            <div class="comment-body">
                <h3>{{ $comment->user->name }}</h3>
                <div class="meta"><p>{{ $comment->created_at->diffForHumans() }}</p></div>
                @if (auth()->check() && $comment->user_id === auth()->user()->id)
                    <div x-data="{ open: false }" :id="'comment_' + {{ $comment->id }}">
                        <div x-show="!open">
                            <p>{{ $comment->content }}</p>
                            <button @click="open = true" class="reply" :aria-controls="'comment_' + {{ $comment->id }}">Edit</button>
                        </div>
                        <div x-cloak x-show="open">
                            <form class="flex" action="{{ route('comments.update', [$comment->id, $post->slug]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <textarea id="comment" rows="1" name="content" placeholder="Update your comment" class="w-full px-3 py-2 border border-gray-300 rounded mr-2 focus:outline-none focus:border-indigo-500">{{ $comment->content }}</textarea>
                                @error('content')
                                    <x-alerts.error :message="$message" />
                                @enderror
                                <button type="submit" class="bg-indigo-600 text-white font-medium py-2 px-4 rounded hover:bg-indigo-700 transition duration-300">Update</button>
                            </form>
                        </div>
                    </div>
                @else
                    <p>{{ $comment->content }}</p>
                @endif
            </div>
        </li>
    @endforeach
</ul>


<!-- END comment-list -->


              @guest
        <div class="bg-gray-100 flex flex-col py-12 px-4 rounded-lg mt-6">
            <p class="text-center font-semibold">Join Komunitas</p>
            <div class="flex items-center justify-center mt-2">
                <a class="btn btn-primary text-white py-3 px-4" href="/signup">Signup</a>
            </div>
        </div>
    @endguest
</div>

          <!-- side bar -->
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
                <p><a href="#" class="btn btn-primary btn-md text-white">Author</a></p>
              <h3 class="text-black">About The Author</h3>
              <p>Nama : {{ $post->user->name }}</p>
              <p>Email : {{ $post->user->email }}</p>
            </div>

            <div class="sidebar-box">
              <h3 class="text-black">Quote</h3>
              <p>Ciptakan keunikan dalam kebisingan, menemukan kecantikan dalam ketidakbiasaan, dan mengekspresikan jati diri di tengah keramaian.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-3">INDIE BLOG</h2>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt odio iure animi ullam quam, deleniti rem!</p>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is modified <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Ihpaz Laga Sukanda</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

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
@endsection

