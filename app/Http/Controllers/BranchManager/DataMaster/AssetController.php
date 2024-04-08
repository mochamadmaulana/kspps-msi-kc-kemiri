<?php

namespace App\Http\Controllers\BranchManager\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $asset = Asset::where('kantor_id',Auth::user()->kantor_id)->latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('branch-manager.data-master.asset.index',compact('asset'));
    }
}
