<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Absensi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['menu'] = 'Dashboard';
        $data['karyawan'] = User::count();
        $data['divisi'] = Divisi::count();
        $data['jabatan'] = Jabatan::count();
        $data['absensi'] = Absensi::orderByDesc('id')->limit(5)->get();

        return view('pages.admin.dashboard', $data);
    }
}
