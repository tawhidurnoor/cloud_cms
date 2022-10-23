<?php

use App\Models\Contact;
use App\Models\Footer;
use App\Models\HardwareProduct;
use App\Models\Header;
use App\Models\HeaderSubMenu;
use App\Models\Meta;
use App\Models\Script;
use App\Models\Service;
use App\Models\ServiceGroup;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;

if (!function_exists('geteURL')) {
    function getURL()
    {
        return URL::current();
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}

if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/';
        } else {
            return getBaseURL() . 'public/';
        }
    }
}

if (!function_exists('getMetaMetaTitle')) {
    function getMetaMetaTitle()
    {
        $meta = Meta::findOrFail(1);
        return $meta->meta_title;
    }
}


if (!function_exists('getMetaDescription')) {
    function getMetaDescription()
    {
        $meta = Meta::findOrFail(1);
        return $meta->meta_description;
    }
}

if (!function_exists('getMetaKeywords')) {
    function getMetaKeywords()
    {
        $meta = Meta::findOrFail(1);
        return $meta->keywords;
    }
}

if (!function_exists('getMetaImage')) {
    function getMetaImage()
    {
        $meta = Meta::findOrFail(1);
        return $meta->meta_image;
    }
}

if (!function_exists('getHeader')) {
    function getHeader()
    {
        // return Header::all();
        return json_decode(Header::findOrFail(1)->header_content, true);
    }
}

if (!function_exists('getSubMenu')) {
    function getSubMenu($id)
    {
        return HeaderSubMenu::where('header_id', $id)->get();
    }
}

if (!function_exists('getFooter')) {
    function getFooter()
    {
        return Footer::where('is_active', 1)->first();
    }
}

if (!function_exists('getScripts')) {
    function getScripts($script_name)
    {
        $script = Script::findOrFail(1);
        if ($script_name == 'head') {
            return $script->head_scripts;
        } else {
            return $script->body_scripts;
        }
    }
}

if (!function_exists('getSettings')) {
    function getSettings($setting_name)
    {
        $setting = Setting::findOrFail(1);
        if ($setting_name == 'phone') {
            return $setting->phone;
        } elseif ($setting_name == 'email') {
            return $setting->email;
        } elseif ($setting_name == 'address') {
            return $setting->address;
        } elseif ($setting_name == 'logo_light') {
            return $setting->logo_light;
        } elseif ($setting_name == 'logo_dark') {
            return $setting->logo_dark;
        } elseif ($setting_name == 'website_name') {
            return $setting->website_name;
        } elseif ($setting_name == 'motto') {
            return $setting->motto;
        } elseif ($setting_name == 'favicon') {
            return $setting->favicon;
        }
    }
}


if (!function_exists('getServiceGroups')) {
    function getServiceGroups()
    {
        $service_group = ServiceGroup::all();
        return $service_group;
    }
}

if (!function_exists('getServicesByServiceGroup')) {
    function getServicesByServiceGroup($service_group_id)
    {
        $services = Service::where('service_group_id', $service_group_id)->get();
        return $services;
    }
}

if (!function_exists('getServices')) {
    function getServices()
    {
        $services = Service::all();
        return $services;
    }
}


if (!function_exists('getHardwareProducts')) {
    function getHardwareProducts()
    {
        return HardwareProduct::all();
    }
}

if (!function_exists('unreadQueryCount')) {
    function unreadQueryCount()
    {
        return Contact::where('is_opened', 0)->count();
    }
}
