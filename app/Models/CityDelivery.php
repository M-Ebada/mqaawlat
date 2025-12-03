<?php

namespace App\Models;

use App\Traits\HasTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class CityDelivery extends Model
{
    use HasFactory, HasTranslationTrait;

    protected $table = 'city_deliveries';

    public function regions():HasMany
    {
        return $this->hasMany(CityDelivery::class,'city_id');
    }

    public function city()
    {
        return CityDelivery::find($this->city_id);
    }
}
