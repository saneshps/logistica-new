@extends('layouts.app')
@section('meta')
@php
    $meta_title = "meta_title_".$current_language;
    $meta_description = "meta_description_".$current_language;
    $keywords = "keywords_".$current_language;
@endphp
<title>{{$blog->$meta_title}}</title>
<meta name="description" content="{{$blog->$meta_description}}">
<meta name="keywords" content="{{$blog->$keywords}}">
<link rel="alternate" hreflang="{{$current_language}}" href="{{url()->current()}}" />
@endsection
@section('content')
<section class="inner-banner-area" style="overflow: hidden;">
    <div class="container">
        @php
                        $title='title_'.app()->getLocale();
                        $slug ='slug_'.app()->getLocale();
                        $description = 'description_'.app()->getLocale();
                        @endphp
        <h1> {{$blog->$title}} </h1>
        <div class="swiper inner-bannerSwiper blog">
            <div class="swiper-wrapper">

                <div class="swiper-slide aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1200">
                    <a data-fancybox="gallery" href="{{env('APP_ADMIN_URL')}}{{$blog->image_url}}">
                        <img src="{{env('APP_ADMIN_URL')}}{{$blog->image_url}}" alt="blogs">
                    </a>

                </div>


            </div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div> -->
        </div>
    </div>

    <!-- social media -->
   @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =========================
     INNER BANNER AREA END
   ========================= -->

<!-- =========================
      BLOG DETAILS AREA START
   ========================= -->
<section class="blog-details-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="blog-details-box">
                <h3 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1200"> {{date('M d,Y', strtotime($blog->created_at))}} </h3>
                <p class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1200">{!! $blog->$description !!}
                </p>


            </div>
        </div>
    </div>
</section>
@endsection
