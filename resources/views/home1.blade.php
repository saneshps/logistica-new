@extends('layouts.app')
@section('content')
<section class="home" style="overflow: hidden;">
    <!-- image banner -->
    <img src="./img/Logestics.jpg" alt="Logestics">
    <!-- image banner -->
    <!-- video banner -->
    <!-- <video class="video-bg" autoplay muted loop>
            <source src="./img/service-video-banner.mp4" type="video/mp4" />
        </video> -->
    <!--// video banner -->
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <h1 class="main-head"> Seamless Logistics, <br>
                    Infinite Possibilities </h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. t velit esse cillum dolore eu fugiat nulla
                    pariatur.</p>
            </div>
            <div class="swiper-slide">
                <h2 class="main-head"> Seamless Logistics, <br>
                    Infinite Possibilities </h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. t velit esse cillum dolore eu fugiat nulla
                    pariatur.</p>
            </div>
        </div>
        <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>-->
    </div>

    <!-- social media -->
    <div class="social-media-hero">
        <ul>
            <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
            <li> <a href="#"> <i class="fab fa-facebook-f"></i></a> </li>
            <li> <a href="#"> <i class="fab fa-twitter"></i></a> </li>
            <li> <a href="#"> <i class="fab fa-linkedin-in"></i> </a> </li>
            <li> <a href="#"> <i class="fab fa-youtube"></i> </a> </li>
        </ul>
    </div>
    <!-- social media -->
</section>

<!-- =====================
          HERO END
     ===================== -->


<!-- =====================
          SERVICES HOME START
         ===================== -->


@foreach($pageSections as $pageSection)
<section class="service-boxes-home-area" style="overflow-x: hidden">
    <div class="container">
        <div class="service-boxes-home aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <ul>
                <li> <a href="#"> <img src="./img/air-plane.png" alt="services">
                        <h5> Air Freight </h5>
                    </a> </li>
                <li> <a href="#"> <img src="./img/sea-freight.png" alt="services">
                        <h5> Sea Freight </h5>
                    </a> </li>
                <li> <a href="#"> <img src="./img/land-transportation.png" alt="services">
                        <h5> Land Transportation </h5>
                    </a> </li>
                <li> <a href="#"> <img src="./img/warehouse.png" alt="services">
                        <h5> Warehousing </h5>
                    </a> </li>
                <li> <a href="#"> <img src="./img/distribution.png" alt="services">
                        <h5> Distribution </h5>
                    </a> </li>
            </ul>
        </div>
    </div>
</section>
{{-- @endif --}}

<!-- =====================
          SERVICES HOME END
         ===================== -->

<!-- ========================
           HOME ABOUT AREA START
         ======================= -->
 @if($pageSection->section_code=='about_us')
 @php
   $about_us = json_decode($pageSection->section_values, true);
   //echo"<pre>";
//print_r($about_us);
//exit;

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
//echo"<pre>";
//print_r($modifiedData);
//exit;

foreach($modifiedData as $key => $val){
    //$length = length($key);
    $subarr = substr($key,0, strpos($key, "_"));
    $groupArrays[$subarr][$key] = $val;
}
// echo"<pre>";
// print_r($groupArrays);
// exit;

 @endphp
    <section class="home-about-area" style="overflow-x: hidden">
        <div class="container">
            <div class="row">
                <!-- first -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 about-content">
                    <h4 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000"> {{$modifiedData['title_('.app()->getLocale().')']}}
                    </h4>
                    <h2 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$modifiedData['subtitle_1_('.app()->getLocale().')']}} <br>
                        {{$modifiedData['subtitle_2_('.app()->getLocale().')']}}
                    </h2>
                    <p class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">  {{$modifiedData['content_('.app()->getLocale().')']}}</p>

                    <!-- ISO -->
                    <ul class="iso-certified aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">

                        @foreach($groupArrays['image-group'] as $gropupVal)
                          <li> <img src="{{env('APP_ADMIN_URL')}}{{$gropupVal}}" alt="iso certified"> </li>

                        @endforeach

                    </ul>
                    <!-- ISO -->


                    <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                        <span> Read More </span>
                    </a>




                    <!-- corporate video -->
                    <!-- video popup -->

                    <a href="https://www.youtube.com/watch?v=EtJFWFBEn88" class="video-play-btn1 popup-video btn2 btn-lg red aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                        Corporate Video <i class=" far fa-play-circle circle pulse"></i>
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

