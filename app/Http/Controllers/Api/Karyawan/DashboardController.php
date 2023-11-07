<?php

namespace App\Http\Controllers\Api\Karyawan;

use Auth;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    	// Not For APIs
        // $data['user_count'] = Absensi::where('user_id', Auth::user()->id)->count();
        // $data['new_absensi'] = Absensi::where('user_id', Auth::user()->id)->count();

        // For APIs
        $data['user_count'] = Absensi::where('user_id', 2)->count();
        $data['new_absensi'] = Absensi::where('user_id', 2)->limit(5)->get();

        return response()->json([
        	'data' => [
        		'cards' => [
        			'user_count' => $data['user_count']
        		],
        		'new_absensi' => $data['new_absensi']
        	]
        ]);
    }
}
