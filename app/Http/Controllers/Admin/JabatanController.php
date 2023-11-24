<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\ReqJabatan;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
	public function index()
    {
        $data['menu'] = 'Jabatan';
        $data['jabatan'] = Jabatan::get();

        return view('pages.admin.jabatan.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'Tambah Jabatan';
        return view('pages.admin.jabatan.create', $data);
    }

    // Note : Menggunakan Enum
    public function store(ReqJabatan $req)
    {
		$store = Jabatan::create([
			'jabatan' => $req->jabatan
		]);

		return redirect('/admin/jabatan')->with('success','Berhasil menambah jabatan!');
    }

    public function edit($id)
    {
    	$data['menu'] = 'Memperbarui Jabatan';
    	$data['jabatan'] = Jabatan::where('id', $id)->first();

        return view('pages.admin.jabatan.edit', $data);
    }

    public function update(ReqJabatan $req, $id)
    {
    	$update = Jabatan::where('id', $id)->update([
			'jabatan' => $req->jabatan
		]);

		return redirect('/admin/jabatan')->with('success','Berhasil memperbarui jabatan!');
    }

    public function destroy($id)
    {
    	$destroy = Jabatan::where('id', $id)->delete();
    	return redirect('/admin/jabatan')->with('success', 'Berhasil menghapus jabatan!');
    }
}