<!-- ======================
           HOME ABOUT AREA END
         ====================== -->

<!-- ==========================
           HOME SERVICE AREA START
         ========================== -->

<section class="home-services-area" style="overflow-x: hidden">
    <div class="container">
        <h4 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> Services </h4>
        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> Delivering Excellence, <br>
            One Mile at a Time. </h2>

        <div class="row service-box-row">

            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 service-box-pad-main aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service1.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Air Freight </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service2.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Land Transportation </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service4.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Sea Freight </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service5.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Warehousing </h3>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 service-box-pad-main aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="row">
                    <div class="col-xl-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service3.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Distribution</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 service-box-pad">
                        <div class="box">
                            <img src="./img/services/home-service6.jpg" alt="services">
                            <div class="box-content">
                                <h3 class="title"> Customs Brokerage </h3>
                            </div>
                        </div>
                    </div>
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
<section class="home-express-interest-area" style="overflow: hidden;">
    <div class="container">
        <div class="express-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <h5> {{$modifiedData['title_('.app()->getLocale().')']}} </h5>
            <h2> {{$modifiedData['subtitle_('.app()->getLocale().')']}} </h2>
            <p> {{$modifiedData['content_('.app()->getLocale().')']}} </p>

            <a href="#" class="btn3 btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <span> Express Now </span>
            </a>
        </div>
    </div>
</section>
@endif


<!-- =================================
           HOME EXPRESS INTEREST AREA END
         ================================== -->


<!-- =================================
           HOME APPLICATION AREA START
         ================================== -->
@if($pageSection->section_code=='home_industrial_experiences')
@php
           $home_industrial_experiences = json_decode($pageSection->section_values, true);
           $slug=$pageSection->section_type->slug;

        // String to remove from the keys
           $stringToRemove = $slug.'_';
        // Initialize an empty array for the modified data
           $home_industrial_experiences_modifiedData = [];
        foreach ($home_industrial_experiences as $key => $value) {
        // Remove the specified string from the key
        $newKey = str_replace($stringToRemove, '', $key);
        // Assign the value to the new key in the modified data
        $home_industrial_experiences_modifiedData[$newKey] = $value;

        }

        foreach($home_industrial_experiences_modifiedData as $key => $val){
            //$length = length($key);
            $subarr = substr($key,0, strpos($key, "_"));
            $home_industrial_experiences_modifiedData_groupArrays[$subarr][$key] = $val;
        }



         @endphp
<section class="home-areas-application" style="overflow: hidden;">
    <div class="container">
        <h4 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000"> {{$home_industrial_experiences_modifiedData['title_('.app()->getLocale().')']}} </h4>
        <h2 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$home_industrial_experiences_modifiedData['subtitle_('.app()->getLocale().')']}} </h2>

        <ul class="application-boxes-main aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            @php
            $i=1;

            @endphp

            @foreach($home_industrial_experiences_modifiedData_groupArrays['image'] as  $experience_data)
                <li>
                    <a href="#">
                        <div class="application-box">

                            <img src="{{env('APP_ADMIN_URL')}}{{$experience_data}}" alt="technology-and-electronics">
                            <h4> {!! $home_industrial_experiences_modifiedData_groupArrays['image-title']['image-title_'.$i.'_('.app()->getLocale().')'] !!} </h4>
                        </div>
                    </a>
                </li>
            @php
            $i++;
            @endphp
            @endforeach



        </ul>

        <div class="button-center-box">
            <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <span> View More </span>
            </a>
        </div>


    </div>
