<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' =>'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'password' => Hash::make($request->password)
        ] + $validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'User created!',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password'])))
        {
            Auth::user()->tokens()->delete();
            return response()->json([
                'token' => Auth::user()->createToken('api')->plainTextToken
            ]);
        }
        return response()->json([
            'message' => 'Failed!'
        ]);
    }

    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return User::find($user);
    }

    /*public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create($validator->validated());
        return $user;
    }*/

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
    }

    public function destroy(User $user)
    {
        $user->delete();
        return [
            'message' => 'User was deleted'
        ];
    }
}
