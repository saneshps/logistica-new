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


<!-- ======================
        CAREER AREA START
     ====================== -->
@foreach($pageSections as $pageSection)
@if($pageSection->section_code=='career_content')
@php
$career_content = json_decode($pageSection->section_values, true);

$slug=$pageSection->section_type->slug;

// String to remove from the keys
$stringToRemove = $slug.'_';
// Initialize an empty array for the modified data
$career_content_modifiedData = [];
foreach ($career_content as $key => $value) {
// Remove the specified string from the key
$newKey = str_replace($stringToRemove, '', $key);
// Assign the value to the new key in the modified data
$career_content_modifiedData[$newKey] = $value;

}
foreach($career_content_modifiedData as $key => $val){
//$length = length($key);
$subarr = substr($key,0, strpos($key, "_"));
$career_content_groupArrays[$subarr][$key] = $val;
}

@endphp
<section class="career-area" style="overflow: hidden;">
  <div class="container">

    <div class="career-head">
      <div class="row">
         <div class="col-xl-9 mx-auto aos-animate" data-aos="fade-down-right"
                        data-aos-easing="ease-out-cubic" data-aos-duration="1200">
        {!! $career_content_modifiedData['content_data_('.app()->getLocale().')'] !!}
		</div>
      </div>
    </div>

  </div>
</section>
@endif
@endforeach
<!-- =====================
        CAREER AREA END
     ===================== -->

<!-- ========================
        VACANCIES AREA START
     ======================== -->
