<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\ReqRoles;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::get();
        return response()->json([
                        'data' => $role
                    ]);
    }

    public function create()
    {
        // ...
    }

    public function store(ReqRoles $req)
    {
        $store = Role::create([
            'role' => $req->role
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan data role!'
        ]);
    }

    public function edit(ReqRoles $req, $id)
    {
        // ...
    }

    public function update(ReqRoles $req, $id)
    {
        $update = Role::where('id', $id)->update([
            'role' => $req->role
        ]);

        if($update){
            return response()->json([
                'message' => 'Berhasil memperbarui data role!'
            ]);
        }else{
            return response()->json([
                'message' => 'Gagal memperbarui data role!'
            ]);
        }
    }

    protected function destroy($id)
    {
        $destroy = Role::where('id', $id)->delete();

        if($destroy){
            return response()->json(['message' => 'Berhasil menghapus role!']);
        }else{
            return response()->json(['message' => 'Gagal menghapus role!']);
        }
    }
}