</section>
@endif

<!-- =================================
           HOME APPLICATION AREA END
         ================================== -->

<!-- =================================
           HOME AFFILIATION AREA START
         ================================== -->
  @if($pageSection->section_code=='our_affiliations')
         @php
                    $our_affiliations = json_decode($pageSection->section_values, true);
                    $slug=$pageSection->section_type->slug;

                 // String to remove from the keys
                    $stringToRemove = $slug.'_';
                 // Initialize an empty array for the modified data
                    $our_affiliations_modifiedData = [];
                 foreach ($our_affiliations as $key => $value) {
                 // Remove the specified string from the key
                 $newKey = str_replace($stringToRemove, '', $key);
                 // Assign the value to the new key in the modified data
                 $our_affiliations_modifiedData[$newKey] = $value;

                 }

                 foreach($our_affiliations_modifiedData as $key => $val){
                     //$length = length($key);
                     $subarr = substr($key,0, strpos($key, "_"));
                     $our_affiliations_modifiedData_groupArrays[$subarr][$key] = $val;
                 }

@endphp
<section class="home-affiliation-area" style="overflow: hidden;">
    <div class="container">
        <div class="row home-affiliation-row">
            <div class="col-xl-5 col-lg-5 col-md-12 aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="home-affiliation">
                    <h4> {{$our_affiliations_modifiedData['title_('.app()->getLocale().')']}}</h4>
                    <h2>{{$our_affiliations_modifiedData['subtitle_('.app()->getLocale().')']}} </h2>
                    <p>
                        {{$our_affiliations_modifiedData['content_('.app()->getLocale().')']}}

                    </p>

                </div>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-12 aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="home-affiliation-content">

                    <div class="swiper affiliationSwiper">
                        <div class="swiper-wrapper">
                            @php
                            $i=1;

                            @endphp

                            @foreach($our_affiliations_modifiedData_groupArrays['image'] as  $experience_data)
                                <div class="swiper-slide">
                                    <img src="{{env('APP_ADMIN_URL')}}{{$experience_data}}" alt="IATA">
                                    <p> {{ $our_affiliations_modifiedData_groupArrays['image-title']['image-title_'.$i.'_('.app()->getLocale().')'] }}  </p>
                                </div>
                                @php
                                $i++;

                                @endphp
                            @endforeach







                        </div>
                        <div class="swiper-pagination"></div>
                    </div>


                    <!-- <div
                            class="swiper affiliationSwiper swiper-initialized swiper-horizontal swiper-pointer-events">
                            <div class="swiper-wrapper" id="swiper-wrapper-3bc7f80805474a68" aria-live="off"
                                style="transform: translate3d(-511.333px, 0px, 0px); transition-duration: 0ms;">

                                <div class="swiper-slide" role="group" aria-label="1/5"
                                    style="width: 205.667px; margin-right: 50px;">
                                    <a href="https://www.kistler-machine.com/de/industries/energie">
                                        <img src="https://cms.kistler-machine.com/storage/industries/PRESSURE-VESSEL-11688112816.jpg"
                                            alt="energy">
                                        <h3> Energy and pressure vessels </h3>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-prev" role="group" aria-label="2/5"
                                    style="width: 205.667px; margin-right: 50px;">
                                    <a href="https://www.kistler-machine.com/de/industries/%C3%96l-und-Gas">
                                        <img src="https://cms.kistler-machine.com/storage/industries/oil-gas-31688118309.jpg"
                                            alt="oil and gas">
                                        <h3> oil and gas </h3>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="3/5"
                                    style="width: 205.667px; margin-right: 50px;">
                                    <a href="https://www.kistler-machine.com/de/industries/schiffbau">
                                        <img src="https://cms.kistler-machine.com/storage/industries/ship-yard11688117212.jpg"
                                            alt="shipbuilding">
                                        <h3> shipbuilding </h3>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-next" role="group" aria-label="4/5"
                                    style="width: 205.667px; margin-right: 50px;">
                                    <a href="https://www.kistler-machine.com/de/industries/windkraft">
                                        <img src="https://cms.kistler-machine.com/storage/industries/wind-mills11688117616.jpg"
                                            alt="Wind power">
                                        <h3> Wind power </h3>
                                    </a>
                                </div>
                                <div class="swiper-slide" role="group" aria-label="5/5"
                                    style="width: 205.667px; margin-right: 50px;">
                                    <a href="https://www.kistler-machine.com/de/industries/rohrwerksausstattung">
                                        <img src="https://cms.kistler-machine.com/storage/industries/pipe-41688112243.jpg"
                                            alt="tube mill equipment">
                                        <h3> Pipework equipment </h3>
                                    </a>
                                </div>



                            </div>

                            <div
                                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                <span class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet"
                                    tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 3" aria-current="true"></span>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
