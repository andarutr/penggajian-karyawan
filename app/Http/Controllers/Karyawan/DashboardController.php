<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    	$data['menu'] = 'Dashboard';
        return view('pages.karyawan.dashboard', $data);
    }
}
