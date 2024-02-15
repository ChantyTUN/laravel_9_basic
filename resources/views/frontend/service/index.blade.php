@extends('frontend.main_master')
@section('main')
 
<main id="main" data-aos="fade" data-aos-delay="1500">

<!-- ======= End Page Header ======= -->
<div class="page-header d-flex align-items-center">
  <div class="container position-relative">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 text-center">
        <h2>Services</h2>
        <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

        <a class="cta-btn" href="contact.html">Available for hire</a>

      </div>
    </div>
  </div>
</div><!-- End Page Header -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="row gy-4">
        @foreach($services as $item)
        <div class="col-xl-3 col-md-6 d-flex">
            <div class="service-item position-relative">
            <i class="{{ @$item->icon }}"></i>
            <h4><a href="" class="stretched-link">{{ @$item->title }}</a></h4>
            <p>{!! @$item->des !!}</p>
            </div>
        </div><!-- End Service Item -->
        @endforeach

    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-header">
      <h2>Prices</h2>
      <p>Check my adorable pricing</p>
    </div>

    <div class="row gy-4 gx-lg-5">

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Portrait Photography</h3>
          <h4>$160.00</h4>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Fashion Photography</h3>
          <h4>$300.00</h4>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Sports Photography</h3>
          <h4>$200.00</h4>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Still Life Photography</h3>
          <h4>$120.00</h4>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Wedding Photography</h3>
          <h4>$500.00</h4>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-6">
        <div class="pricing-item d-flex justify-content-between">
          <h3>Photojournalism</h3>
          <h4>$200.00</h4>
        </div>
      </div><!-- End Pricing Item -->

    </div>
</section><!-- End Pricing Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container">

    <div class="section-header">
      <h2>Testimonials</h2>
      <p>What they are saying</p>
    </div>

@php 
  $test_data = App\Models\Testimonail::where('status',1)->get();
  //dd($test_data);
@endphp
    <div class="slides-3 swiper">
      <div class="swiper-wrapper">

        @foreach(@$test_data as $item)
        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              @for($i = 1 ; $i <= $item->rate ; $i++)
                <i class="bi bi-star-fill"></i>
              @endfor
            </div>
            <p>
              {{ @$item->dec }}
            </p>
            <div class="profile mt-auto">
              <img src="{{ asset( @$item->image) }}" class="testimonial-img" alt="">
              <h3>{{ @$item->name }}</h3>
              <h4>{{ @$item->position }}</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->

</main><!-- End #main -->

@endsection
