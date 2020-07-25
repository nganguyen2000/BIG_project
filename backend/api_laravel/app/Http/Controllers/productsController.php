<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attempt;
use \Firebase\JWT\JWT;
use App\Product;

class productsController extends Controller
{
    function index(){
        $posts = Product::all();
        return $posts;
    }
    function store(Request $request){
        $name = $request->input('name');
        $username = $request->input('username');
        $phoneNumber = $request->input('phoneNumber');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');

         $hashPassword = Hash::make($password);
        DB::table("users")->insert([
        'username' =>  $username,
        'name'=>$name,
        'password' => $hashPassword,
        'phoneNumber'=>$phoneNumber,
        'email'=>$email,
        'role'=>'user',
        'money'=>0,
        'address'=>$address
        ]);
        
       
   }
   
    
}
