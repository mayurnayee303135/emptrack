<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\IndustryType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();
            
            if($user->role_id == 1) {
                return response()->json(['data' => [] , 'message'=>'Unable to login.'], 200); 
            } else {
                $success['id'] =  $user->id;
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;
                $success['phone'] =  $user->phone;
                $success['dob'] =  $user->dob;
                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                return response()->json(['data' => $success , 'message' => 'Login Successfull.'], 200);
            }
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
    
    public function userAttendance(Request $request)
    {
        $id = $request->attendanceId;
        $userId = $request->user_id;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $user_location = $request->user_location;
        $check_in_date = $request->check_in_date;
        $check_in_time = $request->check_in_time;
        $check_out_date = $request->check_out_date;
        $check_out_time = $request->check_out_time;
    
        if(!empty($id)) {
            $userAttendance = UserAttendance::find($id);         
            if(!is_null($userAttendance)){
                $userAttendance = UserAttendance::findOrFail($id);
                $userAttendance->user_id = $userId;
                $userAttendance->latitude = $latitude;
                $userAttendance->longitude = $longitude;
                $userAttendance->user_location = $user_location;
                $userAttendance->check_out_date = $check_out_date;
                $userAttendance->check_out_time = $check_out_time;
                $userAttendance->update();
                
                return response()->json(['data' => $userAttendance->id , 'message' => 'User attendance check-out Successfull.'], 200);
            } else {
                return response()->json(['data' => [] ,'message' => 'User attendance check-in time not added'], 200);
            }
                
            
        }
        else if(empty($id) || !empty($userId)) {
            $userAttendance = new UserAttendance();
            $userAttendance->user_id = $userId;
            $userAttendance->latitude = $latitude;
            $userAttendance->longitude = $longitude;
            $userAttendance->user_location = $user_location;
            $userAttendance->check_in_date = $check_in_date;
            $userAttendance->check_in_time = $check_in_time;
            $userAttendance->save();
            
            return response()->json(['data' => $userAttendance->id , 'message' => 'User attendance check-in Successfull.'], 200);
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'User id does not exists.'], 200); 
        }
    }
    
    public function userAttendanceList(Request $request){
    
        $userId = $request->user_id;
            
        if(!empty($userId))
        {
            $userAttendanceList = UserAttendance::where('user_id','=',$userId)->select('*')->get()->toArray();
            
            return response()->json(['data' => $userAttendanceList , 'message'=>'Attendance List successfull.'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }
    
    public function getMasterList(Request $request){
        
            $industryType = IndustryType::select('*')->get()->toArray();
            $category = Category::select('*')->get()->toArray();
                
            return response()->json(['data' => ['industryType'=> $industryType, 'category'=>$category], 'message'=>'Master list successfull.'], 200); 
        
    }
   
    
}
