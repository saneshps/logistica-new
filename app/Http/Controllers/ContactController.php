<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Branch;
use App\Models\Banner;
use App\Models\PageBranch;
use App\Models\PageSection;
use App\Models\BranchOffice;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class ContactController extends BaseController
{
    //
    public function __construct()
    {

        parent::__construct();
    }
    public function index(Request $request)
    {

        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);

        $branch = Branch::where('short_code', $country_code)->first();

        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "contact-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = "contact-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "contact-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "contact-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();

        $pageSections = PageSection::where('page_id', $page->page_id)->get();
        $banner = Banner::where('page_id', $page->page_id)->first();
        $branches = Branch::orderBy('display_loc_en', 'asc')->where('status','1')->get();
        $branch = Branch::where('short_code', $country_code)->first();
        $branch_office = BranchOffice::where('branch_id', $branch->id)->where('default', '1')->first();
        $slugval = '';
        return view('contact', compact('page', 'branch', 'banner', 'branches', 'branch_office', 'slugval'));
    }
    public function contactMail(Request $request)
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
        return redirect()->back()->with('message', Lang::get('messages.enquiry_mail_success'));
    }
}
