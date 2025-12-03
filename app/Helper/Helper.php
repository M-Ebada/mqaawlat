<?php

namespace App\Helper;

use App\Models\GeneralSetting;
use App\Notifications\GlobalNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Exception;
use Log;
use App\Models\Category;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Helper
{
    public static function HtmlToText($text): string
    {
        $str = str_replace('&nbsp;', ' ', $text);
        $str = str_replace('\\r\\n', ' ', $str);
        $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT, 'UTF-8');
        $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
        $str = html_entity_decode($str);
        $str = htmlspecialchars_decode($str);
        return strip_tags($str);
    }

    public static function getNotify()
    {
        return auth()->user()->notifications;
    }

    public static function price($price)
    {
        return number_format($price,2) . " " . __('EGP');
    }

    public static function months(): array
    {
        return [
            "jan" => [
                "title" => __("January"),
                "date" => Carbon::now()->firstOfYear()->format("Y-m-d H:i:s"),
            ],
            "feb" => [
                "title" => __("February"),
                "date" => Carbon::now()->firstOfYear()->addMonth()->format("Y-m-d H:i:s"),
            ],
            "mar" => [
                "title" => __("March"),
                "date" => Carbon::now()->firstOfYear()->addMonths(2)->format("Y-m-d H:i:s"),
            ],
            "apr" => [
                "title" => __("April"),
                "date" => Carbon::now()->firstOfYear()->addMonths(3)->format("Y-m-d H:i:s"),
            ],
            "may" => [
                "title" => __("May"),
                "date" => Carbon::now()->firstOfYear()->addMonths(4)->format("Y-m-d H:i:s"),
            ],
            "june" => [
                "title" => __("June"),
                "date" => Carbon::now()->firstOfYear()->addMonths(5)->format("Y-m-d H:i:s"),
            ],
            "july" => [
                "title" => __("July"),
                "date" => Carbon::now()->firstOfYear()->addMonths(6)->format("Y-m-d H:i:s"),
            ],
            "aug" => [
                "title" => __("August"),
                "date" => Carbon::now()->firstOfYear()->addMonths(7)->format("Y-m-d H:i:s"),
            ],
            "sept" => [
                "title" => __("September"),
                "date" => Carbon::now()->firstOfYear()->addMonths(8)->format("Y-m-d H:i:s"),
            ],
            "oct" => [
                "title" => __("October"),
                "date" => Carbon::now()->firstOfYear()->addMonths(9)->format("Y-m-d H:i:s"),
            ],
            "nov" => [
                "title" => __("November"),
                "date" => Carbon::now()->firstOfYear()->addMonths(10)->format("Y-m-d H:i:s"),
            ],
            "dec" => [
                "title" => __("December"),
                "date" => Carbon::now()->firstOfYear()->addMonths(11)->format("Y-m-d H:i:s"),
            ],
        ];
    }

    public static function getGeneral()
    {
        return Cache::rememberForever('general_setting', function () {
            return GeneralSetting::query()->first();
        });
    }

    public static function translate($to, $word, $source = null, $from = null): ?string
    {
        if ($source != null) {
            return $source;
        }
        if (!is_null($word)) {
            $googleTranslate = new GoogleTranslate();
            if ($from == null) {
                $googleTranslate->setSource();
            } else {
                $googleTranslate->setSource($from);
            }
            $googleTranslate->setTarget($to);
            return $googleTranslate->translate($word);
        }
        return $word ?? "";
    }

    public static function sendNotify($receiver, $data)
    {
        Notification::send($receiver, new GlobalNotification($data));
    }

    public static function setFileName($file): string
    {
        return time() . '-' . Str::random(100) . '.' . $file->extension();
    }

    public static function getMetaTags($product = null)
    {
        if($product == null){
            $gs = self::getGeneral();

            return self::getTags($gs->title , $gs->description , $gs->siteLogo , $gs->meta_tags, $gs);
        }else{

            return self::getTags($product->title , $product->description , $product->image , $product->meta_tags);
        }
    }

    public static function getTags($title, $desc, $logo, $keywords)
    {
        return '
                <meta itemprop="image" content="' . $logo . '">

                <meta property="og:type" content="website">
                <meta property="og:title" content="' . $title . '"> 
                <meta property="og:image" content="'.$logo.'">
                <meta property="og:image:alt" content="'.$title.'">
                <meta property="og:description" content="'.strip_tags($desc).'">
                <meta property="og:site_name" content="'.$title.'">

                <meta name="twitter:site" content="'.config('app.url').'">
                <meta name="twitter:card" content="summary">

                <meta name="twitter:url" content="'.config('app.url').'">
                <meta name="twitter:title" content="'.$title.'">
                <meta name="twitter:description" content="'.strip_tags($desc).'">
                <meta name="twitter:image" content="'.$logo.'">
                <meta name="twitter:image:alt" content="'.$title.'">
                <meta name="twitter:dnt" content="on">
                <link rel="shortcut icon" href="'.\App\Core\Support\Settings::get("favicon").'" type="image/x-icon">
                <link rel="icon" href="'.\App\Core\Support\Settings::get("favicon").'" type="image/x-icon">
                <link rel="apple-touch-icon-precomposed" href="'.\App\Core\Support\Settings::get("favicon").'">

                <meta name="keywords" content="'. $keywords .'">
            ';
    }

    public static function getCategorySubs($category_id)
    {
        $categories = [$category_id];

        $firstSubs = Category::query()->where('category_id', $category_id)->get();

        foreach ($firstSubs as $firstSubDb) {
            $categories[] = $firstSubDb->id;

            $secondSubs = Category::where('category_id', $firstSubDb->id)->pluck('id')->toArray();
            $categories = array_merge($categories, $secondSubs);
        }
        return $categories;
    }

    public static function getSlug($title)
    {
        $slug = strtolower($title);
        
        $slug = str_replace(' ', '-', $slug);
        
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
        
        $slug = preg_replace('/-+/', '-', $slug);
        
        $slug = trim($slug, '-');
        
        return $slug;
    }

}