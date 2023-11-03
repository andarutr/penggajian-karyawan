<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Gaji;
use Illuminate\Http\Request;
use App\Http\Requests\PostGaji;
use App\Http\Controllers\Controller;

class GajiController extends Controller
{
	public function index()
	{
		$gaji = Gaji::get();

		return response()->json([
			'data' => $gaji
		]);
	}

	public function create()
	{
		// ...
	}

	public function store(PostGaji $req)
	{
		$store = Gaji::create([
			'no_slip' => $req->no_slip,
			'user_id' => $req->user_id,
			'gaji_pokok' => $req->gaji_pokok,
			'absen' => $req->absen,
			'tunjangan' => $req->tunjangan,
			'total_gaji' => $req->total_gaji
		]);

		return response()->json([
			'message' => 'Berhasil menambahkan gaji bulan '.\Carbon\Carbon::parse(now())->format('F')
		]);
	}

	public function edit(PostGaji $req, $id)
	{
		// ...
	}

	public function update(PostGaji $req, $id)
	{
		$update = Gaji::where('id', $id)->update([
			'no_slip' => $req->no_slip,
			'gaji_pokok' => $req->gaji_pokok,
			'absen' => $req->absen,
			'tunjangan' => $req->tunjangan,
			'total_gaji' => $req->total_gaji
		]);

		if($update)
		{
			return response()->json([
				'message' => 'Berhasil menambahkan gaji bulan '.\Carbon\Carbon::parse(now())->format('F')
			]);
		}else{
			return response()->json([
				'message' => 'Gagal menambahkan gaji bulan '.\Carbon\Carbon::parse(now())->format('F')
			]);
		}
	}

	public function destroy($id)
	{
		$destroy = Gaji::where('id', $id)->delete();

		if($destroy)
		{
			return response()->json([
				'message' => 'Berhasil menambahkan gaji bulan '.\Carbon\Carbon::parse(now())->format('F')
			]);
		}else{
			return response()->json([
				'message' => 'Gagal menambahkan gaji bulan '.\Carbon\Carbon::parse(now())->format('F')
			]);
		}
	}
}