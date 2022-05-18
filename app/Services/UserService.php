<?php

namespace App\Services;

use App\User;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function login(Request $request)
    {
        $user= User::where('email', $request->user_name)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    
        $token = $user->createToken('my-app-token')->plainTextToken;
    
        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response, 201);
    }

    /**
     * Create Category.
     */
    public function register(Request $request)
    {
        //echo '<pre>'; print_r($request->post());
        $validated = Validator::make(request()->all(), [
            'first_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[a-zA-Z0-9 +-<>_@.*$%#&\'"]+$/u'
            ],
            'last_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[a-zA-Z0-9 +-<>_@.*$%#&\'"]+$/u'
            ],
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error occured',
                'data' => [
                    'errors' => $validated->errors()->toArray(),
                ],
            ], 422);
        } else {
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $result = $user->save();

            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Category Successfull Added',
                    'data' => [],
                ], 200);
            } else {
                $data = [
                    'status' => '0',
                    'message' => 'error',
                ];
                return response()->json($data);
            }
        }

    }

   

}
