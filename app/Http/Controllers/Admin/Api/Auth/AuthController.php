<?php

namespace App\Http\Controllers\Admin\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Api\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser;

class AuthController extends Controller
{
   public function login(LoginRequest $request){

       if($request->header('Authorization')) {
           $this->revoke($request);
       }

       $credentials = $request->only('email', 'password');

       if( !Auth::attempt( $credentials )){
           return response()->json(['message' => 'Invalid Login Credentials!!' ] , 401);
       }

       $accessToken = Auth::user()->createToken('authToken')->accessToken;

       return response()->json(['user' => Auth::user() , 'access_token' => $accessToken ] , 202);
   }

   public function logout(Request $request){
       $this->revoke($request);
       return response()->json(['message' => 'user logged out successfully!!' ] , 200);
   }

    private function revoke($request){
        $tokenRepository = new TokenRepository();
        $tokenRepository->revokeAccessToken($this->getTokenId($request));
    }

   private function getTokenId($request){
       $token = $request->bearerToken();
       return (new Parser())->parse($token)->getClaims()['jti']->getValue();
   }
}
