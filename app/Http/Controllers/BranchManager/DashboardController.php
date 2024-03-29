<?php

namespace App\Http\Controllers\BranchManager;

use App\Http\Controllers\Controller;
use App\Models\GaleriKantor;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $uuid_kantor = Kantor::with('kota','kecamatan','kelurahan')->findOrFail(Auth::user()->kantor_id)->uuid;
        $galeri_kantor = GaleriKantor::where('kantor_id',Auth::user()->kantor_id)->offset(0)->limit(5)->get();
        return view('branch-manager.dashboard',compact('galeri_kantor','uuid_kantor'));
    }
}
