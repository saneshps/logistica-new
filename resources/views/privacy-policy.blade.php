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
         @foreach($pageSections as $pageSection)
         @if($pageSection->section_code=='privacy_policy')
         @php
           $privacy_policy_content = json_decode($pageSection->section_values, true);
    
           $slug=$pageSection->section_type->slug;
    
         // String to remove from the keys
           $stringToRemove = $slug.'_';
         // Initialize an empty array for the modified data
         $privacy_policy_content_modifiedData = [];
         foreach ($privacy_policy_content as $key => $value) {
         // Remove the specified string from the key
         $newKey = str_replace($stringToRemove, '', $key);
         // Assign the value to the new key in the modified data
         $privacy_policy_content_modifiedData[$newKey] = $value;
    
         }
   
    
         foreach($privacy_policy_content_modifiedData as $key => $val){
            //$length = length($key);
            $subarr = substr($key,0, strpos($key, "_"));
            $career_content_groupArrays[$subarr][$key] = $val;
         }
    
         @endphp
<section class="home sub-page no-banner" style="overflow: hidden;">
    <!-- image banner -->
    <!-- <img src="./img/about/board-of-directors-banner.jpg" alt="board-of-directors"> -->
    <!-- image banner -->
    <h1> {{$privacy_policy_content_modifiedData['title_('.app()->getLocale().')']}} </h1>

    <!-- social media -->
   @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
      HERO END
 ===================== -->


<!-- ======================
        CAREER AREA START
     ====================== -->
<style>
    .service-content-area ul{
            padding: 0 0 0 20px;
    }
     .service-content-area ul li{
            list-style: square;
            color: #c7c7c7;
            position: relative;
            text-align: left;
            padding: 0 0 0 5px;
            margin: 0 0 7px 10px;
            line-height: 26px;
            font-size: 17px;
    }
    .service-content-area ol{
            padding: 0 0 0 20px;
    }
     .service-content-area ol li{
           
            color: #c7c7c7;
            position: relative;
            text-align: left;
            padding: 0 0 0 5px;
            margin: 0 0 7px 10px;
            line-height: 26px;
            font-size: 17px;
    }
</style>     

<section class="service-content-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 service-box-content aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
              {!! $privacy_policy_content_modifiedData['content_('.app()->getLocale().')'] !!}

            </div>
  

        </div>
    </div>
</section>
@endif
@endforeach

@endsection