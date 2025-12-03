<?php

namespace App\Http\Controllers;

use App\Traits\HandleApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HandleApiResponseTrait;

    public function canAccess($permission){

        if(is_array($permission)){
            $canAccess = false;
            foreach($permission as $singlePermission){
                if(!$canAccess && Gate::allows($singlePermission)){
                    $canAccess = true;
                }
            }

            if($canAccess){
                return true;
            }
            $permission = 'dumb_permission';
        }

        if(!Gate::allows($permission)){
            return abort(403);
        }
    }
}
