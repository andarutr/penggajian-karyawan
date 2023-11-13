<?php

namespace App\Http\Controllers\Settings;

use Auth;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateProfileController extends Controller
{
	public function index()
	{
		$data['menu'] = 'Profile '.Auth::user()->nama_lengkap;
		
		return view('pages.settings.profile', $data);
	}

    public function edit()
    {
    	$data['menu'] = 'Edit Profile '.Auth::user()->nama_lengkap;
		$data['divisi'] = Divisi::get();
		$data['jabatan'] = Jabatan::get();

		return view('pages.settings.edit_profile', $data); 
    }

    protected function update(Request $req)
    {
    	$this->validate($req, [
    		'nik' => 'required|numeric',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'status_pernikahan' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'divisi_id' => 'required|numeric',
            'jabatan_id' => 'required|numeric'
    	]);

    	if($req->hasFile('picture')){
    		$file = $req->file('picture');
            $file->move('assets/images/users/', $file->getClientOriginalName());
            $update = User::where('email', Auth::user()->email)
    					->update([
    						'nik' => $req->nik,
				            'nama_lengkap' => $req->nama_lengkap,
				            'jenis_kelamin' => $req->jenis_kelamin,
				            'status' => $req->status_pernikahan,
				            'agama' => $req->agama,
            				'picture' => $file->getClientOriginalName(),
				            'kewarganegaraan' => $req->kewarganegaraan,
				            'divisi_id' => $req->divisi_id,
				            'jabatan_id' => $req->jabatan_id
    					]);
    	}else{    		
    		$update = User::where('email', Auth::user()->email)
    					->update([
    						'nik' => $req->nik,
				            'nama_lengkap' => $req->nama_lengkap,
				            'jenis_kelamin' => $req->jenis_kelamin,
				            'status' => $req->status_pernikahan,
				            'agama' => $req->agama,
				            'kewarganegaraan' => $req->kewarganegaraan,
				            'divisi_id' => $req->divisi_id,
				            'jabatan_id' => $req->jabatan_id
    					]);
    	}

    	return redirect()->back()->with('success','Berhasil memperbarui profil!');
    }
}
