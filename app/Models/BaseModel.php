<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function scopeEnabled($query)
    {
        return $query->where("status", 1);
    }

    public function scopeDisabled($query)
    {
        return $query->where("status", 0);
    }

}
