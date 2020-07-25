<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attempt;
use \Firebase\JWT\JWT;
class LoginController extends Controller
{
    //

    function login(Request $request)
    {
        // $username = $request->input('username');
        // $password = $request->input('password');
        $credentials = $request->only('username','password');
        $key ="nga12345";       
        if(Auth::Attempt($credentials)){
            $user = Auth::user();
            $userId = $user->id;
            $data =array(
                "user_id"=>$userId
            );
           $token = JWT::encode($data, $key);
           $responData = array("user_id"=>$token);
           return response()->json($responData,200);
        }else{
            $array = array("user_id"=>null);
             return response()->json($array,400);
        }   
    }
    
    function getProfile(){
        $token = request()->header("Authorization");
        $key ="nga12345"; 
        $data = JWT::decode($token, $key, array('HS256'));

        $user = DB::table('users')->find($data->user_id);
        $responData = array("user"=>$user);
        return response()->json($responData, 200);
    }
}
