<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request){
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);
        return $this->responseToken($token);
    }

    private function responseToken($token){
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }

    //revogar token , nao vai poder ser utilizado novamente
    public function logout(){
        \Auth::guard('api')->logout();
        return response()->json([], 204); //No-content
    }

    public function refresh(){
        $token = \Auth::guard('api')->refresh();
        return ['token' => $token];
    }
}
