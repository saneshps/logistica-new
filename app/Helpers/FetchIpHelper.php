<?php

namespace App\Helpers;

use Stevebauman\Location\Facades\Location;
use App\Helpers\IpHelper;
use Illuminate\Support\Str;


class FetchIpHelper
{
  public static function fetchIp()
  {
    //$clientIP = \Request::getClientIp(true);
    //  dd($clientIP);


    //echo $ip;
    // exit;
    //$ip = '196.1.69.98'; /* Static IP address */
    //$ip = '86.99.188.63';
    //  $ip = IpHelper::getIp();

    //echo $ip;
    // exit;
    //$ip = '196.1.69.98'; /* Static IP address */
    $ip = '86.99.188.63';

    // $ip = IpHelper::getIp();

    //$ip = '196.1.69.98'; /* Static IP address */
    // $ip = '86.99.188.63';

    //$ip = "59.94.196.181";
    //$ip = "193.188.124.227";
    //$ip = "86.111.196.9";
    $currentUserInfo = Location::get($ip);

    // echo "<pre>";
    // print_r($currentUserInfo);
    // exit;


    if ($currentUserInfo->countryCode == 'KW' || $currentUserInfo->countryCode == 'BH' ||  $currentUserInfo->countryCode == 'SA') {
      $countryCode = Str::lower($currentUserInfo->countryCode);
    } else {
      $countryCode = Str::lower("AE");
    }
    return $countryCode;
  }
}
