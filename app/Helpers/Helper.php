<?php

namespace App\Helpers;

class Helper
{

    public static function dateFormat($date)
    {
        /*
        if (self::isUserFromUzbekistan()) {
            return date('d.m.Y', strtotime($date));
        } else {
            return date('Y-m-d', strtotime($date));
        }
        */
        return date('d.m.Y H:i', strtotime($date));
    }
    // later minimize to boost speed
    public static function isUserFromUzbekistan() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        return isset($details->country) && $details->country === 'UZ';
    }

    public static function restricted_roles()
    {
        return [1, 2, 3]; // 1-admin, 2-user, 3-clinic_owner
    }

    public static function accepted_roles()
    {
        return [4, 5]; // 4-dentist, 5-store controller
    }
}
