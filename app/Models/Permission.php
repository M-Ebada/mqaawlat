<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BasePermission;
use Spatie\Translatable\HasTranslations;

class Permission extends BasePermission
{
    use HasTranslations;

    public array $translatable = ["title"];

    protected $fillable = ['group'];

}
