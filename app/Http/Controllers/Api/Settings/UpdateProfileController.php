<?php

namespace App\Http\Controllers\Api\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateProfileController extends Controller
{
    public function edit()
    {
    	// ...
    }

    protected function update(Request $req)
    {
    	// Not For APIs
    	// $this->validate($req, [
    	// 	'nik' => 'required|unique:users|numeric',
     //        'nama_lengkap' => 'required|alpha',
     //        'jenis_kelamin' => 'required|alpha',
     //        'status' => 'required|alpha',
     //        'agama' => 'required|alpha',
     //        'kewarganegaraan' => 'required|alpha',
     //        'divisi_id' => 'required|numeric',
     //        'jabatan_id' => 'required|numeric',
     //        'role_id' => 'required|numeric'
    	// ]);
    	// $update = User::where('email', Auth::user()->email)
    	// 				->update([
    	// 					'nik' => $req->nik,
				 //            'nama_lengkap' => $req->nama_lengkap,
				 //            'jenis_kelamin' => $req->jenis_kelamin,
				 //            'status' => $req->status,
				 //            'agama' => $req->agama,
				 //            'kewarganegaraan' => $req->kewarganegaraan,
				 //            'divisi_id' => $req->divisi_id,
				 //            'jabatan_id' => $req->jabatan_id,
				 //            'role_id' => $req->role_id
    	// 				]);

    	// For APIs
    	$update = User::where('email', $req->email)
    					->update([
    						'nik' => $req->nik,
				            'nama_lengkap' => $req->nama_lengkap,
				            'jenis_kelamin' => $req->jenis_kelamin,
				            'status' => $req->status,
				            'agama' => $req->agama,
				            'kewarganegaraan' => $req->kewarganegaraan,
				            'divisi_id' => $req->divisi_id,
				            'jabatan_id' => $req->jabatan_id,
				            'role_id' => $req->role_id
    					]);

    	if($update)
    	{
    		return response()->json([
    			'message' => 'Berhasil memperbarui profile'
    		]);
    	}else{
    		return response()->json([
    			'message' => 'Gagal memperbarui profile'
    		]);
    	}
    }
}
