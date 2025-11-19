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
<section class="home sub-page no-banner" style="overflow: hidden;">
    <!-- image banner -->
    <!-- <img src="./img/about/board-of-directors-banner.jpg" alt="board-of-directors"> -->
    <!-- image banner -->
    <h1> {{__('frequently_asked_question')}} </h1>

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
          HERO END
     ===================== -->

<!-- ========================
          DIRECTOR SECTION START
         ======================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='faq')
@php
$faq_content = json_decode($pageSection->section_values, true);

$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$faq_content_modifiedData = [];
foreach ($faq_content as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$faq_content_modifiedData[$newKey] = $value;

}



foreach($faq_content_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$faq_content_groupArrays[$subarr][$key] = $val;
}


@endphp
<section class="faq-area">
    <div class="container">
        <div class="row">
            @php
            // Filter elements to include only those containing "(en)"
            $keysWithfaq = array_filter(array_keys($faq_content_groupArrays['title']), function ($key) {
            return strpos($key,"(".app()->getLocale().")") !== false;
            });
            $keysWithfaqContent = array_filter(array_keys($faq_content_groupArrays['content']), function ($key) {
            return strpos($key,"(".app()->getLocale().")") !== false;
            });


            $i=1;
            @endphp
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div id="accordion">
                    @foreach($keysWithfaq as $keys => $serviceCustomer)

                    <div class="accordion">
                        <input type="radio" name="radacc" class="accordian-chk" {{($i=='1'?'checked':'')}} />
                        <h4 class="accordian-header active">
                            {{$faq_content_groupArrays['title'][$serviceCustomer]}}
                            <span class="acc-icon"></span>
                        </h4>
                        <div class="accordian-content" tabindex="2" style="overflow: scroll;">
                            {!! $faq_content_groupArrays['content'][$keysWithfaqContent[$keys]] !!}
                        </div>
                    </div>
                    @php $i++ @endphp
                    @endforeach

                    <!--<div class="accordion">-->
                    <!--    <input type="radio" name="radacc" class="accordian-chk" />-->
                    <!--    <h4 class="accordian-header">-->
                    <!--        Section 2-->
                    <!--        <span class="acc-icon"></span>-->
                    <!--    </h4>-->
                    <!--    <div class="accordian-content">-->
                    <!--        <p>-->
                    <!--            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet-->
                    <!--            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor-->
                    <!--            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In-->
                    <!--            suscipit faucibus urna.-->
                    <!--        </p>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--<div class="accordion">-->
                    <!--    <input type="radio" name="radacc" class="accordian-chk" />-->
                    <!--    <h4 class="accordian-header">-->
                    <!--        Section 3-->
                    <!--        <span class="acc-icon"></span>-->
                    <!--    </h4>-->
                    <!--    <div class="accordian-content">-->
                    <!--        <p>-->
                    <!--            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet-->
                    <!--            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor-->
                    <!--            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In-->
                    <!--            suscipit faucibus urna.-->
                    <!--        </p>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>


    </div>
</section>
@endif
@endforeach
@endsection