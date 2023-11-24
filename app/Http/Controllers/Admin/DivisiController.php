<?php

namespace App\Http\Controllers\Admin;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Requests\ReqDivisi;
use App\Http\Controllers\Controller;

class DivisiController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Divisi';
        $data['divisi'] = Divisi::get();

        return view('pages.admin.divisi.index', $data);
    }

    public function create()
    {
    	$data['menu'] = 'Tambah Divisi';
        return view('pages.admin.divisi.create', $data);
    }

    // Note : Menggunakan Enum
    public function store(ReqDivisi $req)
    {
    	$store = Divisi::create([
			'divisi' => $req->divisi
		]);

		return redirect('/admin/divisi')->with('success','Berhasil menambah divisi!');
    }

    public function edit($id)
    {
    	$data['menu'] = 'Memperbarui Divisi';
    	$data['divisi'] = Divisi::where('id', $id)->first();

        return view('pages.admin.divisi.edit', $data);
    }

    public function update(ReqDivisi $req, $id)
    {
    	$update = Divisi::where('id', $id)->update([
			'divisi' => $req->divisi
		]);

		return redirect('/admin/divisi')->with('success','Berhasil memperbarui divisi!');
    }

    public function destroy($id)
    {
    	$destroy = Divisi::where('id', $id)->delete($id);
    	return redirect('/admin/divisi')->with('success','Berhasil menghapus divisi!');
    }
}
