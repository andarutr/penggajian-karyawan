<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $req)
    {
    	$login = Auth::attempt([
    		'email' => $req->email,
    		'password' => $req->password
    	]);

    	if($login)
    	{
    		$user = Auth::user();
    		$user->api_token = Str::random(100);
    		$user->save();
    		return response()->json([
    			'status_code' => 200,
    			'message' => 'Login Berhasil!',
    			'data' => [
    				'nama_lengkap' => $user->nama_lengkap,
    				'email' => $user->email,
    				'api_token' => $user->api_token
    			]
    		]);
    	}else{
    		return response()->json([
    			'status_code' => 404,
    			'message' => 'Login Gagal!'
    		]);
    	}
    }

    public function logout()
    {
    	$logout = Auth::logout();
    	if($logout)
    	{
    		return response()->json(['message' => 'Berhasil logout']);
    	}else{
    	 	return response()->json(['message' => 'Gagal logout']); 
    	}
    }
}
