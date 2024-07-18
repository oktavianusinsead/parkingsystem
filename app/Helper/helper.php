<?php

use App\Models\Custom;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

if (!function_exists('settingsKeys')) {
    function settingsKeys()
    {
        return $settingsKeys = [
            "app_name" => "",
            "theme_color" => "color1",
            "sidebar_mode" => "light",
            "layout_direction" => "ltrmode",
            "layout_mode" => "lightmode",
            "company_logo" => "logo.png",
            "company_favicon" => "favicon.png",
            "landing_logo" => "landing_logo.png",
            "meta_seo_title" => "",
            "meta_seo_keyword" => "",
            "meta_seo_description" => "",
            "meta_seo_image" => "",
            "company_currency" => "USD",
            "company_currency_symbol" => "$",
            "company_date_format" => "M j, Y",
            "company_time_format" => "g:i A",
            "company_name" => "",
            "company_phone" => "",
            "company_address" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "google_recaptcha" => "off",
            "recaptcha_key" => "",
            "recaptcha_secret" => "",
            "landing_page" => "on",
            "register_page" => "on",
            'SERVER_DRIVER' => "",
            'SERVER_HOST' => "",
            'SERVER_PORT' => "",
            'SERVER_USERNAME' => "",
            'SERVER_PASSWORD' => "",
            'SERVER_ENCRYPTION' => "",
            'FROM_EMAIL' => "",
            'FROM_NAME' => "",
            'CURRENCY' => "IDR",
            'CURRENCY_SYMBOL' => "Rp",
            'STRIPE_PAYMENT' => "off",
            'STRIPE_KEY' => "",
            'STRIPE_SECRET' => "",
            "paypal_payment" => "off",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "bank_transfer_payment" => "off",
            "bank_name" => "",
            "bank_holder_name" => "",
            "bank_account_number" => "",
            "bank_ifsc_code" => "",
            "bank_other_details" => "",
            'parking_prefix' => "#PARK-0000",
        ];
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $settingData = DB::table('settings');
        if (\Auth::check()) {
            $userId = parentId();
            $settingData = $settingData->where('parent_id', $userId);
        } else {
            $settingData = $settingData->where('parent_id',1);
        }
        $settingData = $settingData->get();
        $details = settingsKeys();

        foreach ($settingData as $row) {
            $details[$row->name] = $row->value;
        }

        config(
            [
                'captcha.secret' => $details['recaptcha_key'],
                'captcha.sitekey' => $details['recaptcha_secret'],
                'options' => [
                    'timeout' => 30,
                ],
            ]
        );

        return $details;
    }
}

if (!function_exists('subscriptionPaymentSettings')) {
    function subscriptionPaymentSettings()
    {
        $settingData = DB::table('settings')->where('type', 'payment')->where('parent_id', '=', 1)->get();
        $result = [
            'CURRENCY' => "IDR",
            'CURRENCY_SYMBOL' => "Rp",
            'STRIPE_PAYMENT' => "off",
            'STRIPE_KEY' => "",
            'STRIPE_SECRET' => "",
            "paypal_payment" => "off",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "bank_transfer_payment" => "off",
            "bank_name" => "",
            "bank_holder_name" => "",
            "bank_account_number" => "",
            "bank_ifsc_code" => "",
            "bank_other_details" => "",
        ];

        foreach ($settingData as $setting) {
            $result[$setting->name] = $setting->value;
        }

        return $result;
    }
}

if (!function_exists('invoicePaymentSettings')) {
    function invoicePaymentSettings($id)
    {
        $settingData = DB::table('settings')->where('type', 'payment')->where('parent_id', $id)->get();
        $result = [
            'CURRENCY' => "IDR",
            'CURRENCY_SYMBOL' => "Rp",
            'STRIPE_PAYMENT' => "off",
            'STRIPE_KEY' => "",
            'STRIPE_SECRET' => "",
            "paypal_payment" => "off",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "bank_transfer_payment" => "off",
            "bank_details" => "",
        ];

        foreach ($settingData as $row) {
            $result[$row->name] = $row->value;
        }
        return $result;
    }
}

if (!function_exists('emailSettings')) {
    function emailSettings($id)
    {
        $settingData = DB::table('settings')->where('type', 'smtp')->where('parent_id', $id)->get();
        $result = [
            'FROM_EMAIL' => "",
            'FROM_NAME' => "",
            'SERVER_DRIVER' => "",
            'SERVER_HOST' => "",
            'SERVER_PORT' => "",
            'SERVER_USERNAME' => "",
            'SERVER_PASSWORD' => "",
            'SERVER_ENCRYPTION' => "",
        ];

        foreach ($settingData as $setting) {
            $result[$setting->name] = $setting->value;
        }

        return $result;
    }
}

if (!function_exists('getSettingsValByName')) {
    function getSettingsValByName($key)
    {
        $setting = settings();
        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }

        return $setting[$key];
    }
}

