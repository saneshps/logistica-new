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

<section class="home" style="overflow: hidden;">


    <!-- image banner -->
    <!-- <img src="./img/Logestics.jpg" alt="Logestics"> -->
    <!-- image banner -->

    <!-- video banner -->
    @if($banners->banner_type=='video')
    <video class="video-bg" autoplay muted loop playsinline>
        <source src="{{env('APP_ADMIN_URL')}}{{$banners->video_filepath}}" type="video/mp4" />
    </video>

    <!--// video banner -->
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @if(isset($banners->bannerDetails))
            @foreach($banners->bannerDetails as $bannerDetail)
            <div class="swiper-slide">
                @php
                $title = "title_".$current_language;
                $content = "content_".$current_language;
                @endphp
                <h3 class="main-head"> {!! $bannerDetail->$title !!}</h3>
                <p> {{ $bannerDetail->$content }}</p>
            </div>
            @endforeach
            @endif

        </div>
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>-->
    </div>
    @else
    @foreach($banners->bannerDetails as $bannerDetail)
    <!-- image banner -->
    <img src="{{env('APP_ADMIN_URL')}}{{$bannerDetail->file_path}}" alt="team-banner">
    <!-- image banner -->
    @php
    $title='title_'.app()->getLocale();
    @endphp
    <h1> {{$bannerDetail->$title}} </h1>
    @endforeach
    @endif

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
      HERO END
 ===================== -->


<!-- =====================
      SERVICES HOME START
     ===================== -->
<section class="service-boxes-home-area" style="overflow-x: hidden">
    <div class="container">
        <div class="service-boxes-home">
            <div class="row">
                <div class="col-xl-12 mx-auto supplier-box">
                    <div class="swiper serviceiconSwiper">
                        <div class="swiper-wrapper">
                            @foreach($image_icon_services as $image_icon_service)
                            @php
                            $name = "name_".$current_language;
                            $slug = 'slug_'.$current_language;
                            @endphp
                            <div class="swiper-slide">
                                <a class="hover-rotate" href="{{route('service',[$country_code,app()->getLocale(),$image_icon_service->$slug])}}">
                                    <figure class="hover-rotate">
                                        <img src="{{env('APP_ADMIN_URL')}}{{$image_icon_service->image_icon}}" alt="{{$image_icon_service->$name}}">
                                    </figure>
                                    <h5>{{$image_icon_service->$name}} </h5>
                                </a>
                            </div>
                            @endforeach



                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- =====================
      SERVICES HOME END
     ===================== -->


<!-- ========================
       HOME ABOUT AREA START
     ======================= -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='about_us')
@php
$about_us = json_decode($pageSection->section_values, true);

$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$modifiedData = [];
foreach ($about_us as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$modifiedData[$newKey] = $value;

}


foreach($modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$groupArrays[$subarr][$key] = $val;
}

@endphp
<section class="home-about-area" style="overflow-x: hidden">
    <div class="container">
        <div class="row">
            <!-- first -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 about-content">

                <h4 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000"> {{$modifiedData['title_('.app()->getLocale().')']}}
                </h4>

                @if($modifiedData['subtitle_1_('.app()->getLocale().')']!="" || $modifiedData['subtitle_2_('.app()->getLocale().')']!="")
                <h1 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> @if($modifiedData['subtitle_1_('.app()->getLocale().')']!="") {{$modifiedData['subtitle_1_('.app()->getLocale().')']}} <br>@endif
                    {{$modifiedData['subtitle_2_('.app()->getLocale().')']}}
                </h1>
                @endif
                <p class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$modifiedData['content_('.app()->getLocale().')']}}</p>

                <!-- ISO -->
                <!-- <ul class="iso-certified aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">

                    @foreach($groupArrays['image-group'] as $gropupVal)
                    <li> <img src="{{env('APP_ADMIN_URL')}}{{$gropupVal}}" alt="iso certified"> </li>

                    @endforeach

                </ul> -->
                <!-- ISO -->


                <a href="{{route('our-story', [$country_code,app()->getLocale()])}}" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    <span> {{__('read_more')}} </span>
                </a>




                <!-- corporate video -->
                <!-- video popup -->

                <a href="{{$modifiedData['video_link']}}" class="video-play-btn1 popup-video btn2 btn-lg red aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    {{__('corporate_video')}} <i class=" far fa-play-circle circle pulse"></i>
                </a>

                <!--// video popup -->
                <!--// corporate video -->


            </div>
            <!-- first -->

            <!-- second -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 about-pic aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <a data-fancybox="gallery" href="{{env('APP_ADMIN_URL')}}{{$modifiedData['content-image']}}">
                    <img src="{{env('APP_ADMIN_URL')}}{{$modifiedData['content-image']}}" alt="about">
                </a>
            </div>
            <!-- second -->
        </div>
    </div>
