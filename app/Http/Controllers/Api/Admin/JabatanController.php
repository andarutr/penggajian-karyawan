<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
	public function index()
	{
		$jabatan = Jabatan::get();
		
		return response()->json([
			'data' => $jabatan
		]);	
	}

	public function create()
	{
		// ...
	}

	public function store(Request $req)
	{
		$store = Jabatan::create([
			'jabatan' => $req->jabatan
		]);

		return response()->json([
			'message' => 'Berhasil menambahkan data jabatan!'
		]);
	}

	public function edit(Request $req, $id)
	{
		// ...
	}

	public function update(Request $req, $id)
	{
		$update = Jabatan::where('id', $id)->update([
			'jabatan' => $req->jabatan
		]);

		if($update)
		{
			return response()->json([
				'message' => 'Berhasil memperbarui data jabatan!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal memperbarui data jabatan!'
			]);
		}
	}

	protected function destroy($id)
	{
		$destroy = Jabatan::where('id', $id)->delete();

		if($destroy)
		{
			return response()->json([
				'message' => 'Berhasil menghapus data jabatan!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal menghapus data jabatan!'
			]);
		}
	}
}