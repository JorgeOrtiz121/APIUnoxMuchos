<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendResponse(string $message, mixed $resultado=[], mixed $error=[], int $code=200){
        $response=['message'=>$message];
        if (!empty($resultado)){
                 $response['data']=$resultado;
        }
        if (!empty($error)){
               $response['errors']=$error;
        }
        
        return response()->json($response,$code);

    }
}
