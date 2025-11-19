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
<style>
    .captcha-div {
        background: aliceblue;
    }

    .mycaptcha {
        padding: 10px;
    }
</style>
<section class="home contact" style="overflow: hidden;">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12">
            <!-- image banner -->
            @foreach($banner->bannerDetails as $bannerDetail)
            <!-- image banner -->
            <img src="{{env('APP_ADMIN_URL')}}{{$bannerDetail->file_path}}" alt="team-banner">
            <!-- image banner -->

            @endforeach
            <!-- image banner -->

            <div class="contact-form-area aos-animate" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
                <h2> {{__('connect_with_us')}} </h2>
                <!-- <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p> -->
                <div class="form-bg">
                    <div class="form-container">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h6><strong>{{ Session::get('message') }}</strong></h6>
                        </div>
                        @endif
                        <form class="form-horizontal" method="post" action="{{route('contact-mail',[$country_code,app()->getLocale()])}}">
                            @csrf
                            <div class="error_contact_msg"></div>
                            @error('name')
                            <p style="color:red;background:white">{{ $message }}</p>
                            @enderror
                            @error('email')
                            <p style="color:red;background:white">{{ $message }}</p>
                            @enderror
                            @error('phone')
                            <p style="color:red;background:white">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="{{__('name')}}">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="{{__('email')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="{{__('phone')}}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="{{__('subject')}}">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="4" cols="120" name="message" placeholder="{{__('message')}}"></textarea>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 d-flex mb-3">
                                        <div id="captcha_1" class="captcha-div"></div>
                                        <a href="javascript:void(0);" onclick="refreshCaptcha();" class="ml-2" style="color:#999;" title="Refresh Captcha"> <i class="fa fa-refresh" aria-hidden="true" style="font-size: 19px;padding-top: 13px;"></i></a>
                                    </div>
                                    <div class="col-md-12 d-flex mb-3">
                                        <input type="text" class="form-control" placeholder="{{__('captcha')}}" name="cpatchatxtbox" id="cpatchaTextBox_1" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn5 btn-lg" data-id="1">{{__('submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-5 col-lg-6 col-md-12 contact-adderess-area">
            <h1> Contact Us </h1>
            @foreach($branches as $branch)
            @php
            $display_loc='display_loc_'.app()->getLocale();
            $slug ='slug_'.app()->getLocale();
            $description = 'description_'.app()->getLocale();
            @endphp
            <div class="contact-adderess-box">

                <h4> {{$branch->$display_loc}} </h4>
                @foreach($branch->branch_offices as $branch_office)
                @php

                $address_display_value = 'address_display_value_'.app()->getLocale();
                $display_loc='display_loc_'.app()->getLocale();
                $default_address='address_'.app()->getLocale();
                $default_branch='branch_name_'.app()->getLocale();
                @endphp
                <p> {!! $branch_office->$default_branch !!} <br>
                    {!! $branch_office->$default_address !!}
                </p>

                <p> {{__('tel')}}: {{ $branch_office->phone }}
                    @if($branch_office->id===3)
                    ({{__('airport')}})
                    @endif
                    <br>
                    {{__('fax')}}: {{ $branch_office->fax }}
                </p>
                @if($branch_office->map_link!="")
                <div class="map-icon">
                    <a href="{{ $branch_office->map_link }}" target="_blank"> <i class="fas fa-map-marker-alt"></i> </a>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach


        </div>
    </div>



    <!-- social media -->
    @include('layouts.partials._social')
    <!-- social media -->
</section>

<!-- =====================
          HERO END
     ===================== -->





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
@push('scripts')
<script type="text/javascript">
    $(".btn5").click(function(e) {
        var data_id = $(this).attr("data-id");
        let text_code = $('#cpatchaTextBox_' + data_id).val();
        if (text_code) {
            if (!validateCaptcha(text_code)) {
                $('.error_contact_msg').hide();
                $('.error_contact_msg').removeClass('alert alert-danger').html(" ");
                $('.error_contact_msg').show();
                $('.error_contact_msg').addClass('alert alert-danger').html("<h6 style='color: #d30a0a;'>{{__('captcha_invalid')}}</h6>");
                $('#cpatchaTextBox_' + data_id).val("")
                return false;
            } else {
                $(this).submit();
            }
        } else {
            $('.error_contact_msg').show();
            $('.error_contact_msg').addClass('alert alert-danger').html("<h6 style='color: #d30a0a;'>{{__('no_captcha')}}</h6>");

            return false;
        }
    });
</script>
@endpush