@endif



<!-- =================================
           HOME AFFILIATION AREA END
         ================================== -->

<!-- =========================
           HOME BLOGS AREA START
         ========================= -->

<section class="home-blogs-area" style="overflow: hidden;">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> Blogs </h2>

        <!--  -->
        <div class="swiper homeblogSwiper aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="#" class="over-layer"><img src="./img/blogs/blog-1.jpg" alt="blog"></a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">Jan 5, 2016</span>
                            <h5 class="post-title"><a href="#">Lorem ipsum dolor sit</a></h5>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit..
                            </p>

                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="#" class="over-layer"><img src="./img/blogs/blog-2.jpg" alt="blog"></a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">Jan 5, 2016</span>
                            <h5 class="post-title"><a href="#">Lorem ipsum dolor sit</a></h5>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit..
                            </p>

                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="#" class="over-layer"><img src="./img/blogs/blog-3.jpg" alt="blog"></a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">Jan 5, 2016</span>
                            <h5 class="post-title"><a href="#">Lorem ipsum dolor sit</a></h5>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit..
                            </p>

                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="#" class="over-layer"><img src="./img/blogs/blog-1.jpg" alt="blog"></a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">Jan 5, 2016</span>
                            <h5 class="post-title"><a href="#">Lorem ipsum dolor sit</a></h5>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit..
                            </p>

                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="post-slide">
                        <div class="post-img">
                            <a href="#" class="over-layer"><img src="./img/blogs/blog-2.jpg" alt="blog"></a>
                        </div>
                        <div class="post-content">
                            <span class="post-date">Jan 5, 2016</span>
                            <h5 class="post-title"><a href="#">Lorem ipsum dolor sit</a></h5>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit..
                            </p>

                        </div>
                    </div>
                </div>




            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!--  -->

        <div class="button-center-box mt-3">
            <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <span> View More </span>
            </a>
        </div>

    </div>
</section>
<!-- =======================
           HOME BLOGS AREA END
         ======================= -->

<!-- ===============================
           HOME SOCIAL FEEDS AREA START
         =============================== -->
@if($pageSection->section_code=='social_feeds')
         @php
                    $social_feeds = json_decode($pageSection->section_values, true);
                    $slug=$pageSection->section_type->slug;

                 // String to remove from the keys
                    $stringToRemove = $slug.'_';
                 // Initialize an empty array for the modified data
                    $social_feeds_modifiedData = [];
                 foreach ($social_feeds as $key => $value) {
                 // Remove the specified string from the key
                 $newKey = str_replace($stringToRemove, '', $key);
                 // Assign the value to the new key in the modified data
                 $social_feeds_modifiedData[$newKey] = $value;

                 }

                //  foreach($social_feeds_modifiedData as $key => $val){
                //      //$length = length($key);
                //      $subarr = substr($key,0, strpos($key, "_"));
                //      $our_affiliations_modifiedData_groupArrays[$subarr][$key] = $val;
                //  }

