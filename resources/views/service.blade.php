@extends('layouts.app')
@section('meta')
@php
$meta_title = "meta_title_".$current_language;
$meta_description = "meta_description_".$current_language;
$keywords = "keywords_".$current_language;
@endphp

<title>{{$service_branch->$meta_title}}</title>
<meta name="description" content="{{$service_branch->$meta_description}}">
<meta name="keywords" content="{{$service_branch->$keywords}}">
<link rel="alternate" hreflang="{{$current_language}}" href="{{url()->current()}}" />
@endsection
@section('content')
<section class="inner-banner-area" style="overflow: hidden;">
    <div class="container">
        @php
        $name='name_'.app()->getLocale();
		$slug='slug_'.app()->getLocale();
        $content='content_'.app()->getLocale();

        @endphp
        <h1> {{$service->$name}} </h1>
		@if($service->service_banner_type!="")
        @if($service->service_banner_type=='image')
        <div class="swiper inner-bannerSwiper">
            <div class="swiper-wrapper">
                @foreach($service->service_images as $keys=>$service_image)
                <div class="swiper-slide aos-animate" @if($keys=='0' ) data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200" @endif>
                    <img src="{{env('APP_ADMIN_URL')}}{{$service_image->banner_image}}" alt="{{$service->$name}} ">
                </div>
                @endforeach


            </div>
            <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div> -->
        </div>
        @else
        <video class="video-bg" autoplay muted loop playsinline>
            <source src="{{env('APP_ADMIN_URL')}}{{$service->video_filepath}}" type="video/mp4" />
        </video>
        @endif
		@endif
    </div>

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =========================
         INNER BANNER AREA END
       ========================= -->

<!-- ==============================
           SERVICES CONTENT AREA START
       ================================= -->
<section class="service-content-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 service-box-content aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                {!! $service->$content !!}

            </div>
			@if($service->$slug=='dma-tariff')
			<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 service-box-content aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
		    <br>
		   <div class="row">
		     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <p> {{__('dma-tariff-link-1')}} <br> <a href="https://dtcms.cachefly.net/docs/bus/dma/Administrative-Decision-No-2-2023-English.pdf" target="_blank">https://dtcms.cachefly.net/docs/bus/dma/Administrative-Decision-No-2-2023-English.pdf</a></p>
			 </div>	
			 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                   <p> {{__('dma-tariff-link-2')}} <br> <a href="{{asset('assets/DMA-Tariff.pdf')}}" target="_blank">{{asset('assets/DMA-Tariff.pdf')}}</a></p>
			 </div>	
			</div> 

            </div>
			@endif
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 service-box-menus aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">


                @if($service->parent || count($service->childs) > 0 )

                <ul>

                    <li class="sub-services-button">
					    @if($service->$slug=='dma-tariff'||$service->$slug=='ocean-freight')
                       <h5> {{__('sea_container_charges')}} </h5>
					    @else
						<h5> {{__('warehouse_sub_services')}} </h5>
					    
						@endif	
                    </li>
                    @if(count($service->childs) > 0)
                    @foreach($service->childs as $child_service)
                    @php
                    $name = 'name_'.$current_language;
                    $slug = 'slug_'.$current_language;
                    @endphp
                    @if($child_service->status =='1')
                    <li class="{{($service->id==$child_service->id )? 'active':'' }}"> <i class="fas fa-long-arrow-alt-right"></i> <a href="{{route("service",[$country_code,app()->getLocale(),$child_service->$slug])}}">
                            {{$child_service->$name}}</a> </li>
                    @endif
                    @endforeach
                    @elseif(count($service->parent->childs)>0)
                    @foreach($service->parent->childs as $child_service)
                    @php
                    $name = 'name_'.$current_language;
                    $slug = 'slug_'.$current_language;
                    @endphp
                    @if($child_service->status =='1')
                    <li class="{{($service->id==$child_service->id )? 'active':'' }}"> <i class="fas fa-long-arrow-alt-right"></i> <a href="{{route("service",[$country_code,app()->getLocale(),$child_service->$slug])}}">
                            {{$child_service->$name}}</a> </li>
                    @endif
                    @endforeach
                    @endif



                </ul>

                @endif
                <ul>
                    <li class="sub-services-button">
                        <h5> {{__('main_services')}} </h5>
                    </li>
                    @foreach($all_services as $all_service)
                    @php
                    $name = 'name_'.$current_language;
                    $slug = 'slug_'.$current_language;

                    @endphp
                    <li class="{{($service->id==$all_service->sid || $service->parent_id==$all_service->sid )? 'active':'' }}"><i class="fas fa-long-arrow-alt-right"></i> <a href="{{route("service",[$country_code,app()->getLocale(),$all_service->$slug])}}">{{$all_service->$name}} </a>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
