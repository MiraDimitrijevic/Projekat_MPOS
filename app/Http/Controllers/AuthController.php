<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
  
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:40|email|unique:users',
            'password' => 'required|min:8',
            'biography' => 'required|max:255',
            
           

            
        ]);


        if ($validator->fails())
            return response()->json($validator->errors());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'biography'=>$request->biography,
            'status'=>'active',
            'profile_photo_path'=>'profile_1.png',

           
        ]);

        $token = $user->createToken('registration_token')->plainTextToken;

        return response()->json(['statusCode'=>200,  'data' => $token, 'token_type' => 'Bearer']);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['success'=> false]);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['statusCode'=>200,  'token' => $token, 'token_type' => 'Bearer']);
    }
    
    public function logout()
    {
        $user = Auth::user();
        $user->tokens->each(function($token, $key) {
            $token->delete();
        });
        return response()
        ->json(['statusCode'=>200,'data'=>"You have successfully logged out"]);
    }
}
