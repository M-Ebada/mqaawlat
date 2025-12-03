<?php

namespace App\Models;

use App\Helper\Helper;
use App\Traits\HasTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslationTrait, InteractsWithMedia;

    protected $table = 'products';

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
            return asset('logo.png');

        });
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