<section class="vacancies-area" style="overflow: hidden;">
  <div class="container">
    <h2 class="aos-animate" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1200"> {{__('vacancies')}} </h2>

    <!-- 1 -->
    @php
    $j=2;
    @endphp
    @foreach($jobs as $job)
    <div class="row vacancies-box">

      <!-- First -->
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 vacancies-first-area">
        @php
        $title='title_'.app()->getLocale();
        $description='description_'.app()->getLocale();
        @endphp
        <h2> {{$job->$title}} </h2>
        <div class="para">
          <div id="short_desc{{$j}}">
            {!! \Illuminate\Support\Str::limit($job->$description, 200, $end='...') !!}
            <a href="javascript:void(0);" class="showmore read-more" data-id="{{$j}}">{{__('view_more')}}</a>
          </div>

          <div id="long_desc{{$j}}" style="display:none;">
            {!! $job->$description !!}
            <a href="javascript:void(0);" class="showmore read-less" data-id="{{$j}}">{{__('view_less')}}</a>
          </div>
        </div>

      </div>
      <!--// First -->

      <!-- Second -->
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 vacancies-second-area">
        <!--<h4> {{__('expire')}} :{{date('d-m-Y', strtotime($job->expiry_at))}} </h4>-->
        <!-- <a href="#" class="btn3 btn-lg">
                    <span> Enquir Now </span>
                </a> -->
        <button type="button" class="btn6 btn-lg m-0" data-toggle="modal" data-target="#exampleModalCenter{{$job->id}}">
          {{__('apply_now')}}
        </button>
      </div>


      <!--// Second -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h3 class="modal-title" id="exampleModalLongTitle"> {{$job->$title}}
              </h3>
              <p> {{__('pls_complete')}} </p>
              <div class="error_msg" id="error_msg{{ $job->id}}"></div>
              <form class="interest_send" id="form_data" enctype="multipart/form-data">

                <div class="form-bg">
                  <div class="form-container">

                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="{{__('name')}}" id="name{{$job->id}}">
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="email" class="form-control" placeholder="{{__('email')}}" id="email{{$job->id}}">
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="{{__('phone')}}" id="phone{{$job->id}}">
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 form-group"><i class="fas fa-file"></i>
                        <input type="file" class="form-control" id="resume{{$job->id}}" name="resume" accept=".pdf" placeholder=""><br>
                        <label style="color:black">
                          <h6>({{__('cv_msg')}})</h6>
                        </label>

                      </div>

                      <div class="col-md-12 form-group">
                        <textarea class="form-control" rows="4" cols="120" placeholder="{{__('description')}}" id="description{{$job->id}}"></textarea>

                      </div>
                      <div class="col-md-12 form-group">
                        <div class="row">
                          <div class="col-md-12 d-flex mb-3">
                            <div id="captcha_{{$j}}" class="captcha-div"></div>
                            <a href="javascript:void(0);" onclick="refreshCaptcha();" class="ml-2" style="color:#999;" title="Refresh Captcha"> <i class="fa fa-refresh" aria-hidden="true" style="font-size: 19px;padding-top: 13px;left:unset;"></i></a>
                          </div>
                          <div class="col-md-12 d-flex mb-3">
                            <input type="text" class="form-control" placeholder="{{__('captcha')}}" name="cpatchatxtbox" id="cpatchaTextBox_{{$j}}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn6 btn-lg mx-auto d-flex sub" id="{{ $job->id}}" data-id="{{$j}}">{{__('submit')}}</button>

                  </div>
                </div>
              </form>
              <br>
              <div class="resume_loader row" id="resume_loader{{ $job->id}}">
                <div class="col-md-12" style="text-align: center;">
                  <img src="{{asset('assets/img/spinning-loading.gif')}}" style="width: 133px;" />
                </div>
              </div>
              <div class="success_resume_block alert alert-success alert-block" id="success_resume_block{{ $job->id}}">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong id="success_resume_message_block{{ $job->id}}" class="success_resume_message_block"></strong>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @php
    $j++;
    @endphp
    @endforeach
	<style>
	#captcha_1{
		background: white;
        padding: 10px;
	}	
	</style>
	  <div class="row join-team-bottom-form vacancies-box">
                <div class="form-bg">
                    <div class="col-xl-12">
                        <div class="form-container">
                            <h3> {{__('would_you_like_to_work_here')}} </h3>
							 <div class="common_error_msg" id="common_error_msg"></div>
           
							 <form class="row form-horizontal common_interest_send" id="common_form_data" enctype="multipart/form-data">
                                <div class="col-md-6 form-group">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" placeholder="{{__('name')}}" id="common_name"/>
                                </div>
                                
								<div class="col-md-6 form-group"> <i class="fas fa-flag"></i>

                                    <select class="form-control" id="common_country">
                                        <option  selected="" disabled> {{__('country')}} </option>
										@foreach($footer_branches as $footer_branch)
										@php
                                            $display_loc='display_loc_'.app()->getLocale();
                                        @endphp
                                        <option value="{{Str::lower($footer_branch->short_code)}}">{{$footer_branch->$display_loc}}</option>
                                        @endforeach

                                       
                                    </select>

                                </div>
                                <div class="col-md-6 form-group">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" id="common_role" placeholder="{{__('role')}}" />
                                </div>
								<div class="col-md-6 form-group">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" class="form-control" id="common_email" placeholder="{{__('email')}}" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <i class="fas fa-phone"></i>
									<input type="text" class="form-control" id="common_phone" placeholder="{{__('phone')}}" />
                                </div>

                      

                

                                <div class="col-md-12 form-group"> <i class="fas fa-file"></i> <input type="file"
                                        class="form-control" id="common_resume" name="resume" accept=".pdf,.doc,.docx">
										<label style="color:white">
										  <h6>({{__('cv_msg')}})</h6>
										</label>
                                </div>

                                <div class="col-md-12 form-group"> <i class="fas fa-comment-alt"></i>
                                    <textarea class="form-control" id="common_description" rows="4" cols="120" placeholder="{{__('description')}}"></textarea>
                                </div>
                               <div class="col-md-12 form-group">
								<div class="row">
								  <div class="col-md-12 d-flex mb-3">
									<div id="captcha_1" class="captcha-div"></div>
									<a href="javascript:void(0);" onclick="refreshCaptcha();" class="ml-2" style="color:#999;" title="Refresh Captcha"> <i class="fa fa-refresh" aria-hidden="true" style="font-size: 19px;padding-top: 13px;left:unset;"></i></a>
								  </div>
								  <div class="col-md-12 d-flex mb-3">
									<input type="text" class="form-control" placeholder="{{__('captcha')}}" name="cpatchatxtbox" id="cpatchaTextBox_1" />
								  </div>
								</div>
                      </div>


                                <div class="col-md-12 mx-auto d-flex justify-content-center">
                                    <button type="button" id="common_button" data-id="1" class="common_button btn btn-default demo-submit" data="trigger">
                                        <span>{{__('submit')}} </span>
                                    </button>
									<br>
							    </div>
									 <div class="col-md-12 mx-auto d-flex justify-content-center">
								  <div class="common_resume_loader row" id="common_resume_loader" style="padding-top: 10px;">
									<div class="col-md-12" style="text-align: center;">
									  <img src="{{asset('assets/img/spinning-loading.gif')}}" style="width: 133px;" />
									</div>
								  </div>
								  <div class="common_success_resume_block alert alert-success alert-block" id="common_success_resume_block" style="top: 17px;">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong id="common_success_resume_message_block" class="common_success_resume_message_block"></strong>
								  </div>
								 
                                </div>
								 
                            </form>
                        </div>

                    </div>
                </div>
            </div>
	
    <!--// 1 -->

    <!-- 2 -->

    <!--// 4 -->



  </div>
