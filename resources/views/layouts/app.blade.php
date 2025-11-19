<!DOCTYPE html>
<html lang="{{$current_language}}">

<head>
    <!-- Google Tag Manager -->
    <link rel="canonical" href="{{ url()->current() }}" id="canonical-link">

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MPZBPGRS');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- Google Font -->

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!--// bootstrap -->
    <!-- animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--// animate -->
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!--// swiper -->

    <!-- testimonials -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <!--// testimonials -->

    <!-- video -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- video -->

    <!-- slick -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.theme.css')}}">
    <!-- slick -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.ico')}}">

    <!-- Fancy Box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <!-- Fancy Box -->
    <link rel="stylesheet" href="{{asset('assets/css/language.css')}}">
    @stack('styles')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CJ4YXLKSZB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-CJ4YXLKSZB');
    </script>

</head>


<body class="{{($current_language=='ar') ? 'rtl' : ''}}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPZBPGRS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- =====================
          HEADER START
     ===================== -->

    <header class="header">
        <!-- header enquiry -->
        <button href="#" id="btnenq" class="btnenq btn-lg head-enquiry-button" data-toggle="modal" data-target="#exampleModalCenterheader"> <span> <i class="far fa-question-circle"></i><a> {{__('enquiry')}} </a>
            </span> </button>

        <!-- header enquiry -->

        <!-- Language -->



        <div class="js language">
            <div class="language-picker js-language-picker" data-trigger-class="btn--subtle">
                <div class="dropdown">
                   <!-- <button onclick="myFunction()" class="dropbtn"><img src="{{ env('APP_ADMIN_URL') }}{{ $locale_id->icon }}" class="dropbtn drop-image" alt="scm-300"></button>
                    <div id="myDropdown" class="dropdown-content">

                        @foreach($langs as $lang)
                        @if(!empty($slugval))

                        <a href="{{ route(Route::currentRouteName(), [$country_code,$lang->code,$slugval]) }}"><img src="{{ env('APP_ADMIN_URL') }}{{ $lang->icon }}" class="drop-image" /></a>
                        @else
                        <a href="{{ route(Route::currentRouteName(), [$country_code,$lang->code]) }}"><img src="{{ env('APP_ADMIN_URL') }}{{ $lang->icon }}" class="drop-image" /></a>
                        @endif
                        @endforeach
                    </div> -->
			    <style>
				#linkicon{
			    	color: white;
					background: transparent;
					padding: 7px;
				}
                </style> 				
			    @if(app()->getLocale()=='en')
				   <button  class="dropbtn"><a id="linkicon" href="{{ route(Route::currentRouteName(), [$country_code,'ar',$slugval]) }}">AR</a></button>
                @endif  
 				@if(app()->getLocale()=='ar')
				   <button  class="dropbtn"><a id="linkicon" href="{{ route(Route::currentRouteName(), [$country_code,'en',$slugval]) }}">EN</a></button>
                @endif 
					
                </div>
            </div>
        </div>
        <!-- Language -->

        <div class="toggle-menus">

            <button aria-label='Toggle menu' class='nav-button button-lines button-lines-x close1' role='button' type='button'>
                <span class='lines'></span>
            </button>
            <!-- logo -->
            <a href="{{route('home')}}"> <img class="logo" src="{{asset('assets/img/logo.png')}}" alt="logo"> </a>

            <!-- logo -->
        </div>


    </header>

    @include('layouts.partials._menubar')
    @yield('content')

    <footer class="footer-area" style="overflow: hidden;">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-logo-img footer-quick-links">
                    <img src="{{asset('assets/img/footer-logo.png')}}" alt="logistica logo">
                    <div class="footer-address">
                        @foreach($footer_branches as $footer_branch)
                        @php
                        $display_loc='display_loc_'.app()->getLocale();

                        @endphp
                        @if($country_code == Str::lower($footer_branch->short_code))
                        <div class="footer-country-box">
                            <a href="{{route('our-story', [$country_code,app()->getLocale()])}}"> <img src="{{env('APP_ADMIN_URL')}}{{$footer_branch->country->flag_icon}}" alt="">
                                {{$footer_branch->$display_loc}} </a>
                        </div>
                        @else
                        <div class="footer-country-box">
                            <a href="{{route('branch',[$country_code,app()->getLocale(), $footer_branch->short_code])}}"> <img src="{{env('APP_ADMIN_URL')}}{{$footer_branch->country->flag_icon}}" alt="">
                                {{$footer_branch->$display_loc}} </a>
                        </div>
                        @endif

                        @endforeach

                    </div>
                    <p class="footer-tel">
                        {{__('mail')}} : <a href="mailto:contactus@logistica-group.com"> contactus@logistica-group.com </a>
                    </p>

                    <div class="col-xl-12 footer-subscribe">

                        <!-- social media -->
                        <div class="social-media-footer">
                            <ul>
                                <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
                                <li> <a href="#"> <i class="fab fa-facebook-f"></i></a> </li>
                                <!-- <li> <a href="#"> <i class="fab fa-twitter"></i></a> </li> -->
                                <li> <a href="https://www.linkedin.com/company/logisticank/" target="_blank"> <i class="fab fa-linkedin-in"></i> </a> </li>
                                <li> <a href="https://www.youtube.com/@logisticaenkayexpress5220" target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
                            </ul>
                        </div>
                        <!-- social media -->
                    </div>
                </div> 
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-quick-links">
                    <h4> {{__('quick_links')}} </h4>
                    <ul>

                        <li> <a href="{{route('careers', [$country_code,app()->getLocale()])}}"> {{__('career')}} </a> </li>
                        <li> <a href="{{route('customer-support', [$country_code,app()->getLocale()])}}"> {{__('customer_service')}} </a> </li>
                        <li> <a href="{{route('blogs', [$country_code,app()->getLocale()])}}"> {{__('blogs')}} </a> </li>
                        <li> <a href="{{route('contact', [$country_code,app()->getLocale()])}}"> {{__('contact')}} </a> </li>
                        <li> <a href="{{route('privacy-policy', [$country_code,app()->getLocale()])}}">{{__('privacy_policy')}}</a> </li>
                        <li> <a href="{{route('faq', [$country_code,app()->getLocale()])}}"> {{__('faq')}} </a> </li>
						<li> <a href="{{route('service', [$country_code,app()->getLocale(),'dma-tariff'])}}"> {{__('dma-tariff')}} </a> </li>
                        <li> <a href="{{asset('assets/Logistica_Profile_2024.pdf')}}" target="_blank"> {{__('our_profile')}} </a> </li>
					</ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-quick-links">
                    <h4> {{__('services')}}</h4>
                    <ul>
                        @foreach($services as $service)
                        @php
                        $name = 'name_'.$current_language;
                        $slug = 'slug_'.$current_language;
                        @endphp
                        <li> <a href="{{route('service',[$country_code,app()->getLocale(),$service->$slug])}}"> {{$service->$name}} </a> </li>

                        @endforeach
                    </ul>

                </div>

                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-quick-links">
                   <h4> Bahrain </h4>
                    <ul class="footer-address-ul">

                        <li><i class="fa-solid fa-location-dot"></i> ENKAY EXPRESS BAHRAIN W.L.L. <br>
                            Office 111-112, Bldg 145, Road 2403, Block 224 <br>
                            P.O.Box: 10642, Manama, Bahrain 
                        </li>
                        <li> <i class="fa-solid fa-phone"></i>  <a href="tel:+97317321250"> +973 17321250 / 80 / 81 / 82 (Airport office) </a> </li>
                         <li> <i class="fa-brands fa-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone=+971506565309&amp;text=Hello from Logistica!." target="_blank"> +97150 656 5309 </a> </li>
                        <li> <i class="fa-solid fa-fax"></i> <a href="tel:+97317321260"> +973 17321260 </a> </li> 
					</ul> 
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-quick-links">
                  
                   <h4> Kuwait </h4>
                    <ul class="footer-address-ul">

                        <li><i class="fa-solid fa-location-dot"></i> ENKAY EXPRESS CO. S.P.C <br>
                           Office No: 15, 16 - Waha Mall<br>
                            Al Dajeej Farwaniya <br>
                            P.O.Box 2273, Safat 13023, Kuwait.
                        </li>
                        <li> <i class="fa-solid fa-phone"></i> <a href="tel:+96522598401"> +965 2259 8401 </a> </li>
                        <li> <i class="fa-brands fa-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone=+971506565309&amp;text=Hello from Logistica!." target="_blank"> +97150 656 5309 </a> </li>
                        <li> <i class="fa-solid fa-fax"></i> <a href="tel:+96522598402"> +965 2259 8402  </a> </li> 
					</ul>
                </div>

                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-quick-links">
                    
                    <h4> UAE </h4>
                    <ul class="footer-address-ul">
                         <li> <i class="fa-solid fa-location-dot"></i> ENKAY EXPRESS (BR. OF RAI LOGISTICA UAE LLC) <br>
                           Jebel Ali Free Zone (South Zone II, Plot # S20106) <br>
                            P.O. Box: 16844, Dubai, UAE
                        </li>
                        <li> <i class="fa-solid fa-phone"></i> <a href="tel:+97148111000"> +9714 811 1000 </a> </li>
                        <li> <i class="fa-brands fa-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone=+971506565309&amp;text=Hello from Logistica!." target="_blank"> +97150 656 5309 </a> </li>
                        <li> <i class="fa-solid fa-fax"></i>  <a href="tel:+97148806470"> +9714 880 6470 </a> </li> 
					</ul>
                </div>


            </div>


        </div>
        {{-- Phone and whatsapp icon --}}
        <div class="phone-whatsapp-box"> 
         <a class="wa-icon" href="https://api.whatsapp.com/send?phone=+971506565309&amp;text=Hello from Logistica!." target="_blank"> 
            <img src="{{asset('assets/img/whatsapp-new.png')}}" alt="">
            
        </a>
         <a href="tel:+971506565309">
             <img src="{{asset('assets/img/phone-new.png')}}" alt=""> </a>
         {{-- <a href="mailto:contactus@logistica-group.com"> <img src="{{asset('assets/img/email-new.png')}}" alt=""></a> --}}
        </div>
        {{-- Phone and whatsapp icon --}}
    </footer>
    <!-- ===================
           FOOTER AREA END
         =================== -->

    <!-- ===========================
           FOOTER BOTTOM AREA START
         =========================== -->
    <section class="footer-bottom" style="overflow: hidden;">
        <p> {{date('Y')}} {!! __('all_rights') !!} </p>
    </section>
    <!-- ==========================
           FOOTER BOTTOM AREA END
         =========================== -->




    <!-- Whatsapp -->
    <!-- chatsale.io widget -->
    <script type="text/javascript">
        ! function() {
            var e = {
                    "buttons": [{
                        "type": "whatsapp",
                        "token": "+971527623610",
                    }, {
                        "type": "call",
                        "token": "+971527623610"
                    }, {
                        "type": "email",
                        "token": "contactus@logistica-group.com"
                    }],
                    "color": "#004B8E",
                    "position": "right",
                    "bottomSpacing": "20",
                    "callToActionMessage": "{{__('enquire_now')}}",
                    "displayOn": "everywhere",
                    "lang": "{{$current_language}}"
                },
                t = document.location.protocol + "//chatsale.io",
                o = document.createElement("script");
            o.type = "text/javascript", o.async = !0, o.src = t + "/widget-folder/widget-page.js", o.onload = function() {
                new BhWidgetPage.init(e)
            };
            var n = document.getElementsByTagName("script")[0];
            n.parentNode.insertBefore(o, n)
        }();
    </script>
    <!-- /Chatsale.io widget -->

    <!-- Whatsapp -->

    <!-- ============================
            BACK TO BUTTON START
         ============================-->
    <a href="#" id="top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </a>

    <!-- Header Enquiry -->
    <div class="heade-enquiry-box">
        <div class="modal fade" id="exampleModalCenterheader" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="error_request_form"></div>

                        <h3 class="modal-title" id="exampleModalLongTitle"> {{__('enquiry_form')}}
                        </h3>
                        <p>{{__('enq_form_content')}}</p>
                        <div class="error_enquiry_form"></div>
                        <form id="contact" class="interest_send">

                            <div class="form-bg">
                                <div class="form-container">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="{{__('ent_name')}}" id="enquiry_name">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="{{__('ent_phone')}}" id="enquiry_phone">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="email" class="form-control" placeholder="{{__('ent_email')}}" id="enquiry_email">
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="{{__('ent_subject')}}" id="enquiry_subject">
                                            </div>



                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" rows="4" cols="120" placeholder="{{__('message')}}" id="enquiry_message"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="row">
                                                <div class="col-md-12 d-flex mb-3">
                                                    <div id="captcha_0" class="captcha-div"></div>
                                                    <a href="javascript:void(0);" onclick="refreshCaptcha();" class="ml-2" style="color:#999;" title="Refresh Captcha"> <i class="fa fa-refresh" aria-hidden="true" style="font-size: 19px;padding-top: 13px;left:unset;"></i></a>
                                                </div>
                                                <div class="col-md-12 d-flex mb-3">
                                                    <input type="text" class="form-control" placeholder="{{__('captcha')}}" name="cpatchatxtbox" id="cpatchaTextBox_0" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn6 btn-lg mx-auto d-flex" id="enquiry_submit" data-id="0">{{__('submit')}}</button>
                                    </form>
                                </div>
                                <div class="row" id="enquiry_loader">
                                    <div class="col-md-12" style="text-align: center;">
                                        <img src="{{asset('assets/img/spinning-loading.gif')}}" style="width: 133px;" />
                                    </div>
                                </div>
                                <div class="alert alert-success alert-block" id="success_enquiry_block" style="bottom:-14px">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong id="success_enquiry_message_block"></strong>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Header Enquiry -->
    <!-- ============================
                      BACK TO BUTTON END
                   ============================-->

    <!-- =====================
          JS AREA START
     ===================== -->
    <script src="{{asset('assets/js/social.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Fancy Box -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- Fancy Box -->

    <!-- Header -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Header -->

    <!-- hero -->
    <script src="{{asset('assets/js/hero.js')}}"></script>

    <!-- hero -->

    <!-- hero -->



    <!-- video -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/youtube.js')}}"></script>
    <!-- video -->

    <!-- Timeline -->
    <script src="./js/timeline.js"></script>
    <!-- Timeline -->

    <!-- Affiliation -->
    <script src="{{asset('assets/js/affiliation.js')}}"></script>
    <!-- Affiliation -->

    <!-- Blogs -->
    <script src="{{asset('assets/js/blog-home.js')}}"></script>
    <!-- Blogs -->
    <script src="{{asset('assets/js/language.js')}}"></script>

    <!-- Services -->
    <script src="{{asset('assets/js/inner-banner.js')}}"></script>
    <!-- Services -->

    <!-- social feeds -->
    <!-- <script src="{{asset('assets/js/social.js')}}"></script> -->
    <!-- social feeds -->

    <!-- Service Icon -->
    <script src="{{asset('assets/js/service-icons.js')}}"></script>
    <!-- Service Icon -->

    <!-- Clients -->
    <script src="{{asset('assets/js/clients.j')}}"></script>
    <!-- hero -->

    <!-- Sbuscribe -->
    <script src="{{asset('assets/js/subscribe.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var code = [];

        function createCaptcha() {
            //clear the contents of captcha div first 
            //document.getElementById('captcha').innerHTML = "";        
            document.getElementsByClassName('captcha-div').innerHTML = "";
            let cdiv = document.getElementsByClassName('captcha-div').length;
            for (i = 0; i < cdiv; i++) {
                let randomCode = generateCapchaCode();

                var canv = document.createElement("canvas");
                canv.id = "captcha_" + i;
                canv.className = "mycaptcha";
                canv.width = 100;
                canv.height = 50;
                var ctx = canv.getContext("2d");
                ctx.font = "25px Georgia";
                ctx.strokeText(randomCode, 0, 30);
                //storing captcha so that can validate you can save it somewhere else according to your specific requirements
                code[i] = randomCode;
                document.getElementById('captcha_' + i).appendChild(canv); // adds the canvas to the body element
            }

        }

        function generateCapchaCode() {
            var charsArray =
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
            var lengthOtp = 6;
            var captcha = [];
            for (var i = 0; i < lengthOtp; i++) {
                //below code will not allow Repetition of Characters
                var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
                if (captcha.indexOf(charsArray[index]) == -1)
                    captcha.push(charsArray[index]);
                else i--;
            }
            return captcha.join("");
        }

        function validateCaptcha(text_val) {
            //event.preventDefault();
            //debugger
            if (code.indexOf(text_val) !== -1) {
                $(".error_request_form").hide();
                $('.error_request_form').removeClass('alert alert-danger').html("");
                return true;
            } else {
                $(".error_request_form").show();
                $('.error_request_form').addClass('alert alert-danger').html("{{__('captcha_invalid')}}");
                return false;
                $(".mycaptcha").remove();
                createCaptcha();
            }







            //if (document.getElementById("cpatchaTextBox").value == code) {
            // if ($("input[name=cpatchatxtbox]").val() == code) {
            //     alert("Valid Captcha");
            // } else {
            //     alert("Invalid Captcha. try Again");
            //     createCaptcha();
            // }
        }

        function refreshCaptcha() {
            $(".mycaptcha").remove();
            createCaptcha();
        }
    </script>
    <script>
        $(document).ready(function() {
            createCaptcha();

        });
    </script>
    <!-- Sbuscribe -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#success_enquiry_block").hide();
        $("#enquiry_loader").hide();
        $("#enquiry_submit").click(function(e) {

            e.preventDefault();
            var data_id = $(this).attr("data-id");
            let text_code = $('#cpatchaTextBox_' + data_id).val();

            if (text_code) {
                if (!validateCaptcha(text_code)) {
                    $('.error_enquiry_form').hide();
                    $('.error_enquiry_form').removeClass('alert alert-danger').html(" ");
                    $('.error_enquiry_form').show();
                    $('.error_enquiry_form').addClass('alert alert-danger').html("{{__('captcha_invalid')}}");
                    $('#cpatchaTextBox_' + data_id).val("");
                    return false;
                }

            } else {
                $('.error_enquiry_form').show();
                $('.error_enquiry_form').addClass('alert alert-danger').html("{{__('no_captcha')}}");

                return false;
            }
			
	  if ($("#enquiry_name").val() == "") {
		  $(".error_enquiry_form").show();
        $(".error_enquiry_form").addClass('alert alert-danger').text("{{__('name_please')}}");
        return false;
      }

      if ($("#enquiry_phone").val() == "") {
		  $(".error_enquiry_form").show();
        $(".error_enquiry_form").addClass('alert alert-danger').text("{{__('phone_please')}}");
        return false;
      }

      if ($("#enquiry_email").val() == "") {
		  $(".error_enquiry_form").show();
        $(".error_enquiry_form").addClass('alert alert-danger').text("{{__('email_please')}}");
        return false;
      }

     

            var name = $("#enquiry_name").val();
            var phone = $("#enquiry_phone").val();
            var email = $("#enquiry_email").val();
            var subject = $("#equiry_subject").val();
            var message = $("#enquiry_message").val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: "POST",
                url: "{{ route('enquiry-mail',[$country_code,app()->getLocale()]) }}",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    subject: subject,
                    message: message,
                    _token: csrf,

                },
                beforeSend: function(xhr) {
                    // Show the loader
                    $('.error_enquiry_form').hide();
                    $("#enquiry_loader").show();

                },
                success: function(data) {
                    $("#enquiry_loader").hide();
                    $('.error_enquiry_form').hide();
                    $("#success_enquiry_block").show();
                    $("#success_enquiry_message_block").html(data.success);
                    $("#enquiry_name").val("");
                    $("#enquiry_phone").val("");
                    $("#enquiry_email").val("");
                    $("#enquiry_subject").val("");
                    $("#enquiry_message").val("");

                    $('#cpatchaTextBox_' + data_id).val("");
                    //    $("#country_quatation").prop('selected', false).find('option:first').prop('selected', true);

                },
                error: function(data) {
                    $("#enquiry_loader").hide();
                    $(".error_enquiry_form").show();
                    let err_str = '';
                    if (data.responseJSON.errors) {
                        err_str = '<dl class="row"><dt class="col-sm-3"></dt><dt class="col-sm-9"><p><b>{{__("whoops")}}</b> {{__("problem_text")}}</p></dt>';
                        $.each(data.responseJSON.errors, function(key, val) {
                            err_str += '<dt class="col-sm-3">' + key.replace("_", " ") + ' </dt><dd class="col-sm-9">' + val + '</dd>';
                        });
                        err_str += '</dl>';
                        $('.error_request_form').addClass('alert alert-danger').html(err_str);

                        return false;
                    }

                }
            });

        });
    </script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {


            // Attach Button click event listener 
            jQuery("#btnenq").click(function() {

                // show Modal
                $('.error_enquiry_form').hide();
                jQuery('#exampleModalCenterheader').modal('show');
            });
        });
    </script>

    <!-- humberger menu -->
    <script>
        let navButton = document.querySelector(".nav-button");

        navButton.addEventListener("click", e => {
            e.preventDefault();

            // toggle nav state
            document.body.classList.toggle("nav-visible");
        });
    </script>
    <!-- humberger menu -->


    <!-- animate aos -->
    <script>
        AOS.init();
    </script>

    <!--// animate aos -->


    <!-- sticky menu -->
    <script type="text/javascript">
        $(function() {
            var navbar = $('.header');
            $(window).scroll(function() {
                if ($(window).scrollTop() <= 40) {
                    navbar.removeClass('navbar-scroll');
                } else {
                    navbar.addClass('navbar-scroll');
                }
            });
        });
    </script>
    <!--// sticky menu -->
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <!-- NAV -->
    <script src="{{asset('assets/js/nav.js')}}"></script>
    @stack('scripts')

    <!-- NAV -->

    <!-- =====================
          JS AREA END
     ===================== -->



</body>

</html>