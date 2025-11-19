<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\ServiceBranch;
use App\Models\Service;
use App\Models\Branch;
use App\Models\PageSection;
use App\Models\Page;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    //
    public function __construct()
    {

        parent::__construct();
    }
    public function index(Request $request, $country, $sslug)
    {

        $page_slug = 'slug_' . app()->getLocale();
		$name_slug = 'name_' . app()->getLocale();
    	
        $page = Page::where($name_slug, '=', 'Service')->first();
	    $page_section_code = $sslug."_faq";	
        $pageSections = PageSection::where('section_code',$page_section_code)->get();
   		

        $service = Service::where($page_slug, $sslug)->first();

        $country_code = $request->route('country');
        $country_code = Str::upper($country_code);
        //$all_services = Service::where('parent_id','0')->orderBy('priority','asc')->get();
        $branch = Branch::where('short_code', $country_code)->first();

        $all_services =
            Service::select('services.*', 'service_branches.*', 'services.id as sid')
            ->join('service_branches', 'services.id', '=', 'service_branches.service_id')
            ->where('service_branches.branch_id', $branch->id)
            ->where('services.parent_id', '0')
            ->orderBy('services.priority', 'asc')
            ->get();

        $service_branch = ServiceBranch::where('branch_id', $branch->id)->where('service_id', $service->id)->first();

        $slugval = $sslug;


        return view('service', compact('page','pageSections','service', 'all_services', 'service_branch', 'slugval'));
    }
}
