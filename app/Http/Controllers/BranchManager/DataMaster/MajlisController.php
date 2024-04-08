<?php

namespace App\Http\Controllers\BranchManager\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Majlis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MajlisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majlis = Majlis::where('kantor_id',Auth::user()->kantor_id)->latest('kode')->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('branch-manager.data-master.majlis.index',compact('majlis'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $majlis = Majlis::findOrFail($id);
        return view('branch-manager.data-master.majlis.detail',compact('majlis'));
    }
}
