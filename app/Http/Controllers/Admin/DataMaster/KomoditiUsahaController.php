<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\JenisUsaha;
use App\Models\KomoditiUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KomoditiUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditi_usaha = KomoditiUsaha::latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.data-master.komoditi-usaha.index',compact('komoditi_usaha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_usaha = JenisUsaha::get();
        return view('admin.data-master.komoditi-usaha.create',compact('jenis_usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "jenis_usaha" => ["required"],
            "komoditi" => ["required","max:50"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        KomoditiUsaha::create([
            "jenis_usaha_id" => $request->jenis_usaha,
            "nama" => $request->komoditi,
        ]);
        return back()->with('success','Berhasil menyimpan komoditi usaha');
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
        $jenis_usaha = JenisUsaha::get();
        $komoditi_usaha = KomoditiUsaha::findOrFail($id);
        return view('admin.data-master.komoditi-usaha.edit',compact('jenis_usaha','komoditi_usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "jenis_usaha" => ["required"],
            "komoditi" => ["required","max:50"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $komoditi_usaha = KomoditiUsaha::findOrFail($id);
        $komoditi_usaha->update([
            "jenis_usaha_id" => $request->jenis_usaha,
            "nama" => $request->komoditi,
        ]);
        return redirect()->route('admin.data-master.komoditi-usaha.index')->with('success','Berhasil mengedit komoditi usaha');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komoditi_usaha = KomoditiUsaha::findOrFail($id);
        $komoditi_usaha->delete();
        session()->flash('success','Berhasil menghapus komoditi usaha '.$komoditi_usaha->nama);
        return response()->json([
            'success' => true,
        ],200);
    }
}
