<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostUser;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
	public function index()
	{
		$user = User::get();

		return response()->json([
			'data' => $user
		]);
	}

	public function create()
	{
		// ...
	}

	public function store(PostUser $req)
	{
		$store = User::create([
			'nik' => $req->nik,
			'nama_lengkap' => $req->nama_lengkap,
			'jenis_kelamin' => $req->jenis_kelamin,
			'status' => $req->status,
			'agama' => $req->agama,
			'kewarganegaraan' => $req->kewarganegaraan,
			'email' => $req->email,
			'password' => \Hash::make('test123'),
			'divisi_id' => $req->divisi_id,
			'jabatan_id' => $req->jabatan_id,
			'role_id' => $req->role_id
		]);

		return response()->json([
			'message' => 'Berhasil menambah akun!'
		]);
	}

	public function edit(UpdateUser $req, $id)
	{
		// ...
	}

	public function update(UpdateUser $req, $id)
	{
		$update = User::where('id', $id)->update([
			'nik' => $req->nik, // NULL
			'nama_lengkap' => $req->nama_lengkap,
			'jenis_kelamin' => $req->jenis_kelamin,
			'status' => $req->status,// NULL
			'agama' => $req->agama,
			'kewarganegaraan' => $req->kewarganegaraan,
			'email' => $req->email,
			'password' => \Hash::make($req->password),
			'divisi_id' => $req->divisi_id,
			'jabatan_id' => $req->jabatan_id,
			'role_id' => $req->role_id
		]);

		if($update)
		{
			return response()->json([
				'message' => 'Berhasil memperbarui akun!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal memperbarui akun!'
			]);
		}
		
	}	

	protected function destroy($id)
	{
		$destroy = User::where('id', $id)->delete();

		if($destroy)
		{
			return response()->json([
				'message' => 'Berhasil menghapus akun!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal menghapus akun!'
			]);
		}
	}
}