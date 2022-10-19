<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['id'] =  $user->id;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['phone'] =  $user->phone;
            $success['dob'] =  $user->dob;
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['data' => $success , 'message' => 'Login Successfully.'], 200); 
        } 
        else{ 
            return response()->json(['message'=>'Unauthorised'], 401); 
        } 
    }

}
