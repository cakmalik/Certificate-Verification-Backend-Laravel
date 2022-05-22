<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:1|confirmed'
        ]);
        
        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }
        
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Register Success!',
            'data'    => $user  
        ]);
    }
}