if (!function_exists('settingDateFormat')) {
    function settingDateFormat($settings, $date)
    {
        return date($settings['company_date_format'], strtotime($date));
    }
}
if (!function_exists('settingPriceFormat')) {
    function settingPriceFormat($settings, $price)
    {
        return $settings['company_currency_symbol'] . $price;
    }
}
if (!function_exists('settingTimeFormat')) {
    function settingTimeFormat($settings, $time)
    {
        return date($settings['company_time_format'], strtotime($time));
    }
}
if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        $settings = settings();

        return date($settings['company_date_format'], strtotime($date));
    }
}
if (!function_exists('timeFormat')) {
    function timeFormat($time)
    {
        $settings = settings();

        return date($settings['company_time_format'], strtotime($time));
    }
}
if (!function_exists('priceFormat')) {
    function priceFormat($price)
    {
        $settings = settings();

        return $settings['company_currency_symbol'] . $price;
    }
}
if (!function_exists('parentId')) {
    function parentId()
    {
        if (\Auth::user()->type == 'owner' || \Auth::user()->type == 'super admin') {
            return \Auth::user()->id;
        } else {
            return \Auth::user()->parent_id;
        }
    }
}
if (!function_exists('assignSubscription')) {
    function assignSubscription($id)
    {
        $subscription = Subscription::find($id);
        if ($subscription) {
            \Auth::user()->subscription = $subscription->id;
            if ($subscription->interval == 'Monthly') {
                \Auth::user()->subscription_expire_date = Carbon::now()->addMonths(1)->isoFormat('YYYY-MM-DD');
            } elseif ($subscription->interval == 'Quarterly') {
                \Auth::user()->subscription_expire_date = Carbon::now()->addMonths(3)->isoFormat('YYYY-MM-DD');
            } elseif ($subscription->interval == 'Yearly') {
                \Auth::user()->subscription_expire_date = Carbon::now()->addYears(1)->isoFormat('YYYY-MM-DD');
            } else {
                \Auth::user()->subscription_expire_date = null;
            }
            \Auth::user()->save();

            $users = User::where('parent_id', '=', parentId())->whereNoIn('type', ['super admin', 'owner'])->get();

            if ($subscription->user_limit == 0) {
                foreach ($users as $user) {
                    $user->is_active = 1;
                    $user->save();
                }
            } else {
                $userCount = 0;
                foreach ($users as $user) {
                    $userCount++;
                    if ($userCount <= $subscription->user_limit) {
                        $user->is_active = 1;
                        $user->save();
                    } else {
                        $user->is_active = 0;
                        $user->save();
                    }
                }
            }

        } else {
            return [
                'is_success' => false,
                'error' => 'Subscription is deleted.',
            ];
        }
    }
}
if (!function_exists('assignManuallySubscription')) {
    function assignManuallySubscription($id,$userId)
    {
        $owner = User::find($userId);
        $subscription = Subscription::find($id);
        if ($subscription) {
            $owner->subscription = $subscription->id;
            if ($subscription->interval == 'Monthly') {
                $owner->subscription_expire_date = Carbon::now()->addMonths(1)->isoFormat('YYYY-MM-DD');
            } elseif ($subscription->interval == 'Quarterly') {
                $owner->subscription_expire_date = Carbon::now()->addMonths(3)->isoFormat('YYYY-MM-DD');
            } elseif ($subscription->interval == 'Yearly') {
                $owner->subscription_expire_date = Carbon::now()->addYears(1)->isoFormat('YYYY-MM-DD');
            } else {
                $owner->subscription_expire_date = null;
            }
            $owner->save();

            $users = User::where('parent_id', $userId)->get();

            if ($subscription->user_limit == 0) {
                foreach ($users as $user) {
                    $user->is_active = 1;
                    $user->save();
                }
            } else {
                $userCount = 0;
                foreach ($users as $user) {
                    $userCount++;
                    if ($userCount <= $subscription->user_limit) {
                        $user->is_active = 1;
                        $user->save();
                    } else {
                        $user->is_active = 0;
                        $user->save();
                    }
                }
            }

        } else {
            return [
                'is_success' => false,
                'error' => 'Subscription is deleted.',
            ];
        }
    }
}
if (!function_exists('smtpDetail')) {
    function smtpDetail($id)
    {
        $settings = emailSettings($id);

        $smtpDetail = config(
            [
                'mail.mailers.smtp.transport' => $settings['SERVER_DRIVER'],
                'mail.mailers.smtp.host' => $settings['SERVER_HOST'],
                'mail.mailers.smtp.port' => $settings['SERVER_PORT'],
                'mail.mailers.smtp.encryption' => $settings['SERVER_ENCRYPTION'],
                'mail.mailers.smtp.username' => $settings['SERVER_USERNAME'],
                'mail.mailers.smtp.password' => $settings['SERVER_PASSWORD'],
                'mail.from.address' => $settings['FROM_EMAIL'],
                'mail.from.name' => $settings['FROM_NAME'],
            ]
        );

        return $smtpDetail;
    }
}
if (!function_exists('parkingPrefix')) {
    function parkingPrefix()
    {
        $settings = settings();
        return $settings["parking_prefix"];
    }
}

if (!function_exists('timeCalculation')) {
     function timeCalculation($startDate,$startTime,$endDate,$endTime)
    {
        $startdate= $startDate.' '.$startTime;
        $enddate=$endDate.' '.$endTime;

        $startDateTime = new DateTime($startdate);
        $endDateTime = new DateTime($enddate);

         $interval = $startDateTime->diff($endDateTime);
         $totalHours = $interval->h + $interval->i / 60;

        return number_format($totalHours,2);
    }
}

if (!function_exists('setup')) {
     function setup()
    {
        $setupPath=storage_path() . "/installed";
        return $setupPath;
    }
}

if (!function_exists('format_duration')) {
    function format_duration($duration)
    {
        // Explode the input string into its components
        list($days, $time) = explode(' ', $duration);
        list($hours, $minutes, $seconds) = explode(':', $time);

        // Format the duration
        return sprintf('%d day%s %d hour%s %d minute%s %d second%s',
            $days, $days > 1 ? 's' : '',
            $hours, $hours > 1 ? 's' : '',
            $minutes, $minutes > 1 ? 's' : '',
            $seconds, $seconds > 1 ? 's' : ''
        );
    }
}
