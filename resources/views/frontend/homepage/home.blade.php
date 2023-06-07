<!-- php block  -->
@php 
    $homepage = App\Models\HomeInformation::find(1);
@endphp 
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-6 text-center">
        <h2>{{ @$homepage->short_title }}</h2>
        <p>{{ @$homepage->long_title }}</p>
        <a href="{{ @$homepage->url }}" class="btn-get-started">Available for hire</a>
    </div>
    </div>
</div>
</section>