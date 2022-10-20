<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            return response()->json(['data' => $success , 'message' => 'Login Successfull.'], 200); 
        } 
        else{ 
            return response()->json(['message'=>'Unauthorised'], 401); 
        } 
    }

    public function locationUpdate(Request $request)
    {
        $userId = $request->user_id;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $address = $request->address;

        if(!empty($userId)) {
            $user = User::findOrFail($userId);
            $user->latitude = $latitude;
            $user->longitude = $longitude;
            $user->address = $address;
            $user->update();

            return response()->json(['data' => $user->id , 'message' => 'User Location updated Successfull.'], 200);
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'User id does not exists.'], 200); 
        }
    }
}
