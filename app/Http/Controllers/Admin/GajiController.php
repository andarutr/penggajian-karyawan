<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gaji;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Requests\PostGaji;
use App\Http\Controllers\Controller;

class GajiController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Penggajian';
        $data['gaji'] = Gaji::orderByDesc('id')->paginate(8);

        return view('pages.admin.gaji.index', $data);
    }

 	public function show($id)
    {
        $data['menu'] = 'Show Gaji Karyawan';
        $data['gaji'] = Gaji::where('id', $id)->first();
        $data['user'] = User::where('id', $data['gaji']->user_id)->first();

        return view('pages.admin.gaji.show', $data);
    }

    public function create()
    {
        $data['menu'] = 'Input Gaji Karyawan';
        $data['users'] = User::get();

        return view('pages.admin.gaji.create', $data);
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
            'user_id' => 'required',
            'tunjangan' => 'required'
        ]);

    	$absen = Absensi::where(['user_id' => $req->user_id, 'keterangan' => 'Tidak Hadir'])->count();
        $user = User::where('id', $req->user_id)->first();
    	$gapok_otomatis = ($user->jabatan->jabatan === 'Direktur') ? 20000000 : (($user->jabatan->jabatan === 'Manager') ? 12000000 : 5100000);
        $store = Gaji::create([
			'no_slip' => date('Ymd').substr($user->nik, 14, 16),
			'user_id' => $req->user_id,
			'gaji_pokok' => $gapok_otomatis,
            'absen' => $absen,
			'tunjangan' => $req->tunjangan,
			'total_gaji' => $gapok_otomatis,
			'created_at' => $req->periode,
			'updated_at' => $req->periode
		]);

		return redirect('/admin/penggajian')->with('success','Berhasil menambah slip gaji!');
    }

    public function edit($id)
    {
        $data['menu'] = 'Memperbarui Gaji Karyawan';
        $data['gaji'] = Gaji::where('id', $id)->first();
        $data['users'] = User::get();

        return view('pages.admin.gaji.edit', $data);
    }

    public function update(Request $req, $id)
    {
    	$this->validate($req, [
    		'no_slip' => 'required',
            'user_id' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required'
        ]);

    	$absen = Absensi::where(['user_id' => $req->user_id, 'keterangan' => 'Tidak Hadir'])->count();
    	$store = Gaji::where('id', $id)->update([
			'no_slip' => $req->no_slip,
			'user_id' => $req->user_id,
			'gaji_pokok' => $req->gaji_pokok,
			'absen' => $absen,
			'tunjangan' => $req->tunjangan,
			'total_gaji' => $req->gaji_pokok * 12,
			'created_at' => $req->periode,
			'updated_at' => $req->periode
		]);

		return redirect('/admin/penggajian')->with('success','Berhasil menambah slip gaji!');
    }

    public function destroy($id)
    {
    	$destroy = Gaji::where('id', $id)->delete();
    	return redirect('/admin/penggajian')->with('success', 'Berhasil menghapus slip gaji!');
    }
}