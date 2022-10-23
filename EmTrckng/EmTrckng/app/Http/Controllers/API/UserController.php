<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CheckInOut;
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
    
    public function checkInOut(Request $request)
    {
        $userId = $request->user_id;
        $date = $request->date;
        $status = $request->status;
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $address = $request->address;

        $checkData = CheckInOut::where('user_id','=',$userId)->where('date','=',$date)->select('id')->first();

        if(!empty($checkData->id))
        {
            $checkInOut = CheckInOut::findOrFail($checkData->id);
            $checkInOut->user_id = $userId;
            $checkInOut->date = $date;
            $checkInOut->flag = 1;
            $checkInOut->check_in = $checkIn;
            $checkInOut->latitude = $latitude;
            $checkInOut->longitude = $longitude;
            $checkInOut->address = $address;
            $checkInOut->update();

            return response()->json(['data' => $checkInOut->id , 'message' => 'User Check Out Successfull.'], 200);
        }
        else
        {
            $checkInOut = new CheckInOut();
            $checkInOut->user_id = $userId;
            $checkInOut->date = $date;
            $checkInOut->flag = 0;
            $checkInOut->check_in = $checkIn;
            $checkInOut->latitude = $latitude;
            $checkInOut->longitude = $longitude;
            $checkInOut->address = $address;
            $checkInOut->save();

            return response()->json(['data' => $checkInOut->id , 'message' => 'User Check In Successfull.'], 200);
        }
    }
}
