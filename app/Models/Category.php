<?php

namespace App\Models;

use App\Traits\HasTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia, HasTranslationTrait;

    protected $table = 'categories';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }
    
    public function cover(): Attribute
    {
        return Attribute::get(function () {
            if($this->hasMedia('cover')){
                return $this->getFirstMediaUrl('cover');
            }
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'category_id');
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function childs():HasMany
    {
        return $this->hasMany(Category::class , 'category_id');
    }
    
    public function subs():HasMany
    {
        return $this->hasMany(Category::class , 'category_id');
    }

}
