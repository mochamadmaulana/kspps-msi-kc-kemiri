<?php

namespace App\Http\Controllers\BranchManager\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\KomoditiUsaha;
use Illuminate\Http\Request;

class KomoditiUsahaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $komoditi_usaha = KomoditiUsaha::latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('branch-manager.data-master.komoditi-usaha.index',compact('komoditi_usaha'));
    }
}
