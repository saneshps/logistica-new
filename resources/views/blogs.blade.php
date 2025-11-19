@extends('layouts.app')
@section('meta')
@php
$meta_title = "meta_title_".$current_language;
$meta_description = "meta_description_".$current_language;
$keywords = "keywords_".$current_language;
@endphp
<title>{{$page->$meta_title}}</title>
<meta name="description" content="{{$page->$meta_description}}">
<meta name="keywords" content="{{$page->$keywords}}">
<link rel="alternate" hreflang="{{$current_language}}" href="{{url()->current()}}" />
@endsection
@section('content')
<section class="home sub-page blog-list" style="overflow: hidden;">
    <!-- image banner -->

    <h1> {{__('blogs')}} </h1>


    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
      HERO END
 ===================== -->




<!-- ==========================
         BLOGS AREA START
     ========================== -->
<section class="blogs-list-area" style="overflow: hidden;">
    <div class="container">

        <div class="row">
            @foreach($blogs as $blog)
            @php
            $title='title_'.app()->getLocale();
            $slug ='short_code_'.app()->getLocale();
            @endphp
            <div class="col-xl-4 blog-list-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="post-slide">
                    <div class="post-img">
                        <a href="{{ route('blog-details', [$country_code,app()->getLocale(), $blog->$slug]) }}" class="over-layer">
                            <img src="{{env('APP_ADMIN_URL')}}{{$blog->image_url}}" alt="blog"></a>
                    </div>
                    <div class="post-content">
                        <span class="post-date">{{date('M d,Y', strtotime($blog->created_at))}}</span>

                        <h3 class="post-title"><a href="{{ route('blog-details', [$country_code,app()->getLocale(), $blog->$slug]) }}">{{$blog->$title}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach














        </div>
    </div>
</section>

@endsection