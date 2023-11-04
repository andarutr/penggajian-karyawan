<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Requests\ReqDivisi;
use App\Http\Controllers\Controller;

class DivisiController extends Controller
{
	public function index()
	{
		$divisi = Divisi::get();
		
		return response()->json([
			'data' => $divisi
		]);	
	}

	public function create()
	{
		// ...
	}

	public function store(ReqDivisi $req)
	{
		$store = Divisi::create([
			'divisi' => $req->divisi
		]);

		return response()->json([
			'message' => 'Berhasil menambahkan data divisi!'
		]);
	}

	public function edit(ReqDivisi $req, $id)
	{
		// ...
	}

	public function update(ReqDivisi $req, $id)
	{
		$update = Divisi::where('id', $id)->update([
			'divisi' => $req->divisi
		]);

		if($update)
		{
			return response()->json([
				'message' => 'Berhasil memperbarui data divisi!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal memperbarui data divisi!'
			]);
		}
	}

	protected function destroy($id)
	{
		$destroy = Divisi::where('id', $id)->delete();

		if($destroy)
		{
			return response()->json([
				'message' => 'Berhasil menghapus data divisi!'
			]);
		}else{
			return response()->json([
				'message' => 'Gagal menghapus data divisi!'
			]);
		}
	}
}