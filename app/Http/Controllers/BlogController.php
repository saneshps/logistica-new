<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\Page;
use App\Models\PageBranch;
use Illuminate\Support\Str;

class BlogController extends BaseController
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
		$short_code_name = 'short_code_' . $this->current_language . '';
        $blogs = Blog::orderBy('created_at', 'desc')->where($short_code_name,'<>','')->get();
        //   $branch = Branch::where('short_code', $country_code)->first();
        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);

        $branch = Branch::where('short_code', $country_code)->first();

        if ($country_code == "KW") {
            $country_code = strtolower($country_code);
            $slug = "blogs-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "BH") {
            $country_code = strtolower($country_code);
            $slug = "blogs-" . $country_code . "-" . $this->current_language;
        } else if ($country_code == "SA") {
            $country_code = strtolower($country_code);

            $slug = "blogs-" . $country_code . "-" . $this->current_language;
        } else {
            //$country_code = strtolower("AE");
            $slug = "blogs-uae-" . $this->current_language;
        }

        $field_name = 'slug_' . $this->current_language . '';

        $page = PageBranch::where($field_name, '=', $slug)->first();
        $slugval = '';

        return view('blogs', compact('blogs', 'page', 'slugval'));
    }
    public function blogDetails($country_code,$slug)
    {
        $current_language = $this->current_language;
        $short_code = 'short_code_' . $current_language;

        $blog = Blog::where($short_code, '=', $slug)->first();

        $slugval = $slug;

        return view('blog-details', compact('blog', 'slugval'));
    }
}
