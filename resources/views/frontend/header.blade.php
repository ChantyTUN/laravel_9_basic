<!-- php block  -->
@php 
    $footerSocial = App\Models\Footer::find(1);
    $categories =  App\Models\Category::where('status',1)->get();
@endphp 
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1>PhotoFolio</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li class="dropdown">
            <a href="#"><span>Gallery</span> 
              <i class="bi bi-chevron-down dropdown-indicator"></i>
            </a>
            <ul>
              @foreach(@$categories as $item)
              <li>
                <a href="{{ route('frontend.category',$item->id) }}">{{ @$item->category }}</a>
              </li>
              @endforeach
              
            </ul>
          </li>
          <li><a href="{{ route('frontend.service') }}">Services</a></li>
          <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="{{ @$footerSocial->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{ @$footerSocial->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{ @$footerSocial->instragram }}" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{ @$footerSocial->inkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
  