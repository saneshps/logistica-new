<?php

namespace App\Http\Middleware;

use Closure;
use Stevebauman\Location\Facades\Location;
use App\Helpers\FetchIpHelper;

class SetCountry
{
  public function handle($request, Closure $next)
  {

    $countryCode = $this->getCountryCode($request);


    // Modify the request path by adding the country code as a prefix
    $request->server->set('REQUEST_URI', '/' . $countryCode . $request->server->get('REQUEST_URI'));

    return $next($request);
  }

  protected function getCountryCode($request)
  {
    $countryCode = FetchIpHelper::fetchIp();
    // Implement the logic to determine the country code
    // For example, you can extract it from the request parameters or session
    // If not detected, return null to use the default
    return $request->route('country_code') ?? $countryCode;
  }
}
