<?php

namespace App\Http\Controllers\Api\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function edit(ChangePasswordRequest $req, $id)
    {
    	// ...
    }

    protected function update(ChangePasswordRequest $req)
    {
    	if(auth()->attempt(['email' => $req->email, 'password' => $req->old_password]))
    	{
	    	$update = User::where('email', $req->email)->update([
	    		'password' => \Hash::make($req->new_password)
	    	]);
			
			return response()->json([
				'message' => 'Password berhasil diubah!'
			]);
    	}else{
			return response()->json([
				'message' => 'Password Salah!'
			]);    		
    	}
    }
}
