<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $role = \DB::table('roles')->get();
        return response()->json([
                        'data' => $role
                    ]);
    }

    public function create()
    {
        // ...
    }

    public function store(Request $req)
    {
        $store = Role::create([
            'role' => $req->role
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan data role!'
        ]);
    }

    public function edit(Request $req, $id)
    {
        // ...
    }

    public function update(Request $req, $id)
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
        $destroy = Role::destroy($id);

        if($destroy){
            return response()->json(['message' => 'Berhasil menghapus role!']);
        }else{
            return response()->json(['message' => 'Gagal menghapus role!']);
        }
    }
}
