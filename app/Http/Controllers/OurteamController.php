<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Branch;
use App\Models\PageBranch;
use App\Models\PageSection;
use App\Models\Banner;
use App\Models\Department;
use Illuminate\Support\Str;

class OurteamController extends BaseController
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
            $slug = "our-team-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = "our-team-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "our-team-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "our-team-uae-" . $this->current_language;
        }
        // echo $slug;
        // exit;
        // var_dump($slug);
        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();
        $pageSections = PageSection::where('page_id', $page->page_id)->get();

        $banner = Banner::where('page_id', $page->page_id)->first();

        $departments = Department::orderBy('id', 'asc')->get();

        $slugval = '';

        return view('our-teams', compact('page', 'pageSections', 'banner', 'lang_url_switcher', 'departments', 'slugval'));
    }
}
