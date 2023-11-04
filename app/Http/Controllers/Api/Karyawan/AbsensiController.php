<?php

namespace App\Http\Controllers\Api\Karyawan;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Requests\PostAbsensi;
use App\Http\Controllers\Controller;
use Adrianorosa\GeoLocation\GeoLocation;

class AbsensiController extends Controller
{
    public function create()
    {
        // ...
    }

    public function store(PostAbsensi $req)
    {
        $location = GeoLocation::lookup();
        $store = Absensi::create([
            'user_id' => $req->user_id, // Auth::user()->id
            'waktu' => now(),
            'kota' => $location->getCity(),
            'longitude' => $location->getLongitude(),
            'latitude' => $location->getLatitude(),
            'keterangan' => $req->keterangan
        ]);
        
        return response()->json([
            'message' => $req->keterangan == 'Hadir' ? 'Terimakasih telah hadir :)' : 'Semoga lekas sembuh ya :)' 
        ]);
    }
}
