<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function index()
    {
    	$data['menu'] = 'Change Password';
    	return view('pages.settings.change_password', $data);
    }

    protected function update(ChangePasswordRequest $req)
    {
    	if(auth()->attempt(['email' => Auth::user()->email, 'password' => $req->old_password]))
    	{
	    	$update = User::where('email', Auth::user()->email)->update([
	    		'password' => \Hash::make($req->new_password)
	    	]);
			
			return redirect()->back()->with('success', 'Berhasil memperbarui password!');
    	}else{
			return redirect()->back()->with('failed', 'Password salah!');
    	}
    }
}
