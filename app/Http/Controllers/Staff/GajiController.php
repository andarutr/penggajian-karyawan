<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Models\Gaji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GajiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
    	$data['menu'] = 'Rincian Gaji';
    	$data['gaji'] = Gaji::where('user_id', Auth::user()->id)
    						->orderByDesc('id')
    						->paginate(8);

        return view('pages.staff.gaji.index', $data);
    }

    public function search(Request $req)
    {
    	$data['menu'] = 'Rincian Gaji';
    	$search = $req->search;
    	$data['gaji'] = Gaji::where('gaji_pokok', 'like', '%'.$search.'%')
    						->orwhere('no_slip','like','%'.$search.'%')
    						->orderByDesc('id')
    						->paginate(8);

        return view('pages.staff.gaji.index', $data);
    }
}
