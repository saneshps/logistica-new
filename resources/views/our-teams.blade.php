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
    @foreach($banner->bannerDetails as $bannerDetail)
    <!-- image banner -->
    <img src="{{env('APP_ADMIN_URL')}}{{$bannerDetail->file_path}}" alt="team-banner">
    <!-- image banner -->
    @php
    $title='title_'.app()->getLocale();
    @endphp
    <h1> {{$bannerDetail->$title}} </h1>
    @endforeach

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
      HERO END
 ===================== -->

<!-- ========================
         OUR TEAM START
     ======================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='our_team')
@php
$our_team = json_decode($pageSection->section_values, true);


$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$our_team_modifiedData = [];
foreach ($our_team as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$our_team_modifiedData[$newKey] = $value;

}


foreach($our_team_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$our_team_groupArrays[$subarr][$key] = $val;
}


@endphp
<section class="our-team-area" style="overflow: hidden;">
    <div class="container">
        <h2 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_team_modifiedData['our_team_title_('.app()->getLocale().')']}}
        </h2>
        <p class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            {{$our_team_modifiedData['our_team_content_('.app()->getLocale().')']}}
        </p>


        <div class="department-area">
            <h2 class="aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$our_team_modifiedData['department_title_('.app()->getLocale().')']}} </h2>
            <p class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{$our_team_modifiedData['department_content_('.app()->getLocale().')']}}
            </p>
        </div>

        <div class="department-boxes">
            <div class="row justify-content-center aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                @foreach($departments as $department)
                @php
                $name='name_'.app()->getLocale();

                @endphp
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 department-box">
                    <div class="box">
                        <a data-fancybox="gallery" href="{{env('APP_ADMIN_URL')}}{{$department->image_url}}">
                            <img src="{{env('APP_ADMIN_URL')}}{{$department->image_url}}" alt="department">
                        </a>
                        <div class="box-content">
                            <h5> {{$department->$name}} </h5>

                        </div>

                    </div>

                    <h4> {{$department->$name}} </h4>

                </div>
                @endforeach











            </div>
        </div>
    </div>
</section>
@endif
@endforeach
@php
$path =env('APP_ADMIN_URL');
$file = "others/our-team.jpg";
@endphp
<style>
    .part-of-team {

        background: url({{$path}}{{$file}});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<section class="part-of-team">
    <h2> {{__('intrested')}} </h2>
    <div class="button-center-box mt-3">
        <a href="{{route('careers', [$country_code,app()->getLocale()])}}" class="btn6 btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <span> {{__('apply_now_1')}} </span>
        </a>
    </div>
</section>
@endsection