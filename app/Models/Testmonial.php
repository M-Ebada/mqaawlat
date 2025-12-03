<?php

namespace App\Models;

use App\Helper\Helper;
use App\Traits\HasTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Testmonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslationTrait;

    protected $table = 'testmonials';

    public function registerMediaCollections():void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function image()
    {
        if($this->hasMedia('image')){
            return $this->getFirstMediaUrl('image');
        }
        return asset('images/sbcf-default-avatar.png');
    }

}
