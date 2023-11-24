<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\ReqRoles;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
	public function index()
	{
		$data['menu'] = 'Role';
        $data['roles'] = Role::get();

        return view('pages.admin.role.index', $data);
	}

	public function create()
    {
        $data['menu'] = 'Tambah Role';
        return view('pages.admin.role.create', $data);
    }

    // Note : Menggunakan Enum
    public function store(ReqRoles $req)
    {
		$store = Role::create([
			'role' => $req->role
		]);

		return redirect('/admin/role')->with('success','Berhasil menambah role!');
    }

    public function edit($id)
    {
    	$data['menu'] = 'Memperbarui Role';
    	$data['role'] = Role::where('id', $id)->first();

        return view('pages.admin.role.edit', $data);
    }

    public function update(ReqRoles $req, $id)
    {
    	$update = Role::where('id', $id)->update([
			'role' => $req->role
		]);

		return redirect('/admin/role')->with('success','Berhasil memperbarui role!');
    }

    public function destroy($id)
    {
    	$destroy = Role::where('id', $id)->delete();
    	return redirect('/admin/role')->with('success', 'Berhasil menghapus role!');
    }
}