<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Auth;
use Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password) ) {
            //
            throw ValidationException::withMessages([
                'email' => 'Dear User! Please check your email and password.'
            ]);
        }
     
        return $user->createToken($request->device_name)->plainTextToken;
    }
}
