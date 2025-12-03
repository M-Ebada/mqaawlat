<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'gallery';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();

    }

    public function image(): Attribute
    {
        return Attribute::get(function () {

            if($this->hasMedia('image')){
                return $this->getFirstMediaUrl('image');
            }

        });
    }
}
