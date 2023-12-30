<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Adrianorosa\GeoLocation\GeoLocation;

class AbsensiController extends Controller
{
	public function index()
	{
		$data['menu'] = 'Absensi';
		$data['absensi'] = Absensi::where('user_id', Auth::user()->id)
									->orderByDesc('id')
									->paginate(8);

		return view('pages.staff.absensi.index', $data);
	}

    public function create()
    {
        $data['menu'] = 'Mulai Absen!';

        return view('pages.staff.absensi.create', $data);
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
    		'picture' => 'required|image',
    		'keterangan' => 'required'
    	]);

    	$file = $req->file('picture');
    	$name_file = Auth::user()->nama_lengkap.date('dmy');
    	$file->move('assets/images/absensi', $name_file);
    	$location = GeoLocation::lookup();
    	$store = Absensi::create([
    		'user_id' => Auth::user()->id,
    		'picture' => $name_file,
            'waktu' => now(),
            'kota' => $location->getCity(),
            'longitude' => $location->getLongitude(),
            'latitude' => $location->getLatitude(),
            'keterangan' => $req->keterangan
    	]);

    	return redirect()->back()->with('success', 'Berhasil absen hari ini!');
    }
}
