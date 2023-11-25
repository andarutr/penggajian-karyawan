<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Absensi';
        $data['absensi'] = Absensi::orderByDesc('id')->paginate(8);

        return view('pages.admin.absensi.index', $data);
    }

    public function search(Request $req)
    {
        $data['menu'] = 'Absensi';
        $search = $req->search;
        $data['absensi'] = Absensi::where('nama_lengkap', 'like', '%'.$search.'%')
                            ->orwhere('keterangan','like','%'.$search.'%')
                            ->orderByDesc('id')
                            ->paginate(8);

        return view('pages.admin.absensi.index', $data);
    }
}