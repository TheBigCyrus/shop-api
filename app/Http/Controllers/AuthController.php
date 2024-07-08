<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = validator::make($request->all(),[
            'name' => 'required|string' ,
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required' ,
            'c_password' => 'required|same:password'
        ]);
        if ($validate->fails()){
            return  $validate->messages();
        }

        $user = User::create([
            'name' => $request->name ,
            'email' => $request->email  ,
            'password' => bcrypt($request->password ) ,
        ]);

        $token = $user->createToken('kourosh')->plainTextToken;
        return response()->json([
            'user' => $user ,
            'token' => $token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $validate = validator::make($request->all(),[
            'email' => 'required|email|exists:users,email' ,
            'password' => 'required' ,

        ]);
        if ($validate->fails()){
            return  $validate->messages();
        };
        $user = User::where('email',$request->email)->first();
        if (!Hash::check($request->password , $user->password)){
            return  Response()->json('پسورد غلط است');
        }else{
            $token = $user->createToken('kourosh')->plainTextToken;
            return response()->json([
                'user' => $user ,
                'token' => $token
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function logOut(Request $request)
    {
        auth()->user()->tokens()->delete();
        return \response()->json('ok');
    }

}
