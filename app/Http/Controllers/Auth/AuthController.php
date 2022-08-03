<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthTrait;

class AuthController extends Controller
{
   public function login(Request $request){
       $vData = $request->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required|min:6'
        ],[
            'email.exists' => 'Email or password is incorrect',
        ]);

         if(auth()->attempt($vData)){
              return auth()->user();
         }

        return response()->json(['message' => 'Email or password is incorrect'], 401);
   }
}
