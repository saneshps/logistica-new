<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\PageSection;
use App\Models\Page;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Industry;
use App\Models\Branch;
use App\Models\Banner;
use App\Models\BranchOffice;
use App\Models\PageBranch;
use App\Mail\EnquiryMail;
use App\Mail\CustomerSatisfactionSurveyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;





class HomeController extends BaseController
{
    //
    public function __construct()
    {

        parent::__construct();
    }



    public function index(Request $request)
    {
        $lang_url_switcher = [
            'en' => 'en',
            'ar' => 'ar',

        ];

        // echo $ip;
        // exit;
        // $ip = '196.1.69.98'; /* Static IP address */
        //   $ip = '86.99.188.63';
        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);
        $branch = Branch::where('short_code', $country_code)->first();
        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';
		$short_code_name = 'short_code_' . $this->current_language . '';

        $page = PageBranch::where($field_name, '=', $slug)->first();

        $image_icon_services = Service::where('image_icon', '<>', "")->get();
        $industries = Industry::orderBy('id', 'asc')->get();
        $pageSections = PageSection::where('page_id', $page->page_id)->get();
        // echo $page->page_id;
        // exit;
        $banners = Banner::where('page_id', $page->page_id)->first();

        $blogs = Blog::orderBy('created_at', 'desc')->where($short_code_name,'<>','')->get();
        $branches = Branch::orderBy('display_loc_en', 'asc')->where('status','1')->get();
        $branch = Branch::where('short_code', $country_code)->first();
        $branch_office = BranchOffice::where('branch_id', $branch->id)->where('default', '1')->first();

        $services_images_top = Service::select('services.*', 'service_branches.*')
            ->join('service_branches', 'services.id', '=', 'service_branches.service_id')
            ->where('service_branches.branch_id', $branch->id)
            ->where('services.parent_id', '0')
            ->orderBy('services.priority', 'asc')->take(4)->get();
        $services_images_bottom = Service::select('services.*', 'service_branches.*')
            ->join('service_branches', 'services.id', '=', 'service_branches.service_id')
            ->where('service_branches.branch_id', $branch->id)
            ->where('services.parent_id', '0')
            ->orderBy('services.priority', 'asc')->skip(4)->take(2)->get();


        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "location-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "location-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "location-uae-" . $this->current_language;
        }
        $slugval = "";
        return view('home', compact('page', 'pageSections', 'banners', 'lang_url_switcher', 'image_icon_services', 'services_images_top', 'services_images_bottom', 'industries', 'blogs', 'branches', 'branch_office', 'slugval'));
    }
    public function mail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',

        ]);
        $to_email = env('MAIL_FROM_ADDRESS');
        $to_cc = env('MAIL_CC');
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'suject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to($to_email)->cc($to_cc)->send(new EnquiryMail($data));
        return response()->json([
            'success' =>  Lang::get('messages.enquiry_mail_success'),
        ]);
    }
    public function newsletter(Request $request, $slug = null)
    {

        // $request->validate([
        //     'email' => 'email|required',
        // ]);
        $input = $request->all();

        // Newsletter::create($input);
        if (!empty($slug)) {
            return redirect()->route($input['prev_url'], [$this->current_language, $slug])->with('success', 'You have successfully subscribed to our website');
        } else {
            return redirect()->route($input['prev_url'], [$this->current_language])->with('success', 'You have successfully subscribed to our website');
        }
    }

    public function customerSatisfactionSurvey(Request $request)
    {

        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);

        $branch = Branch::where('short_code', $country_code)->first();
        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "customer-satisfaction-survey-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "customer-satisfaction-survey-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);

            $slug = "customer-satisfaction-survey-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "customer-satisfaction-survey-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';

        $page = PageBranch::where($field_name, '=', $slug)->first();
        $slugval = "";
        return view('customer-satisfaction-survey', compact('page', 'slugval'));
    }

    public function customerSatisfactionSurveySubmit(Request $request)
    {
        // echo $request->date;
        // exit;

        $request->validate([
            'customer_name' => 'required',
            'contact_person' => 'required',
            'contact_no' => 'required|numeric',
            'work_progress' => 'required',
            'quality_of_service' => 'required',
            'respone_time' => 'required',
            'communication' => 'required',
            'courtesy_our_staff' => 'required',
            'overall_rating' => 'required',


        ]);
        $formatted = date('d-m-Y', strtotime($request->date));
        $to_email = env('MAIL_FROM_ADDRESS');
        $to_cc = env('MAIL_CC');
        $data = array(
            'customer_name' => $request->customer_name,
            'contact_person' => $request->contact_person,
            'contact_no' => $request->contact_no,
            'contract_details' => $request->contract_details,
            'work_progress' => $request->work_progress,
            'quality_of_service' => $request->quality_of_service,
            'respone_time' => $request->respone_time,
            'communication' => $request->communication,
            'courtesy_our_staff' => $request->courtesy_our_staff,
            'overall_rating' => $request->overall_rating,
            'requirements' => $request->requirements,
            'improvements' => $request->improvements,
            'complaints' => $request->complaints,
            'designation' => $request->designation,
            'date' => $formatted,
        );
        Mail::to($to_email)->cc($to_cc)->send(new CustomerSatisfactionSurveyMail($data));

        return redirect()->back()->with('message', Lang::get('messages.customer_satisfaction_survey_success'));
    }
    public function privacyPolicy(Request $request)
    {

        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);

        $branch = Branch::where('short_code', $country_code)->first();

        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "privacy-policy-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "privacy-policy-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);

            $slug = "privacy-policy-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "privacy-policy-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();


        $pageSections = PageSection::where('page_id', $page->page_id)->get();

        $banner = Banner::where('page_id', $page->page_id)->first();
        $slugval = "";
        return view('privacy-policy', compact('page', 'pageSections', 'slugval'));
    }

    public function faq(Request $request)
    {
        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);
        $country_code = $this->countryCode;
        $branch = Branch::where('short_code', $country_code)->first();

        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "faq-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "faq-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);

            $slug = "faq-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "faq-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();


        $pageSections = PageSection::where('page_id', $page->page_id)->get();
        $slugval = "";
        return view('faq', compact('page', 'pageSections', 'slugval'));
    }
}
