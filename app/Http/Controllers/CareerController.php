<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Branch;
use App\Models\Banner;
use App\Models\PageBranch;
use App\Models\PageSection;
use App\Models\Job;
use App\Mail\JobsMail;
use App\Mail\JobsCommonMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;


class CareerController extends BaseController
{
    //
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
            $slug = "careers-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = "careers-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "careers-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "careers-uae-" . $this->current_language;
        }
        // echo $slug;
        // exit;
        // var_dump($slug);
        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();
        $pageSections = PageSection::where('page_id', $page->page_id)->get();

        $banner = Banner::where('page_id', $page->page_id)->first();
        $jobs = Job::orderBy('id', 'desc')->get();

        $slugval = '';


        return view('careers', compact('page', 'pageSections', 'banner', 'lang_url_switcher', 'jobs', 'slugval'));
    }
    public function jobsEachMail(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'role' => 'required',
            'resume' => 'required|file|max:3072|mimes:pdf',


        ]);


        $rand = rand('1111111', '9999999');
        if ($request->hasFile("resume")) {

            $vresume = $request->file("resume");
            $ext = $vresume->extension();
            $image_name = $rand . '.' . $ext;
            $destinationPath = 'uploads/pdf';
            $request->file("resume")->storeAs($destinationPath, $image_name);
            $resume = $image_name;
        } else {
            $resume = "";
        }
        $to_email = env('MAIL_FROM_ADDRESS');
        $to_cc = env('MAIL_CC');
        $quatation_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'resume' => $resume,
            'description' => $request->description,

        );

        Mail::to($to_email)->cc($to_cc)->send(new JobsMail($quatation_data));
        return response()->json([
            'success' =>  Lang::get('messages.jobs_success'),
        ]);
    }
	
	public function jobsMail(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'role' => 'required',
			'country' => 'required',
            'resume' => 'required|file|max:3072|mimes:pdf',


        ]);


        $rand = rand('1111111', '9999999');
        if ($request->hasFile("resume")) {

            $vresume = $request->file("resume");
            $ext = $vresume->extension();
            $image_name = $rand . '.' . $ext;
            $destinationPath = 'uploads/pdf';
            $request->file("resume")->storeAs($destinationPath, $image_name);
            $resume = $image_name;
        } else {
            $resume = "";
        }
        $to_email = env('MAIL_FROM_ADDRESS');
        $to_cc = env('MAIL_CC');
	    $country=$request->country;
		switch ($country) {
        case 'ae':
            $country_val='UAE';
            break;
        case 'bh':
            $country_val='Bahrain';
            break;
		case 'sa':
            $country_val='Kingdom of Saudi Arabia';
            break;	
		case 'kw':
            $country_val='Kuwait';
            break;
    }
        $quatation_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
			'country' => $country_val,
            'role' => $request->role,
            'resume' => $resume,
            'description' => $request->description,

        );

     Mail::to($to_email)->cc($to_cc)->send(new JobsCommonMail($quatation_data));
	//  Mail::to($to_email)->send(new JobsCommonMail($quatation_data));
        return response()->json([
            'success' =>  Lang::get('messages.jobs_success'),
        ]);
    }
}
