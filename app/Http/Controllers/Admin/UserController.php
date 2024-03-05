<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'phone' => ['required', 'unique:users,phone'],
            'DOB' => ['date_format:Y-m-d'],
            'gender' => ['required', 'in:male,female'],
            'avatar' => []
        ]);
        User::create($inputs);

        return response()->json([
            'data' => 'User Created'
        ]);

    }

    public function index()
    {
        $users = User::all();

        return response()->json([
            'data' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'data' => $user
        ]);
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $inputs = $request->validate([
            'name' => [''],
            'password' => [''],
            'phone' => ['', Rule::unique('users','phone')->ignore($user)],
            'DOB' => ['date_format:Y-m-d'],
            'gender' => ['', 'in:male,female'],
            'avatar' => []
        ]);
        $user->update($inputs);

        return response()->json([
            'data' => 'user updated'
        ]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'is_active'=> false
        ]);

        return response()->json([
            'data' => 'User Deleted'
        ]);
    }
}
