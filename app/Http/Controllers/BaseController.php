<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Language;
use App\Models\Service;
use App\Models\Branch;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Helpers\FetchIpHelper;


class BaseController extends Controller
{
    //
    protected $current_language_id;
    protected $current_language;
    protected $countryCode;
    protected $services;
    protected $services_sub_count;

    public function __construct()
    {

        $countVal = FetchIpHelper::fetchIp();
        /*$default_language = app()->getLocale();
		$param = explode('/', request()->path());
		  isset($param[1]) ? $path = ltrim(request()->path(), $param[0] . '/' . $param[1]  . '/') : $path = ltrim(request()->path(), $param[0] . '/');

		 if($param[0]=='ae' && $countVal=='ae')
		 {
			 return redirect()->to($param[0] . '/' . $default_language . '/' . $path);
		 } else {

			 return redirect()->to($countVal . '/' . $default_language . '/' . $path);
         }*/


        $loc_val = trim(request()->route('locale')) ? trim(request()->route('locale')) :  app()->getLocale();
        $countryVal = trim(request()->route('country')) ? trim(request()->route('country')) :  $countVal;


        $langs = Language::orderBy('id', 'asc')->get();

        if ($loc_val != '') {
            $languages = config('app.available_locales'); //Available languages in your app ex.: array('en', 'fr', 'es')

            if (!in_array($loc_val, array_keys($languages))) {

                // $default_language =  app()->getLocale();
                $param = explode('/', request()->path());
                isset($param[1]) ? $path = ltrim(request()->path(), $param[0] . '/' . $param[1]  . '/') : $path = ltrim(request()->path(), $param[0] . '/');

                if ($param[0] != "") {
                    if ($param[0] == 'en' || $param[0] == 'ar') {
                        $default_language = $param[0];
                    } else {
                        return redirect('/');
                    }
                } else {
                    $default_language =  app()->getLocale();
                }


                return redirect()->to($countVal . '/' . $default_language . '/' . $path);
            }
        } else {

            $param = explode('/', request()->path());

            isset($param[1]) ? $path = ltrim(request()->path(), $param[0] . '/' . $param[1]  . '/') : $path = ltrim(request()->path(), $param[0] . '/');

            ($path == '') ? $path = '/' : $path;
            if ($param[0] != "") {
                if ($param[0] == 'en' || $param[0] == 'ar') {
                    $default_language = $param[0];
                } else {
                    return redirect('/');
                }
            } else {
                $default_language =  app()->getLocale();
            }
            App::setLocale($default_language);
            return redirect()->to($countVal . '/' . $default_language . '/' . $path);
        }


        $locale_id = Language::where('code', $loc_val)->first();

        $this->current_language = $loc_val;
        $current_language = $this->current_language;
        $this->current_language_id = $locale_id->id;


        $services = Service::where('parent_id', '0')->orderBy('priority', 'asc')->get();


        $services_sub = collect();
        foreach ($services  as  $service) {


            $services_sub->push($sub = Service::where('parent_id', $service->id)->where('status', '1')->orderBy('priority', 'asc')->get());
        }

        $services_sub = $services_sub->flatten();


        $services_sub_count = collect();
        foreach ($services  as  $service) {

            $services_sub_count->push(Service::where('parent_id', $service->id)->where('status', '1')->orderBy('priority', 'asc')->get()->count());
        }

        $services_sub_count = $services_sub_count->flatten();
        View::share('services', $services);
        View::share('services_sub', $services_sub);
        View::share('services_sub_count', $services_sub_count);

        $footer_branches = Branch::orderBy('display_loc_en', 'asc')->where('status', '1')->get();
        $footer_branch = Branch::where('short_code', $countryVal)->first();

        View::share('footer_branches', $footer_branches);
        View::share('footer_branch', $footer_branch);


        $countryCode = Str::lower($countryVal);
        $upperCountryCode = Str::upper($countryVal);
        View::share('country_code', $countryCode);
        View::share('upper_country_code', $upperCountryCode);
        View::share('current_language', $current_language);
        View::share('locale_id', $locale_id);
        View::share('langs', $langs);
    }
}
