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

<section class="home sub-page" style="overflow: hidden;">
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
                <h4 class="main-head"> {!! $bannerDetail->$title !!}</h4>
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
                            @endphp
                            <div class="swiper-slide">
                                <a class="hover-rotate" href="#">
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

<!-- ===============================
           ABOUT AFFILIATION AREA START
         =============================== -->
@foreach($storypageSections as $storypageSection)
@if($storypageSection->section_code=='our_story_affliations')
@php
$our_story_affliations = json_decode($storypageSection->section_values, true);

$slug=$storypageSection->section_type->slug;

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
            {{$our_story_affliations_modifiedData['title_('.app()->getLocale().')']}} </h2>
        <h4 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
          {{$our_story_affliations_modifiedData['subtitle_('.app()->getLocale().')']}}</h4>

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

            <!--<div class="col-xl-12">-->
            <!--    <h5> Enkay Express has successfully Managed the Intricate Logistics of more than <br> 75 turn-key-->
            <!--        projects in the region. </h5>-->
            <!--</div>-->
        </div>
    </div>
</section>
@endif
@endforeach
<!-- ==============================
               ABOUT AFFILIATION AREA END
             ============================== -->

<!-- ==============================
           MAP BAHRAIN AREA START
         ============================== -->
<section class="map-other-area">
    <div class="container">
        @if($branch_office->map !="")
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-6 map-other">
                {!! $branch_office->map !!}
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 map-other-content">
                @foreach($branch->branch_offices as $branch_office)
                @php
                $address_display_value = 'address_display_value_'.app()->getLocale();
                $display_loc='display_loc_'.app()->getLocale();
                $default_address='address_'.app()->getLocale();
                $default_branch='branch_name_'.app()->getLocale();
                @endphp
                <h5>
                    {!! $branch_office->$default_branch !!}<br>

                    {!! $branch_office->$default_address !!}


                </h5>

                <h5> {{__('tel')}} : <a href="#"> {{ $branch_office->phone }} @if($branch_office->id===3)
                ({{__('airport')}})
                @endif</a> <br>
                    {{__('fax')}} :{{ $branch_office->fax }} </h5>

                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
<!-- ==============================
           MAP BAHRAIN AREA END
         ============================== -->


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

                            @if($upper_country_code == $branch->short_code )
                            <li><a href="{{route('our-story', [$country_code,app()->getLocale()])}}"><i class="fa fa-link"></i></a></li>
                            @else
                            <li><a href="{{route('branch',[$country_code,app()->getLocale(), $branch->short_code])}}"><i class="fa fa-link"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if($upper_country_code == $branch->short_code )
                <h3 class="country"> <a href="{{route('our-story', [$country_code,app()->getLocale()])}}"> {{$branch->$display_loc}} </a> </h3>
                @else
                <h3 class="country"> <a href="{{route('branch',[$country_code,app()->getLocale(), $branch->short_code])}}"> {{$branch->$display_loc}} </a> </h3>
                @endif
            </div>
            @endforeach






        </div>
    </div>
</section>

@endsection
