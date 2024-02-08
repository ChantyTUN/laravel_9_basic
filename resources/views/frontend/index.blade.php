@extends('frontend.main_master')
@section('main')
  <!-- ======= Hero Section ======= -->
  @include('frontend.homepage.home')
  <!-- End Hero Section -->
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container-fluid">

    <div class="row gy-4 justify-content-center">

        @foreach(@$dataHome as $item)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset(@$item->image) }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="{{ asset(@$item->image) }}" title="{{ @$item->title }}" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                
                <a href="{{ url('/frontend/blog-detail',@$item->id.'-'.@$item->slug) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Gallery Item -->
    </div>

    </div>
</section>
<!-- End Gallery Section -->
@endsection
