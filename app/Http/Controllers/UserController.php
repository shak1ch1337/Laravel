<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return User::find($user);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

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
