<?php

namespace App\Http\Controllers\BranchManager\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\GaleriKantor;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KantorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $kantor = Kantor::with('kota','kecamatan','kelurahan')->findOrFail(Auth::user()->kantor_id);
        $galeri_kantor = GaleriKantor::where('kantor_id',Auth::user()->kantor_id)->offset(0)->limit(5)->get();
        return view('branch-manager.data-master.kantor.index',compact('kantor','galeri_kantor'));
    }

    public function galeri()
    {
        $kantor = Kantor::findOrFail(Auth::user()->kantor_id);
        return view('branch-manager.data-master.kantor.galeri',compact('kantor'));
    }
}
