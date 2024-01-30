<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Majlis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MajlisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majlis = Majlis::where('kantor_id',Auth::user()->kantor_id)->latest('kode')->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.data-master.majlis.index',compact('majlis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::where('kota_id',Auth::user()->kantor->kota_kab_id)->orderBy('nama_kecamatan')->get();
        $petugas = User::where('role','!=','Super Admin')->where('kantor_id',Auth::user()->kantor_id)->get();
        return view('admin.data-master.majlis.create',compact('kecamatan','petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "kode" => ["required","numeric","unique:majlis,kode"],
            "nama" => ["required","max:200","unique:majlis,nama"],
            "kecamatan" => ["required"],
            "petugas" => ["required"],
            "tanggal_didirikan" => ["required"],
            "rt_rw" => ["required","max:7"],
            "alamat" => ["required","max:200"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan !')->withErrors($validator)->withInput();
        }
        Majlis::create([
            'kantor_id' => Auth::user()->kantor_id,
            "kode" => $request->kode,
            "kategori" => $request->kategori,
            "nama" => $request->nama,
            "kecamatan_id" => $request->kecamatan,
            "kelurahan_id" => $request->kelurahan,
            "rt_rw" => $request->rt_rw,
            "alamat" => $request->alamat,
            "tanggal_didirikan" => $request->tanggal_didirikan,
            "petugas_id" => $request->petugas,
        ]);
        return back()->with('success','Berhasil menambahkan majlis');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $majlis = Majlis::findOrFail($id);
        return view('admin.data-master.majlis.detail',compact('majlis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kecamatan = Kecamatan::where('kota_id',Auth::user()->kantor->kota_kab_id)->orderBy('nama_kecamatan')->get();
        $petugas = User::where('role','!=','Super Admin')->where('kantor_id',Auth::user()->kantor_id)->get();
        $majlis = Majlis::with('petugas','kecamatan','kelurahan')->findOrFail($id);
        return view('admin.data-master.majlis.edit',compact('kecamatan','petugas','majlis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "kode" => ["required","numeric","unique:majlis,kode,".$id."id"],
            "nama" => ["required","max:200","unique:majlis,nama,".$id."id"],
            "petugas" => ["required"],
            "tanggal_didirikan" => ["required"],
            "rt_rw" => ["required","max:7","min:7"],
            "alamat" => ["required","max:200"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan !')->withErrors($validator)->withInput();
        }
        $majlis = Majlis::findOrFail($id);
        $majlis->update([
            "kode" => $request->kode,
            "kategori" => $request->kategori,
            "nama" => $request->nama,
            "rt_rw" => $request->rt_rw,
            "alamat" => $request->alamat,
            "tanggal_didirikan" => $request->tanggal_didirikan,
            "petugas_id" => $request->petugas,
        ]);
        return redirect()->route('admin.data-master.majlis.index')->with('success','Berhasil mengedit majlis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $majlis = Majlis::findOrFail($id);
        $majlis->delete();
        session()->flash('success','Berhasil menghapus majlis '.$majlis->kode.' '.$majlis->nama);
        return response()->json([
            'success' => true,
        ],200);
    }

    public function store_ketua(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ketua' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, menyimpan ketua majlis !')->withErrors($validator)->withInput();
        }
        $majlis = Majlis::findOrFail($request->id_majlis);
        $majlis->update(['ketua_id' => $request->ketua]);
        return back()->with('success','Berhasil menyimpan ketua majlis '.$majlis->kode .' '.$majlis->nama);
    }

    public function update_kecamatan(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kecamatan' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal edit kecamatan, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $majlis = Majlis::findOrFail($id);
        $majlis->update([
            'kecamatan_id' => $request->kecamatan,
            'kelurahan_id' => $request->kelurahan,
        ]);
        return back()->with('success','Berhasil mengedit kecamatan');
    }
}
