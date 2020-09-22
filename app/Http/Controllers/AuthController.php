<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /** 
     * Register  
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $results = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

         
        $results['password'] = Hash::make($results['password']);
        $user = User::create($results);
      
        /** User authentication access token is generated here **/
        $token  =  $user->createToken('PatriciaTest')->accessToken;
        $data = [
            'status' => true,
            'message' => 'Account created successfully!',
            'token' => $token,
            'token_type' => 'Bearer'
        ];

        return response()->json(['data' => $data], 201);

    }  




    /** 
     * login  
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request)
    {
        $results = $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        

        // Check if user exits
        $user = User::where([
            ['email', '!=', null],
            ['email', '=', $results['email']],
        ]) ->first();

        if(!empty($user) && Hash::check($results['password'], $user->password)){ 

            $user->last_logged_in = date('Y-m-d h:i:s');
            $user->save();
            
            /** User authentication access token is generated here **/
            $token  =  $user->createToken('PatriciaTest')->accessToken;
            $data = [
                'status' => true,
                'token' => $token,
                'token_type' => 'Bearer'
            ];

            return response()->json(['data' => $data], 200); 
        } 
        else { 

            return response()->json(['error' => 'Invalid Credentials', 'status' => false], 401); 
        } 

    }  


    

    /** 
     * Get user Data
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function userData()
    {
        return response()->json(['user' =>  Auth::user(), 'success' => true], 200);
    } 
    
    

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
    */
    public function logout (Request $request) 
    {
        $request->user()->token()->revoke();

        $data = [
            'message' => "Successfully logged out",
            'status' => true,
        ];
        return response()->json(["data" => $data], 200);
    }
     
}