<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as BaseRole;
use Spatie\Translatable\HasTranslations;

class Role extends BaseRole
{
    use HasTranslations;

    public array $translatable = ["title"];


}
