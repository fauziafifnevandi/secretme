<?php

namespace App\Helpers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class FingerprintHelper
{
    public static function generate(Request $request)
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();
        $device = $agent->device();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $fingerprint = md5($browser . $platform . $device . $language);
        return $fingerprint;
    }
}
