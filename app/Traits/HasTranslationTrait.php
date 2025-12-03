<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Translatable\HasTranslations;

trait HasTranslationTrait
{
    use HasTranslations;

    public array $translatable = [
        "title",
        "description",
        "short_description",
        "content",
        "position",
        "address",
        "name",
        "keywords",
        "meta_tags"
    ];
    
}
