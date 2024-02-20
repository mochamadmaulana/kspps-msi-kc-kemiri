<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Asset::where('kantor_id',Auth::user()->kantor_id)->latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.data-master.asset.index',compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data-master.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "deskripsi" => ["required","max:225"],
            "nilai_asset" => ["required"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan !')->withErrors($validator)->withInput();
        }
        Asset::create([
            "kantor_id" => Auth::user()->kantor_id,
            "deskripsi" => $request->deskripsi,
            "nilai" => $request->nilai_asset,
        ]);
        return redirect()->route('admin.data-master.asset.index')->with('success','Berhasil menambahkan asset');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset = Asset::findOrFail($id);
        return view('admin.data-master.asset.edit',compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "deskripsi" => ["required","max:225"],
            "nilai_asset" => ["required"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan !')->withErrors($validator)->withInput();
        }
        Asset::findOrFail($id)->update([
            "deskripsi" => $request->deskripsi,
            "nilai" => $request->nilai_asset,
        ]);
        return redirect()->route('admin.data-master.asset.index')->with('success','Berhasil mengedit asset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();
        session()->flash('success','Berhasil menghapus asset');
        return response()->json([
            'success' => true,
        ],200);
    }
}