</section>
@if(count($service->childs) > 0)
<section class="warehouse-boxes-area">
    <div class="container">
        @if($service->$slug=='ocean-freight')
        <h2> {{__('sea_container_charges')}} </h2>
	    @else 
		<h2> {{__('warehouse_services')}} </h2>
        @endif			  
        <div class="row">

            @foreach($service->childs as $child_service)
            @php
            $name = 'name_'.$current_language;
            $slug = 'slug_'.$current_language;
            @endphp
            @if($child_service->status =='1')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">

                <div class="warehouse-box">
                    <h4> <a href="{{route("service",[$country_code,app()->getLocale(),$child_service->$slug])}}"> {{$child_service->$name}} </a> </h4>
                    <div class="button-center-box">
                        <a href="{{route("service",[$country_code,app()->getLocale(),$child_service->$slug])}}" class="btnenq btn-lg aos-init aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                            <span> {{__('view_more')}} </span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach







        </div>
    </div>
</section>

@endif
@if(isset($pageSections['0']))
@php
$slug = 'slug_'.$current_language;
$val = $service->$slug."_faq";
@endphp
@if($pageSections['0']->section_code==$val)
@php
$service_faq = json_decode($pageSections['0']->section_values, true);

$slug=$pageSections['0']->section_type->slug;


// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$modifiedData = [];
foreach ($service_faq as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$service_faqData[$newKey] = $value;
}
foreach($service_faqData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$service_faqData_groupArrays[$subarr][$key] = $val;
}
// Filter elements to include only those containing "(en)"
$keysWithServiceFaq = array_filter(array_keys($service_faqData_groupArrays['title']), function ($key) {
return strpos($key,"(".app()->getLocale().")") !== false;
});
foreach($keysWithServiceFaq as $singletitle)
{
$data[]=$service_faqData_groupArrays['title'][$singletitle];
}
$isAllEmpty = true;
foreach ($data as $key => $value) {
if (!empty($value)) {
$isAllEmpty = false;
break;
}
}
@endphp
@if($isAllEmpty=="")
<section class="faq-area services-faq">
    <div class="container">
        <h2> Frequently Asked Questions about {{$service->$name}} Services </h2>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
                <div id="accordion">
                    @php
                    $i=1;
                    @endphp
                    @foreach($keysWithServiceFaq as $singletitle)
                    @if($service_faqData_groupArrays['title'][$singletitle]!='')
                    <div class="accordion">
                        <input type="radio" name="radacc" {{$i==1?"checked":""}} class="accordian-chk" />
                        <h4 class="accordian-header {{$i==1?"active":""}}">
                            {{$service_faqData_groupArrays['title'][$singletitle]}}
                            <span class="acc-icon"></span>
                        </h4>
                        <div class="accordian-content" tabindex="2">
                            {!! $service_faqData_groupArrays['description']['description_'.$i.'_('.app()->getLocale().')'] !!}
                        </div>
                    </div>
                    @endif
                    @php $i++; @endphp
                    @endforeach

















                </div>
            </div>
        </div>


    </div>
</section>
@endif
@endif
@endif
@endsection