<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Branch;
use App\Models\PageBranch;
use App\Models\PageSection;
use App\Models\Banner;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AboutController extends BaseController
{
    //
    public function __construct()
    {

        parent::__construct();
    }

    public function ourStory(Request $request)
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
            $slug = "our-story-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "our-story-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = "our-story-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "our-story-uae-" . $this->current_language;
        }
        // echo $slug;
        // exit;
        // var_dump($slug);
        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();
        $pageSections = PageSection::where('page_id', $page->page_id)->get();

        $banner = Banner::where('page_id', $page->page_id)->first();
        $slugval = "";

        return view('our-story', compact('page', 'pageSections', 'banner', 'lang_url_switcher', 'slugval'));
    }
}
