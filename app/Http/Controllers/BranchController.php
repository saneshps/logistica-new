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
use Illuminate\Support\Str;

class BranchController extends BaseController
{
    //
    public function __construct()
    {

        parent::__construct();
    }



    public function index($country_code,$slug)
    {
        $lang_url_switcher = [
            'en' => 'en',
            'ar' => 'ar',

        ];

        // echo $ip;
        // exit;
        // $ip = '196.1.69.98'; /* Static IP address */
        //   $ip = '86.99.188.63';


        $country_code = $slug;


        $branch = Branch::where('short_code', $country_code)->first();
        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $storyslug = "our-story-" . $country_code . "-" . $this->current_language;
            $slug =  "branch-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $storyslug = "our-story-" . $country_code . "-" . $this->current_language;
            $slug =  "branch-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $storyslug = "our-story-" . $country_code . "-" . $this->current_language;
            $slug =  "branch-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $storyslug = "our-story-uae-" . $this->current_language;
            $slug =  "branch-uae-" . $this->current_language;
        }


        $storyfield_name = 'slug_' . $this->current_language . '';
        $storypage = PageBranch::where($storyfield_name, '=', $storyslug)->first();
        $storypageSections = PageSection::where('page_id', $storypage->page_id)->get();
        $field_name = 'slug_' . $this->current_language . '';

        $page = PageBranch::where($field_name, '=', $slug)->first();
        $image_icon_services = Service::where('image_icon', '<>', "")->get();

        $industries = Industry::orderBy('id', 'asc')->get();
        $pageSections = PageSection::where('page_id', $page->page_id)->get();
        $banners = Banner::where('page_id', $page->page_id)->first();

        $blogs = Blog::orderBy('created_at', 'desc')->get();
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

        $slugval = strtoupper($country_code);


        return view('branch', compact('page', 'pageSections', 'banners', 'lang_url_switcher', 'image_icon_services', 'services_images_top', 'services_images_bottom', 'industries', 'blogs', 'branch', 'branches', 'branch_office', 'storypageSections', 'slugval'));
    }
}