</section>
@endsection
@push('scripts')
<script>
  $('.read-more').on('click', function(e) {
    var id = $(this).attr('data-id');
    $('#long_desc' + id).css({
      'display': 'block'
    });
    $('#short_desc' + id).css({
      'display': 'none'
    });
  });

  $('.read-less').on('click', function(e) {
    var id = $(this).attr('data-id');
    $('#long_desc' + id).css({
      'display': 'none'
    });
    $('#short_desc' + id).css({
      'display': 'block'
    });
  });
</script>

<script>
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    $(".common_success_resume_block").hide();
    $(".common_resume_loader").hide();
	$(".common_error_msg").hide();
	$("#common_phone").attr("disabled", "disabled"); 
	$("#common_country").on("change",function(){
		$("#common_phone").removeAttr("disabled");
        var common_country =$("#common_country").val();
		switch (common_country) { 
			case 'bh': 
				$("#common_phone").val('+973');
				break;
			case 'sa': 
				$("#common_phone").val('+966');
				break;
			case 'kw': 
				$("#common_phone").val('+965');
				break;		
			default:
				$("#common_phone").val('+971');
		} 		
	});
    $(".common_button").on("click", function() {
      var data_id = $(this).attr("data-id");
      let text_code = $('#cpatchaTextBox_' + data_id).val();
      if (text_code) {
        if (!validateCaptcha(text_code)) {
          $(".common_error_msg").hide();
          $('.common_error_msg').removeClass('alert alert-danger').html(" ");
          $(".common_error_msg").show();
          $('.common_error_msg').addClass('alert alert-danger').html("{{__('captcha_invalid')}}");
          $('#cpatchaTextBox_' + data_id).val("");
		   refreshCaptcha();
          return false;
        }

      } else {
        $(".common_error_msg").show();
        $('.common_error_msg').addClass('alert alert-danger').html("{{__('no_captcha')}}");

        return false;
      }
 
      if ($("#common_country").val() == null) {
		  $(".common_error_msg").show();
          $('#common_error_msg').addClass('alert alert-danger').text("{{__('country_please')}}");
        return false;
      }  

      
      if ($("#common_name").val() == "") {
		  $(".common_error_msg").show();
        $('#common_error_msg').addClass('alert alert-danger').text("{{__('name_please')}}");
        return false;
      }

      if ($("#common_phone").val() == "") {
		  $(".common_error_msg").show();
        $('#common_error_msg').addClass('alert alert-danger').text("{{__('phone_please')}}");
        return false;
      }

      if ($("#common_email").val() == "") {
		  $(".common_error_msg").show();
        $('#common_error_msg').addClass('alert alert-danger').text("{{__('email_please')}}");
        return false;
      }
	  
	  if ($("#common_role").val() == "") {
		  $(".common_error_msg").show();
        $('#common_error_msg').addClass('alert alert-danger').text("{{__('role_please')}}");
        return false;
      }

      if (!document.getElementById('common_resume').files.length) {
		  $(".common_error_msg").show();
        $('#common_error_msg').addClass('alert alert-danger').text(
		"{{__('resume_please')}}");
        return false;
      }

      var name = $("#common_name").val();
      var phone = $("#common_phone").val();
      var email = $("#common_email").val();
	  var country = $("#common_country").val();
      var role = $("#common_role").val();
      var description = $("#common_description").val();
      var resume = $("#common_resume").prop('files')[0];
      var formData = new FormData();
      formData.append('name', name);
      formData.append('phone', phone);
      formData.append('email', email);
	  formData.append('country', country);
      formData.append('role', role);
      formData.append('description', description);
      formData.append('resume', resume);
      validateCaptcha();
      // createCaptcha();
      $.ajax({
        method: "POST",
        url: "{{ route('jobs-mail', [$country_code,app()->getLocale()]) }}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
          // Show the loader
          $('#common_error_msg').hide();
          $("#common_resume_loader").show();

        },
        success: function(response) {
          $('#common_error_msg').hide();
          $("#common_resume_loader").hide();
          $("#common_success_resume_block").show();
          $("#common_success_resume_message_block").html(response.success);
          $('#common_form_data')[0].reset();
          $('#cpatchaTextBox_' + data_id).val("");
		  refreshCaptcha();

        },
        error: function(data) {
          $("#common_resume_loader").hide();
          $("#common_error_msg").show();
          let err_str = '';
          if (data.responseJSON.errors) {
            err_str = '<dl class="row"><dt class="col-sm-3"></dt><dt class="col-sm-9"><p><b>{{__("whoops")}}</b> {{__("problem_text")}}</p></dt>';
            $.each(data.responseJSON.errors, function(key, val) {
              err_str += '<dt class="col-sm-3">' + key.replace("_", " ") + ' </dt><dd class="col-sm-9">' + val + '</dd>';
            });
            err_str += '</dl>';
            $("#common_error_msg").addClass('alert alert-danger').html(err_str);

            return false;
          }

        }
      });


    });
	
	
	$(".success_resume_block").hide();
    $(".resume_loader").hide();
    $(".btn6").on("click", function() {
      $(".error_msg").hide();
    });

    $(".sub").on("click", function() {


      var id = $(this).attr("id");
      var data_id = $(this).attr("data-id");
      let text_code = $('#cpatchaTextBox_' + data_id).val();

      if (text_code) {
        if (!validateCaptcha(text_code)) {
          $(".error_msg").hide();
          $('.error_msg').removeClass('alert alert-danger').html(" ");
          $(".error_msg").show();
          $('.error_msg').addClass('alert alert-danger').html("{{__('captcha_invalid')}}");
          $('#cpatchaTextBox_' + data_id).val("");
          return false;
        }

      } else {
        $(".error_msg").show();
        $('.error_msg').addClass('alert alert-danger').html("{{__('no_captcha')}}");

        return false;
      }

      if ($("#name" + id).val() == "") {
		  $(".error_msg").show();
        $('#error_msg' + id).addClass('alert alert-danger').text("{{__('name_please')}}");
        return false;
      }

      if ($("#phone" + id).val() == "") {
		  $(".error_msg").show();
        $('#error_msg' + id).addClass('alert alert-danger').text("{{__('phone_please')}}");
        return false;
      }

      if ($("#email" + id).val() == "") {
		  $(".error_msg").show();
        $('#error_msg' + id).addClass('alert alert-danger').text("{{__('email_please')}}");
        return false;
      }

      if (!document.getElementById('resume' + id).files.length) {
		  $(".error_msg").show();
        $('#error_msg' + id).addClass('alert alert-danger').text(
		"{{__('resume_please')}}");
        return false;
      }

      var name = $("#name" + id).val();
      var phone = $("#phone" + id).val();
      var email = $("#email" + id).val();
      var role = $("#role" + id).val();
      var description = $("#description" + id).val();
      var resume = $("#resume" + id).prop('files')[0];
      var formData = new FormData();
      formData.append('name', name);
      formData.append('phone', phone);
      formData.append('email', email);
      formData.append('role', role);
      formData.append('description', description);
      formData.append('resume', resume);
      validateCaptcha();
      // createCaptcha();
      $.ajax({
        method: "POST",
        url: "{{ route('jobs-each-mail', [$country_code,app()->getLocale()]) }}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
          // Show the loader
          $('#error_msg' + id).hide();
          $("#resume_loader" + id).show();

        },
        success: function(response) {
          $('#error_msg' + id).hide();
          $("#resume_loader" + id).hide();
          $("#success_resume_block" + id).show();
          $("#success_resume_message_block" + id).html(response.success);
          $("#name" + id).val("");
          $("#phone" + id).val("");
          $("#email" + id).val("");
          $("#role" + id).val("");
          $("#resume" + id).val("");
          $("#description" + id).val("");
          $('#cpatchaTextBox_' + data_id).val("");

        },
        error: function(data) {
          $("#resume_loader" + id).hide();
          $("#error_msg" + id).show();
          let err_str = '';
          if (data.responseJSON.errors) {
            err_str = '<dl class="row"><dt class="col-sm-3"></dt><dt class="col-sm-9"><p><b>{{__("whoops")}}</b> {{__("problem_text")}}</p></dt>';
            $.each(data.responseJSON.errors, function(key, val) {
              err_str += '<dt class="col-sm-3">' + key.replace("_", " ") + ' </dt><dd class="col-sm-9">' + val + '</dd>';
            });
            err_str += '</dl>';
            $("#error_msg" + id).addClass('alert alert-danger').html(err_str);

            return false;
          }

        }
      });


    });
  });
</script>
@endpush