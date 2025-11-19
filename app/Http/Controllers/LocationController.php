<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Branch;
use App\Models\Banner;
use App\Models\PageBranch;
use App\Models\PageSection;
use App\Models\BranchOffice;
use Illuminate\Support\Str;


class LocationController extends BaseController
{
    //
    public function index(Request $request)
    {
        $branches = Branch::orderBy('display_loc_en', 'asc')->where('status','1')->get();
        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);

        $branch = Branch::where('short_code', $country_code)->first();
        $branch_office = BranchOffice::where('branch_id', $branch->id)->where('default', '1')->first();

        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "location-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);
            $slug = "location-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "location-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "location-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';
        $page = PageBranch::where($field_name, '=', $slug)->first();

        $pageSections = PageSection::where('page_id', $page->page_id)->get();
        $banner = Banner::where('page_id', $page->page_id)->first();
        $slugval = '';
        return view('location', compact('page', 'branches', 'banner', 'branch_office', 'slugval'));
    }
}
