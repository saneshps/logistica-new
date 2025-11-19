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

    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
      HERO END
 ===================== -->


<!-- =============================
      CUSTOMER SUPPORT AREA START
    ============================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='customer_support')
@php
$customer_support_content = json_decode($pageSection->section_values, true);

$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$customer_support_content_modifiedData = [];
foreach ($customer_support_content as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$customer_support_content_modifiedData[$newKey] = $value;

}



foreach($customer_support_content_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$customer_support_content_groupArrays[$subarr][$key] = $val;
}



@endphp
<section class="customer-support-area" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            @php
            // Filter elements to include only those containing "(en)"
            $keysWithCustomerSupport = array_filter(array_keys($customer_support_content_groupArrays['title']), function ($key) {
            return strpos($key,"(".app()->getLocale().")") !== false;
            });
            $keysWithCustomerSupportContent = array_filter(array_keys($customer_support_content_groupArrays['content']), function ($key) {
            return strpos($key,"(".app()->getLocale().")") !== false;
            });
            $keysWithCustomerSupporttext = array_filter(array_keys($customer_support_content_groupArrays['text']), function ($key) {
            return strpos($key,"(".app()->getLocale().")") !== false;
            });

            $i=1;
            @endphp

            @foreach($keysWithCustomerSupport as $keys => $serviceCustomer)
            @if($customer_support_content_groupArrays['title'][$serviceCustomer]!="")
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="customer-support-box aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                    <h2> {{$customer_support_content_groupArrays['title'][$serviceCustomer]}}</h2>
                    <p>{{$customer_support_content_groupArrays['content'][$keysWithCustomerSupportContent[$keys]]}}
                    </p>
                    <a href="{{$customer_support_content_groupArrays['link']['link_'.$i]}}" class="btn3 btn-lg aos-init aos-animate" target="_blank">
                        <span> {{$customer_support_content_groupArrays['text'][$keysWithCustomerSupporttext[$keys]]}} </span>
                    </a>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle"> Track your order </h3>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data="trigger">
                                    <span aria-hidden="true" class="active">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="error_request_form"></div>
                                <form id="contact" class="interest_send">


                                    <div class="row">


                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group"> <label>Company</label>

                                            <input type="text" name="company" class="form-control" id="company_quatation" placeholder="Company" required="">

                                        </div>


                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label>Contact Name</label>
                                            <input type="text" name="name" class="form-control" id="name_quatation" placeholder="Contact Name" required="">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label>E-mail</label>
                                            <input type="email" name="email" class="form-control" id="email_quatation" aria-describedby="emailHelp" placeholder="E-mail" required="">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group"> <label>Phone</label>
                                            <input type="tel" class="form-control" id="phone_quatation" placeholder="Phone" required="" name="phone">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label>Country</label>
                                            <select class="form-control">
                                                <option value="paris">Paris</option>
                                                <option value="new york">New York</option>
                                            </select>
                                        </div>



                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group"> <label> Service
                                                Name</label>

                                            <input type="text" name="name" class="form-control" id="product_quatation" placeholder="Product Name" required="">

                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                            <label>Description</label>

                                            <textarea name="name" class="form-control" id="description_quatation" placeholder="Description" required=""></textarea>

                                        </div>


                                        <button type="button" id="quatation_submit" class="btn6" data="trigger">Submit</button>

                                    </div> <!-- row -->
                                </form>
                            </div>
                            <div class="row" id="quatation_loader" style="display: none;">
                                <div class="col-md-12" style="text-align: center;">
                                       <img src="{{asset('assets/img/spinning-loading.gif')}}" style="width: 133px;" />
                                </div>
                            </div>
                            <div class="alert alert-success alert-block" id="success_quatation_block" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" data="trigger">×</button>
                                <strong id="success_quatation_message_block"></strong>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @endif
            @php $i++; @endphp
            @endforeach




        </div>
    </div>
</section>
@endif
@endforeach
<section class="about-express-interest-area" style="overflow: hidden;">
    <div class="container">
        <div class="express-box aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <h5> {{__('feedback')}} </h5>
            <h2> {{__('feedback_cont')}} </h2>

            <a href="{{route('customer-satisfaction-survey',[$country_code,app()->getLocale()])}}" class="btnenq btn3 btn-lg aos-init aos-animate">
                <span> {{__('feedback')}} </span>
            </a>
        </div>
    </div>
</section>


@endsection
