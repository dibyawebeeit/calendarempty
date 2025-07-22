<?php

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Modules\Client\App\Models\Client;

if (!function_exists('format_price')) {
    function format_price($amount, $currency = '$')
    {
        $isNegative = $amount < 0;
        $formatted = number_format(abs($amount), 2, '.', '');
        return ($isNegative ? '-' : '') . $currency . '' . $formatted;
    }
}


if (!function_exists('standard_date')) {
    function standard_date($input)
    {
        try {
            return Carbon::parse($input)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // or throw exception / return original
        }
    }
}

if (!function_exists('format_number')) {
    function format_number($number)
    {
        return number_format((float) $number, 2, '.', '');
    }
}

if (!function_exists('client_rate')) {
    function client_rate($clientId, $rateId)
    {
        $rate = 0;
        $client_details = Client::select('attorney_rate','legal_secretary_rate','legal_assistant_rate')->find($clientId);
        if($rateId == 1)
        {
            //attorney
            $rate = $client_details->attorney_rate;
        }
        else if($rateId == 2)
        {
            //Legal Secretory
            $rate = $client_details->legal_secretary_rate;
        }
        else
        {
            //Legal Document Assitant
            $rate = $client_details->legal_assistant_rate;
        }
        return '$'.number_format((float) $rate, 2, '.', '');
        
    }
}

if (!function_exists('user_short_form')) {
    function user_short_form($userId)
    {
        $user_details = User::find($userId);
        $short_name = strtoupper(substr($user_details->first_name,0,1)).strtoupper(substr($user_details->last_name,0,1));
        return $short_name;
        
    }
}

if (!function_exists('setting')) {
    function setting()
    {
        return Setting::first();
    }
}