</section>
@endif
@endforeach

<!-- ======================
       HOME ABOUT AREA END
     ====================== -->

<!-- ==========================
       HOME SERVICE AREA START
     ========================== -->
<section class="home-services-area" style="overflow-x: hidden">
    <div class="container">
        <h4 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('services')}} </h4>
        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('delivering')}} <br>
            {{__('one_mile')}}
        </h2>

        <div class="row service-box-row">

            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 service-box-pad-main aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="row">
                    @foreach($services_images_top as $keys=>$services_top)
                    @php
                    $name = "name_".$current_language;
                    $slug = "slug_".$current_language;
                    @endphp
                    @if($keys=='0')
                    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <a href="{{route('service', [$country_code,app()->getLocale(), $services_top->$slug])}}">
                            <div class="box">
                                <img src="{{env('APP_ADMIN_URL')}}{{$services_top->default_image}}" alt="services">
                                <div class="box-content">
                                    <h3 class="title"> {{$services_top->$name}} </h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    @elseif($keys=='1')
                    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <a href="{{route('service', [$country_code,app()->getLocale(), $services_top->$slug])}}">
                            <div class="box">
                                <img src="{{env('APP_ADMIN_URL')}}{{$services_top->default_image}}" alt="services">
                                <div class="box-content">
                                    <h3 class="title"> {{$services_top->$name}} </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @elseif($keys=='3')
                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <a href="{{route('service', [$country_code,app()->getLocale(), $services_top->$slug])}}">
                            <div class="box">
                                <img src="{{env('APP_ADMIN_URL')}}{{$services_top->default_image}}" alt="services">
                                <div class="box-content">
                                    <h3 class="title"> {{$services_top->$name}} </h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    @else
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <a href="{{route('service', [$country_code,app()->getLocale(), $services_top->$slug])}}">
                            <div class="box">
                                <img src="{{env('APP_ADMIN_URL')}}{{$services_top->default_image}}" alt="services">
                                <div class="box-content">
                                    <h3 class="title"> {{$services_top->$name}} </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>


            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 service-box-pad-main aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="row">
                    @foreach($services_images_bottom as $keys=>$services_bottom)
                    @php
                    $name = "name_".$current_language;
                    $slug = "slug_".$current_language;
                    @endphp
                    <div class="col-xl-12 service-box-pad">
                        <a href="{{route('service', [$country_code,app()->getLocale(), $services_bottom->$slug])}}">
                            <div class="box">
                                <img src="{{env('APP_ADMIN_URL')}}{{$services_bottom->default_image}}" alt="services">
                                <div class="box-content">
                                    <h3 class="title"> {{$services_bottom->$name}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>



            </div>







        </div>
    </div>
</section>
<!-- ========================
       HOME SERVICE AREA END
     ======================== -->

<!-- ====================================
       HOME EXPRESS INTEREST AREA START
     ==================================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='know_more')
@php
$know_more = json_decode($pageSection->section_values, true);
$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$modifiedData = [];
foreach ($know_more as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$modifiedData[$newKey] = $value;

}

foreach($modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$groupArrays[$subarr][$key] = $val;
}

@endphp
<section class="about-express-interest-area" style="overflow: hidden;">
    <div class="container">
        <div class="express-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <h5> {{$modifiedData['title_('.app()->getLocale().')']}} </h5>
            <h2> {{$modifiedData['subtitle_('.app()->getLocale().')']}} </h2>
            <p> {{$modifiedData['content_('.app()->getLocale().')']}} </p>

            <button href="#" id="btnenq" class="btnenq btn3 btn-lg aos-init aos-animate" data-toggle="modal" data-target="#exampleModalCenterheader">
                <span> {{__('express_now')}} </span>
            </button>


        </div>
