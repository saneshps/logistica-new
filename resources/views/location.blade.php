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
    <!-- image banner -->
    <img src="{{env('APP_ADMIN_URL')}}{{$bannerDetail->file_path}}" alt="team-banner">
    <!-- image banner -->
    @php
    $title='title_'.app()->getLocale();
    @endphp
    <h1> {{$bannerDetail->$title}} </h1>
    @endforeach
    <!-- image banner -->

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>
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


<!-- ==============================
           LOCATION ADDRESS AREA START
         ============================== -->
<section class="loaction-address-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">


            @foreach($branches as $branch)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 loaction-address-box aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                @php
                $name = 'name_'.app()->getLocale();
                @endphp
                <h2> {{ $branch->country->$name }} </h2>
                @foreach($branch->branch_offices as $branch_office)
                @php
                $address_display_value = 'address_display_value_'.app()->getLocale();
                $display_loc='display_loc_'.app()->getLocale();
                $default_address='address_'.app()->getLocale();
                $default_branch='branch_name_'.app()->getLocale();
                @endphp

                @if($branch_office->$address_display_value!="") <h3 class="first-3"> {{ $branch_office->$address_display_value}}</h3> @endif
                <h4> {!! $branch_office->$default_branch !!} </h4>

                <p> {!! $branch_office->$default_address !!} </p>

                <p> {{__('tel')}} : {{ $branch_office->phone }}@if($branch_office->id===3)
                ({{__('airport')}})
                @endif <br>
                    {{__('fax')}}: {{ $branch_office->fax }} </p>
                @if($branch_office->map_link!="")
                <div class="map-icon">
                    <a href="{{$branch_office->map_link}}" target="_blank"> <i class="fas fa-map-marker-alt"></i> </a>
                </div><br>
                @endif
                @endforeach

            </div>

            @endforeach







        </div>
</section>
<!-- =============================
           LOCATION ADDRESS AREA END
         ============================= -->


<!-- ====================
             MAP AREA START
         ===================== -->
<!--<section id="map" class="map-area">
{!! $branch_office->map !!}
</section>-->
<!-- ======================
      DIRECTOR SECTION END
     ====================== -->
@endsection
