<?php

namespace App\Http\Controllers;

trait ApiResponseTrait
{

    public function apiResponseData($data = null, $message = null, $additional = null)
    {
        return response()->json(['success'=>1, 'data'=>$data,'additional' => $additional,'message'=>$message],200);
    }


    public function apiResponseMessage( $error,$message = null,$code = 200)
    {
        $array = [
            'success' =>  $error,
            'message' => $message,
            'data'=>null,
        ];
        return response($array, 200);
    }

    public function not_found($array,$arabic,$english,$lang){
        if(is_null($array)){
            // $msg= $lang=='ar' ? $arabic . ' غير موجود' : $english .' not found';
            // return response()->json(['error'=>0,'message'=>$msg,'data'=>null],200);

            $msg= ' غير موجود' ;
            return response()->json(['error'=>0,'message'=>$msg,'data'=>null],200);
        }
    }
}