</section>
@endif
@endforeach

{{-- <section class="home-express-interest-area" style="overflow: hidden;">
    <div class="container">
        <div class="express-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <h5> Know More </h5>
            <h2> Express your Interests </h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam. </p>

            <button href="#" class="btnenq btn-lg" data-toggle="modal" data-target="#exampleModalCentercntr"> <span>
                    <a>
                        Enquiry </a> </span>
            </button>

            </a>
        </div>
    </div>

    <!-- Modal -->
    <div class="heade-enquiry-box">
        <div class="modal fade" id="exampleModalCentercntr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h3 class="modal-title" id="exampleModalLongTitle"> Business Development Manager - Dubai
                        </h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. </p>
                        <div class="error_request_form"></div>
                        <form id="contact" class="interest_send">

                            <div class="form-bg">
                                <div class="form-container">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="Phone">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <label>City</label>
                                                <select class="form-control">
                                                    <option value="paris">Paris</option>
                                                    <option value="new york">New York</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" rows="4" cols="120" placeholder="Message"></textarea>

                                            </div>
                                        </div>
                                        <button type="button" class="btn6 btn-lg mx-auto d-flex">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</section> --}}

<!-- =================================
       HOME EXPRESS INTEREST AREA END
     ================================== -->


<!-- =================================
       HOME APPLICATION AREA START
     ================================== -->
<section class="home-areas-application" style="overflow: hidden;">
    <div class="container">
        <h4 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000"> {{__('industrial')}} </h4>
        <h2 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('area_appli')}}</h2>

        <ul class="application-boxes-main aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            @foreach($industries as $industry)
            @php
            $name = "name_".$current_language;

            @endphp
            <li>

                <div class="application-box">
                    <img src="{{env('APP_ADMIN_URL')}}{{$industry->image_icon}}" alt="{!! $industry->$name !!}">
                    <h4> {!! $industry->$name !!}</h4>
                </div>

            </li>
            @endforeach




        </ul>

        <!--<div class="button-center-box">-->
        <!--    <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">-->
        <!--        <span> View More </span>-->
        <!--    </a>-->
        <!--</div>-->


    </div>
</section>
<!-- =================================
       HOME APPLICATION AREA END
     ================================== -->

<!-- =================================
       HOME AFFILIATION AREA START
     ================================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='home_affliations')
@php
$our_story_affliations = json_decode($pageSection->section_values, true);

$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$modifiedData = [];
foreach ($our_story_affliations as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$our_story_affliations_modifiedData[$newKey] = $value;

}


foreach($our_story_affliations_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$our_story_affliations_groupArrays[$subarr][$key] = $val;
}

@endphp
<section class="about-affiliation-area" style="overflow-x: hidden">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_story_affliations_modifiedData['title_('.app()->getLocale().')']}}
        </h2>
        <h4 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_story_affliations_modifiedData['subtitle_('.app()->getLocale().')']}}
        </h4>

        <div class="row about-affiliation-main-boxes aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">

            @php
            $i=1;

            @endphp

            @foreach($our_story_affliations_groupArrays['image'] as $experience_data)
            @if ($experience_data!='0')

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 about-affiliation-box">
                <img src="{{env('APP_ADMIN_URL')}}{{$experience_data}}" alt="IATA">

            </div>
            @endif

            @php
            $i++;

            @endphp
            @endforeach
            <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 about-affiliation-box">
                <img src="./img/affiliation/IATA.png" alt="IATA">
                <p> Member of International
                    Air Transport Association (IATA) </p>
            </div> -->
            <!-- 
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 about-affiliation-box">
                <img src="./img/affiliation/more.png" alt="affiliation">
                <p> Enkay Express has over 80 associates and agents in more than 260 gateways, worldwide. </p>
            </div> -->

            <div class="col-xl-12">
                <!--<h5> Enkay Express has successfully Managed the Intricate Logistics of more than <br> 75 turn-key-->
                <!--    projects in the region. </h5>-->
            </div>
        </div>
    </div>
</section>
@endif

@endforeach

