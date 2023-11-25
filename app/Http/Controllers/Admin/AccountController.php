<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\PostUser;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Management Account';
        $data['users'] = User::orderByDesc('id')->paginate(8);

        return view('pages.admin.account.index', $data);
    }

    public function search(Request $req)
    {
        $data['menu'] = 'Management Account';
        $search = $req->search;
        $data['users'] = User::where('nama_lengkap', 'like', '%'.$search.'%')
                            ->orwhere('email','like','%'.$search.'%')
                            ->orderByDesc('id')
                            ->paginate(8);

        return view('pages.admin.account.index', $data);
    }

    public function show($id)
    {
        $data['menu'] = 'Show Account';
        $data['user'] = User::where('id', $id)->first();

        return view('pages.admin.account.show', $data);
    }

    public function create()
    {
    	$data['menu'] = 'Tambah Account';
    	$data['divisi'] = Divisi::get();
    	$data['jabatan'] = Jabatan::get();
    	$data['roles'] = Role::get();

    	return view('pages.admin.account.create', $data);
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
			'password' => \Hash::make($req->password),
			'divisi_id' => $req->divisi_id,
			'jabatan_id' => $req->jabatan_id,
			'role_id' => $req->role_id
		]);

    	return redirect('/admin/account')->with('success','Berhasil menambah akun!');
    }

    public function edit($id)
    {
    	$data['menu'] = 'Memperbarui Account';
    	$data['divisi'] = Divisi::get();
    	$data['jabatan'] = Jabatan::get();
    	$data['roles'] = Role::get();
    	$data['user'] = User::where('id', $id)->first();

    	return view('pages.admin.account.edit', $data);
    }

    public function update(UpdateUser $req, $id)
    {
    	$update = User::where('id', $id)->update([
			'nik' => $req->nik, 
			'nama_lengkap' => $req->nama_lengkap,
			'jenis_kelamin' => $req->jenis_kelamin,
			'status' => $req->status,
			'agama' => $req->agama,
			'kewarganegaraan' => $req->kewarganegaraan,
			'email' => $req->email,
			'divisi_id' => $req->divisi_id,
			'jabatan_id' => $req->jabatan_id,
			'role_id' => $req->role_id
		]);

    	return redirect('/admin/account')->with('success','Berhasil memperbarui akun!');
    }

    public function destroy($id)
    {
    	$destroy = User::where('id', $id)->delete();
    	return redirect()->back()->with('success','Berhasil menghapus akun!');
    }
}
