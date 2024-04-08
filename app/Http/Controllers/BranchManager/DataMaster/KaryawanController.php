<?php

namespace App\Http\Controllers\BranchManager\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $karyawan = User::where('kantor_id',Auth::user()->kantor_id)->latest('nomor_induk_karyawan')->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('branch-manager.data-master.karyawan.index',compact('karyawan'));
    }
}