<!-- =================================
       HOME AFFILIATION AREA END
     ================================== -->

<!-- =========================
       HOME BLOGS AREA START
     ========================= -->
@if(count($blogs) > 0)
<section class="home-blogs-area" style="overflow: hidden;">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('blogs')}}</h2>

        <!--  -->
        <div class="swiper homeblogSwiper aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <div class="swiper-wrapper">
                @foreach($blogs as $blog)
                @php
                $title='title_'.app()->getLocale();
                $slug ='short_code_'.app()->getLocale();
                @endphp
                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="{{ route('blog-details', ['country'=>$country_code,'locale' => app()->getLocale(), 'slug' => $blog->$slug]) }}" class="over-layer"><img src="{{env('APP_ADMIN_URL')}}{{$blog->image_url}}" alt="{{$blog->$title}}"></a>
                        </div>

                        <div class="post-content">
                            <span class="post-date">{{date('M d,Y', strtotime($blog->created_at))}}</span>
                            <h5 class="post-title"><a href="{{ route('blog-details', ['country'=>$country_code,'locale' => app()->getLocale(), 'slug' => $blog->$slug]) }}">{{$blog->$title}}</a></h5>


                        </div>
                    </div>
                </div>
                @endforeach












            </div>
            <div class="swiper-pagination"></div>
        </div>


        <div class="button-center-box mt-3">
            <a href="{{route('blogs',[$country_code,app()->getLocale()])}}" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <span> {{__('view_more')}} </span>
            </a>
        </div>

    </div>
</section>
@endif
<!-- =======================
       HOME BLOGS AREA END
     ======================= -->

<!-- ===============================
       HOME SOCIAL FEEDS AREA START
     =============================== -->
<!--<section class="home-social-feeds-area" style="overflow: hidden;">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-7 col-lg-7 col-md-12 social-feeds-slides aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">-->

<!--                <div class="social-feeds-box">-->


<!--                    <div class="col">-->
<!--                        <div class="swiper-container">-->
<!--                            <div class="swiper-wrapper">-->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->


<!--                                </div>-->
<!-- image box -->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-2.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!-- image box -->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-3.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!-- image box -->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!-- image box -->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-2.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!-- image box -->

<!-- image box -->
<!--                                <div class="swiper-slide">-->
<!--                                    <div class="imgBox">-->
<!--                                        <img src="./img/social-feeds/social-feeds-3.jpg" alt="social media">-->
<!--                                    </div>-->
<!--                                    <div class="details">-->

<!--                                        <div class="likes">-->
<!--                                            <ul>-->
<!--                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>-->
<!--                                                <li> <a href="#"> 4567 </a> </li>-->
<!--                                                <li> <a href="#"> Likes </a> </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="social-icon">-->
<!--                                            <a href="#"> <i class="fab fa-instagram"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!-- image box -->
<!--                            </div>-->
<!-- <div class="swiper-pagination">
<!--                        </div> -->
<!--                        </div>-->
<!--                    </div>-->







<!--                </div>-->

<!--            </div>-->
<!--            <div class="col-xl-5 col-lg-5 col-md-12 social-feeds-content aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">-->
<!--                <h4> Social Feeds </h4>-->
<!--                <h2> Connect with us </h2>-->
<!--                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
<!--                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco-->
<!--                    laboris nisi ut aliquip ex ea commodo consequat. t velit esse cillum dolore eu fugiat nulla-->
<!--                    pariatur. </p>-->
<!--                <div class="button-center-box mt-3">-->
<!--                    <a href="social-feeds.html" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">-->
<!--                        <span> View More </span>-->
<!--                    </a>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- ==============================
       HOME SOCIAL FEEDS AREA END
     ============================== -->


<!-- ==============================
  OUR SUPPLIERS HOME AREA START
   =============================== -->
