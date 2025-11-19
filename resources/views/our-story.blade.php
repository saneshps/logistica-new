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
    @foreach($banner->bannerDetails as $bannerDetail)
    <img src="{{env('APP_ADMIN_URL')}}{{$bannerDetail->file_path}}" alt="about">
    @endforeach
    <!-- image banner -->

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='our_story_about_us')
@php
$our_story_about_us = json_decode($pageSection->section_values, true);


$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$our_story_about_us_modifiedData = [];
foreach ($our_story_about_us as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$our_story_about_us_modifiedData[$newKey] = $value;

}

foreach($our_story_about_us_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$our_story_about_us_groupArrays[$subarr][$key] = $val;
}


@endphp
<section class="about-page-area" style="overflow-x: hidden">
    <div class="container">
        <div class="row">
            <!-- first -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 about-content">

                <h2 class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$our_story_about_us_modifiedData['title_('.app()->getLocale().')']}}
                </h2>
                @php
                // Filter elements to include only those containing "(en)"
                $keysWith = array_filter(array_keys($our_story_about_us_groupArrays['content']), function ($key) {
                return strpos($key,"(".app()->getLocale().")") !== false;
                });

                @endphp
                @foreach($keysWith as $gropupVal)

                <p class="aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    {{$our_story_about_us_groupArrays['content'][$gropupVal]}}

                </p>

                @endforeach

            </div>
            <!-- first -->

            <!-- second -->
            @php
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $our_story_about_us_modifiedData['video'], $match);
            $youtube_id = $match[1];
            @endphp
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 about-pic aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <img src="http://img.youtube.com/vi/{{$youtube_id}}/hqdefault.jpg" alt="about">

                <!-- video popup -->
                <a href="{{$our_story_about_us_modifiedData['video']}}" class="video-play-btn1 popup-video btn4 btn-lg abt aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    <i class=" far fa-play-circle circle pulse"></i>
                </a>

                <!--// video popup -->
            </div>
            <!-- second -->
        </div>
    </div>
</section>
@endif

<!-- ======================
        ABOUT AREA END
     ====================== -->

<!-- ======================
       HISTORY AREA START
     ====================== -->
<!--@if($pageSection->section_code=='our_story_history') @endif     -->
@if($pageSection->section_code=='not_our_story_history')
@php
$our_story_history = json_decode($pageSection->section_values, true);


$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$our_story_history_modifiedData = [];
foreach ($our_story_history as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$our_story_history_modifiedData[$newKey] = $value;

}





@endphp
<section class="history-area" style="overflow-x: hidden">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_story_history_modifiedData['title_('.app()->getLocale().')']}}
        </h2>
        <p class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_story_history_modifiedData['content_('.app()->getLocale().')']}}
        </p>
    </div>
</section>
@endif


<!-- ======================
       HISTORY AREA END
     ====================== -->


<!-- ======================
       TIMELINE AREA START 2
     ====================== -->
@if($pageSection->section_code=='our_history_timeline')
@php
$our_history_timeline = json_decode($pageSection->section_values, true);


$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$our_history_timeline_modifiedData = [];
foreach ($our_history_timeline as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$our_history_timeline_modifiedData[$newKey] = $value;

}

foreach($our_history_timeline_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$our_history_timeline_groupArrays[$subarr][$key] = $val;
}


@endphp
<section class="home-timeline-area" style="overflow-x: hidden">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_history_timeline_modifiedData['section_title_('.app()->getLocale().')']}}
        </h2>
        <div class="home-timeline aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <div class="swiper timelineSwiper">
                <div class="swiper-wrapper">

                    <!--  -->
                    @php
                    // Filter elements to include only those containing "(en)"
                    $keysWithtimeline = array_filter(array_keys($our_history_timeline_groupArrays['title']), function ($key) {
                    return strpos($key,"(".app()->getLocale().")") !== false;
                    });
                    $i=1;

                    @endphp

                    @foreach($keysWithtimeline as $singleTimeline)
                    <div class="swiper-slide">
                        <h3> {{$our_history_timeline_groupArrays['year']['year_'.$i.'']}} </h3>
                        <h5> {{$our_history_timeline_groupArrays['title'][$singleTimeline]}} </h5>
                    </div>
                    @php $i++; @endphp
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
</section>
@endif

<!-- ======================
       TIMELINE AREA END
     ====================== -->

<!-- ===============================
       ABOUT AFFILIATION AREA START
     =============================== -->
@if($pageSection->section_code=='our_story_affliations')
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
<!-- ==============================
       ABOUT AFFILIATION AREA END
     ============================== -->

<!-- ====================================
       ABOUT EXPRESS INTEREST AREA START
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
<section class="about-express-interest-area" style="overflow: hidden;">
    <div class="container">
        <div class="express-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <h5> {{$modifiedData['title_('.app()->getLocale().')']}} </h5>
            <h2> {{$modifiedData['subtitle_('.app()->getLocale().')']}} </h2>
            <p> {{$modifiedData['content_('.app()->getLocale().')']}} </p>

            <button href="#" id="btnenq" class="btnenq btn3 btn-lg aos-init aos-animate" data-toggle="modal" data-target="#exampleModalCenterheader">
                <span> {{__('express_now')}}</span>
            </button>
        </div>
    </div>
</section>
@endif
@endforeach
@push('scripts')
<script src="{{asset('assets/js/timeline.js')}}"></script>
@endpush

@endsection