@endphp
<section class="home-social-feeds-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 social-feeds-slides aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">

                <div class="social-feeds-box">


                    <div class="col">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>


                                </div>
                                <!-- image box -->

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- image box -->

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- image box -->

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- image box -->

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- image box -->

                                <!-- image box -->
                                <div class="swiper-slide">
                                    <div class="imgBox">
                                        <img src="./img/social-feeds/social-feeds-1.jpg" alt="social media">
                                    </div>
                                    <div class="details">

                                        <div class="likes">
                                            <ul>
                                                <li> <a href="#"> <i class="fas fa-heart"></i> </a> </li>
                                                <li> <a href="#"> 4567 </a> </li>
                                                <li> <a href="#"> Likes </a> </li>
                                            </ul>
                                        </div>
                                        <div class="social-icon">
                                            <a href="#"> <i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- image box -->
                            </div>
                            <!-- <div class="swiper-pagination">
                            </div> -->
                        </div>
                    </div>







                </div>

            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 social-feeds-content aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <h4> {{$social_feeds_modifiedData['title_('.app()->getLocale().')']}} </h4>
                <h2> {{$social_feeds_modifiedData['subtitle_('.app()->getLocale().')']}} </h2>
                <p>  {{$social_feeds_modifiedData['content_('.app()->getLocale().')']}} </p>
                <div class="button-center-box mt-3">
                    <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                        <span> View More </span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif
@endforeach
<!-- ==============================
           HOME SOCIAL FEEDS AREA END
         ============================== -->

<!-- ==========================
           HOME OFFICES AREA START
         ========================== -->
<section class="home-offices-area" style="overflow: hidden;">
    <div class="container">

        <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> Our Offices </h2>
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="box">
                    <img src="./img/office/Bahrain.jpg" alt="Bahrain">
                    <div class="box-content">
                        <span class="post">
                            ENKAY EXPRESS-BAHRAIN <br>
                            Member of Al Rai Logistica Group <br>
                            Block 224, Road 2406, Building 353, Flat 15 <br>
                            P.O.BOX: 10642 MANAMA, BAHRAIN
                        </span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <h3 class="country"> <a href="#"> Bahrain </a> </h3>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 aos-animate" data-aos="fade-down-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="box">
                    <img src="./img/office/Kuwait.jpg" alt="Kuwait">
                    <div class="box-content">
                        <span class="post">
                            AL RAI LOGISTICA COMPANY <br>
                            P.O. Box 42482, 70655, Shuwaikh <br>
                            State of Kuwait
                        </span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <h3 class="country"> <a href="#"> Kuwait </a> </h3>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <div class="box">
                    <img src="./img/office/UAE.jpg" alt="UAE">
                    <div class="box-content">
                        <span class="post">
                            Enkay Express (Br. of Al Rai Logistica UAE L.L.C) <br>
                            Dubai Airport, Cargo & Logistics (Dubai Cargo Village) <br>
                            Warehouse no.1420 & 1421 <br>
                            PO Box 55393 Dubai, UAE
                        </span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <h3 class="country"> <a href="#"> UAE </a> </h3>
            </div>



        </div>
    </div>
</section>
<!-- ========================
           HOME OFFICES AREA END
         ======================== -->

<!-- ==================================
           HOME BOOK YOUR CARGO AREA START
         =================================== -->
<section class="home-book-cargo-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-xl-7"></div>
            <div class="col-xl-5 book-cargo-second aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <h4> Fast & Reliable </h4>
                <h2> Book your cargo </h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et
                    dolore magna aliqua. </p>
                <a href="#" class="btn btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    <span> Book Now </span>
                </a>
            </div>
        </div>
    </div>

</section>
@endsection