<!--{{-- <section class="supplier-home-area">-->
<!--    <div class="container">-->

<!--        <div class="row supplier-home-head">-->
<!--            <h2> Our world wide customers </h2>-->
<!-- button -->
<!--            <div class="hero-button">-->
<!--                <a href="#" class="btn btn-lg">-->
<!--                    <span> View More </span>-->
<!--                </a>-->
<!--            </div>-->
<!-- button -->

<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-xl-12 mx-auto supplier-box">-->
<!--                <div class="swiper supplierSwiper">-->
<!--                    <div class="swiper-wrapper">-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-1.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-2.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-3.jpg" alt="clients" />-->
<!--                        </div>-->

<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-4.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-1.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-2.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-3.jpg" alt="clients" />-->
<!--                        </div>-->

<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-4.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-1.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-2.jpg" alt="clients" />-->
<!--                        </div>-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-3.jpg" alt="clients" />-->
<!--                        </div>-->

<!--                        <div class="swiper-slide">-->
<!--                            <img src="./img/clients/logo-4.jpg" alt="clients" />-->
<!--                        </div>-->



<!--                    </div>-->

<!--                    <div class="swiper-button-next"></div>-->
<!--                    <div class="swiper-button-prev"></div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->

<!--    </div>-->
<!--</section> --}}-->

<!-- ==============================
    OUR SUPPLIERS HOME AREA END
   =============================== -->


<!-- ==========================
       HOME OFFICES AREA START
     ========================== -->
<section class="home-offices-area" style="overflow: hidden;">
    <div class="container">

        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('our_offices')}} </h2>
        <div class="row justify-content-center">
            @foreach($branches as $branch)
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="box">
                    @php
                    $display_loc='display_loc_'.app()->getLocale();
                    $default_address='address_'.app()->getLocale();
                    $default_branch='branch_name_'.app()->getLocale();
					
                    @endphp

                    <img src="{{env('APP_ADMIN_URL')}}{{$branch->image_url}}" alt="{{$branch->$display_loc}}">
                    <div class="box-content">
                        <span class="post">
                            {!! $branch->default_value->$default_branch !!}<br>
                            {!! $branch->default_value->$default_address !!}
                        </span>
                        <ul class="icon">
                            @if($country_code == $branch->short_code )
                            <li><a href="{{route('our-story', [$country_code,app()->getLocale()])}}"><i class="fa fa-link"></i></a></li>
                            @else
                            <li><a href="{{route('branch',[$country_code,app()->getLocale(), $branch->short_code])}}"><i class="fa fa-link"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
			
                @if($country_code == Str::lower($branch->short_code) )
                <h3 class="country"> <a href="{{route('our-story', [$country_code,app()->getLocale()])}}"> {{$branch->$display_loc}} </a> </h3>
                @else
                <h3 class="country"> <a href="{{route('branch',[$country_code,app()->getLocale(), $branch->short_code])}}"> {{$branch->$display_loc}} </a> </h3>
                @endif
            </div>
            @endforeach






        </div>
    </div>
</section>
<!-- ========================
       HOME OFFICES AREA END
     ======================== -->

<!-- ==================================
       HOME BOOK YOUR CARGO AREA START
     =================================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='home_page_book_your_service')
@php
$home_page_book_your_service = json_decode($pageSection->section_values, true);
$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$our_affiliations_modifiedData = [];
foreach ($home_page_book_your_service as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$home_page_book_your_service_modifiedData[$newKey] = $value;

}

foreach($home_page_book_your_service_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$home_page_book_your_service_modifiedData_groupArrays[$subarr][$key] = $val;
}

@endphp
@php
$title='title_('.app()->getLocale().')';
$content='content_('.app()->getLocale().')';
$subtitle='subtitle_('.app()->getLocale().')';
$linktext='linktext_('.app()->getLocale().')';
$image =env('APP_ADMIN_URL'). $home_page_book_your_service_modifiedData['image'];
@endphp

<style>
    .home-book-cargo-area {
        background: url({{$image}});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<section class="home-book-cargo-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-xl-7"></div>
            <div class="col-xl-5 book-cargo-second aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <h4> {{$home_page_book_your_service_modifiedData[$title]}} </h4>
                <h2> {{$home_page_book_your_service_modifiedData[$subtitle]}} </h2>
                <p> {{$home_page_book_your_service_modifiedData[$content]}} </p>
                <a href="{{route('contact', [$country_code,app()->getLocale()])}}" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    <span> {{$home_page_book_your_service_modifiedData[$linktext]}}</span>
                </a>
            </div>
        </div>
    </div>

</section>
@endif
@endforeach
@endsection