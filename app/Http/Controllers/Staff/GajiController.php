<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Models\User;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

    protected function download_pdf($id)
    {
        $data['gaji'] = Gaji::where('id', $id)->first();
        $data['user'] = User::where('id', $data['gaji']->user_id)->first();
        $pdf = Pdf::loadView('pages.pdf.slipgaji', $data);
        return $pdf->download('slipgaji.pdf');
    }

    protected function show_pdf($id)
    {
        $data['gaji'] = Gaji::where('id', $id)->first();
        $data['user'] = User::where('id', $data['gaji']->user_id)->first();
        // $pdf = App::make('pages.pdf.slipgaji', $data);
        // $pdf->loadHTML('<h1>Test</h1>');
        $pdf = Pdf::loadView('pages.pdf.slipgaji', $data);
        return $pdf->stream();
    }
}
