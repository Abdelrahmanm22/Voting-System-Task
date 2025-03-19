<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function apiResponse($data, $message = null, $status = null){
        $array = [
          'data' => $data,
          'message' => $message,
          'status' => $status
        ];
        return response($array,$status);
    }
}
