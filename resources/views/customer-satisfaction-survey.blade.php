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
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
<style>
    .satisfaction{
        color: #ffffff;
    }
    .satisfaction:focus{
         color: #ffffff;
    }
    .mycaptcha{
            background: white;
            padding: 9px;
    }
</style>
@endpush
@section('content')
     <section class="home sub-page no-banner" style="overflow: hidden;">
        <!-- image banner -->
        <!-- <img src="./img/about/board-of-directors-banner.jpg" alt="board-of-directors"> -->
        <!-- image banner -->
        <h1> {{__('customer_satisfaction')}} </h1>

        <!-- social media -->
       @include('layouts.partials._social')
        <!-- social media -->
    </section>

    <!-- =====================
          HERO END
     ===================== -->
    <!-- ==========================================
           CUSTOMER SATISFACTION SURVEY AREA START
         ========================================== -->
    <section class="customer-survey-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-11 customer-survey-box mx-auto">
                    <div class="row customer-survey-head">
                        <div class="col-xl-9">
                            <h4> {{__('customer_satisfaction')}} </h4>
                        </div>
                        <div class="col-xl-3 customer-survey">
                            <img style="width: 160px;" src="{{asset('assets/img/logo.png')}}" alt="logo">
                        </div>
                    </div>
                   @if(Session::get('message'))
                              <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h6><strong>{{ Session::get('message') }}</strong></h6>
                              </div>
                    @endif
                   <form method="post" action="{{route('customer-satisfaction-survey-submit',[$country_code,app()->getLocale()])}}">
                    @csrf
                     <div class="error_contact_msg"></div>
                             @error('customer_name')
                              <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                            @enderror
            				   @error('contact_person')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
            				   @error('contact_no')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                                @error('work_progress')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                                 @error('quality_of_service')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                                @error('respone_time')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                               @error('communication')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                                @error('overall_rating')
                                  <p style="color:red;background:white;padding: 10px;border-radius: 10px;">{{ $message }}</p>
                               @enderror
                    <div class="customer-name">
                        <p>{{__('please_take')}}

                        </p>

                        <ul>
                            <li> <span class="first"> {{__('name_of_the_customer')}}</span> <span class="second"> <input
                                        type="text" class="satisfaction form-control" name="customer_name" placeholder="{{__('n_c')}}"> </span>
                            </li>
                            <li> <span class="first">{{__('contact_person')}}</span> <span class="second"> <input type="text"
                                        class="satisfaction form-control" name="contact_person" placeholder="{{__('cp')}}"> </span> </li>
                            <li> <span class="first">{{__('contact_no')}}</span> <span class="second"> <input type="text"
                                        class="satisfaction form-control" placeholder="{{__('cno')}}" name="contact_no"> </span> </li>
                            <li> <span class="first">{{__('contract_details')}}</span> <span class="second"> <input type="text"
                                        class="satisfaction form-control" placeholder="{{__('cd')}}" name="contract_details"> </span> </li>

                        </ul>
                    </div>

                    <!-- table -->
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th scope="col"> {{__('r_criteria')}} </th>
                                <th scope="col">{!!__('poor')!!} </th>
                                <th scope="col">{!!__('average')!!}</th>
                                <th scope="col">{!!__('good')!!}</th>
                                <th scope="col">{!!__('vgood')!!} </th>
                                <th scope="col"> {!!__('exellent')!!}</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row"> {{__('work_progress')}} </th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="work_progress" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="work_progress" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="work_progress" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="work_progress" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="work_progress" value="5">
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">{{__('quality')}}</th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="quality_of_service" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="quality_of_service" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="quality_of_service" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="quality_of_service" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="quality_of_service" value="5">
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">{{__('response')}}</th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="respone_time" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="respone_time" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="respone_time" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="respone_time" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="respone_time" value="5">
                                </td>

                            </tr>
                            <tr>
                                <th scope="row"> {{__('communication')}} </th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="communication" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="communication" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="communication" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="communication" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="communication" value="5">
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">{{__('courtesy')}}</th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="courtesy_our_staff" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="courtesy_our_staff" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="courtesy_our_staff" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="courtesy_our_staff" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="courtesy_our_staff" value="5">
                                </td>

                            </tr>
                            <tr>
                                <th scope="row"> {{__('overall')}} </th>
                                <td data-title="Poor  (Below 40%) "> <input type="radio" id="f-option" name="overall_rating" value="1">
                                    <!-- <label for="f-option">Pizza</label> -->
                                </td>
                                <td data-title="Average  (40% -75%)"> <input type="radio" id="f-option" name="overall_rating" value="2">

                                </td>
                                <td data-title="Good  (75%-85%)"> <input type="radio" id="f-option" name="overall_rating" value="3">
                                </td>
                                <td data-title="Very Good  (85%-90%)"> <input type="radio" id="f-option"
                                        name="overall_rating" value="4">
                                </td>
                                <td data-title=" Excellent  (Above 90%)"> <input type="radio" id="f-option"
                                        name="overall_rating" value="5">
                                </td>

                            </tr>


                        </tbody>
                    </table>

                    <!-- table -->

                    <div class="requirements">


                        <ul>
                            <li> <span class="first"> {{__('any_other_requirement')}} </span> <span class="second">
                                    <textarea class="satisfaction form-control"
                                        placeholder="{{__('anyothers')}}" name="requirements"></textarea> </span>
                            </li>
                            <li> <span class="first"> {{__('suggestions_for_improvement')}}</span> <span
                                    class="second"> <textarea class="satisfaction form-control"
                                        placeholder="{{__('sugg_improvement')}}" name="improvements"></textarea></span> </li>
                            <li> <span class="first"> {{__('complaints_if_any')}}</span> <span class="second"> <textarea class="satisfaction form-control" placeholder="{{__('complaints')}}" name="complaints"></textarea> </span>
                            </li>

                        </ul>
                    </div>

                       <div class="requirements">


                         <ul>
                            <li> <span class="first">{{__('designation')}}</span> <span class="second"> <input
                                        type="text" class="satisfaction form-control" name="designation" placeholder="{{__('desig')}}"> </span>
                            </li>
                            <li> <span class="first"> {{__('date')}}</span> <span class="second"> <input type="date"
                                        class="satisfaction form-control" name="date" placeholder="Date"> </span> </li>


                        </ul>
                    </div>

                    <div class="row bottom-page-area">
                        <ul>
                            <li> ENK-IMS-FO-06C Rev: 01 </li>
                            <li> {{__('customer_satisfaction')}} </li>
                            <li> 02/10/2023 </li>
                            <li> {{__('page')}} </li>
                        </ul>
                    </div>




                    <div class="form-group">
                        <div class="error_captcha_msg"></div>
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
    </section>
@endsection

@push('scripts')
<script type="text/javascript">
$(".btn5").click(function(e) {
  var data_id = $(this).attr("data-id");
  let text_code = $('#cpatchaTextBox_' + data_id).val();
  if (text_code) {
					if (!validateCaptcha(text_code)) {
					  $('.error_captcha_msg').hide();
					  $('.error_captcha_msg').removeClass('alert alert-danger').html(" ");
					  $('.error_captcha_msg').show();
					  $('.error_captcha_msg').addClass('alert alert-danger').html("<h6 style='color: #d30a0a;'>{{__('captcha_invalid')}}</h6>");
					  $('#cpatchaTextBox_' + data_id).val("")
					  return false;
					} else {
						$(this).submit();
					}
				  } else {
						$('.error_captcha_msg').show();
						$('.error_captcha_msg').addClass('alert alert-danger').html("<h6 style='color: #d30a0a;'>{{__('no_captcha')}}</h6>");

						return false;
				  }
});

</script>
@endpush
