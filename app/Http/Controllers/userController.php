<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function authentication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'number' => 'required|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'address' => 'nullable|string|max:255',
            'agent_id' => 'nullable|string|max:100',
            'referral_code' => 'nullable|string|max:100',
            'other_referral_code' => 'nullable|string|max:100',
            'fcm_token' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        $user = userModel::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'gender' => $request->gender,
            'address' => $request->address,
            'agent_id' => $request->agent_id,
            'referral_code' => $request->referral_code,
            'other_referral_code' => $request->other_referral_code,
            'fcm_token' => $request->fcm_token,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user,
        ], 200);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = userModel::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password.',
            ], 401);
        }

        $token = $user->createToken('santum_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user,
        ]);
    }
}
