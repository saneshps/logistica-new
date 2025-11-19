<?php

namespace App\Http\Middleware;

use Closure;
use App;
use URL;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Helpers\FetchIpHelper;


class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $countryCode = FetchIpHelper::fetchIp();
		
		
        $loc_val =  trim(request()->route('locale')) ? trim(request()->route('locale'))  :  '';



        if ($loc_val != '') { // if lang exists, but not available in app config
           
            $languages = config('app.available_locales'); //Available languages in your app ex.: array('en', 'fr', 'es')

            if (!in_array($loc_val, array_keys($languages))) {

                // $default_language = app()->getLocale();
                $param = explode('/', request()->path());
				
				
                isset($param[1]) ? $path = ltrim(request()->path(), $param[0] . '/' . $param[1]  . '/') : $path = ltrim(request()->path(), $param[0] . '/');
                $default_language = $param[0];
                if ($param[0] != "") {
                    if ($param[0] == 'en' || $param[0] == 'ar') {
                        $default_language = $param[0];
                    } else {
                        return redirect('/');
                    }
                } else {
                    $default_language =  app()->getLocale();
                }

                return redirect()->to($countryCode . '/' . $default_language . '/' . $path);
            }
            App::setLocale($request->locale);
        } else {

            //  $default_language =  app()->getLocale();

				

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
            return redirect()->to($countryCode . '/' . $default_language . '/' . $path);
        }

        $request->route()->forgetParameter('locale');
        return $next($request);
    }
}
