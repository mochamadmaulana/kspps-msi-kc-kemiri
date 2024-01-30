<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::where('kantor_id',Auth::user()->kantor_id)->latest('nomor_induk_karyawan')->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.data-master.karyawan.index',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tempat_lahir = Kota::orderBy('nama_kota')->get();
        $filter = ['Asmen Pembiayaan','Asmen Keuangan','Branch Manager'];
        $role = Helpers::filter_role($filter, Auth::user()->kantor_id, ['Staff Lapangan']);
        return view('admin.data-master.karyawan.create',compact('tempat_lahir','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_induk_karyawan' => ['required','max:7','min:7','unique:users,nomor_induk_karyawan'],
            'nama_lengkap' => ['required','max:150'],
            'email' => ['required','max:150','unique:users,email'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'role' => ['required'],
            'password' => ['required','min:3'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        User::create([
            'nomor_induk_karyawan' => $request->nomor_induk_karyawan,
            'kantor_id' => Auth::user()->kantor_id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'role' => $request->role,
            'tempat_lahir_id' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success','Berhasil menyimpan karyawan');
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
        $karyawan = User::with('tempat_lahir')->where('kantor_id',Auth::user()->kantor_id)->findOrFail($id);
        $tempat_lahir = Kota::orderBy('nama_kota')->get();
        return view('admin.data-master.karyawan.edit',compact('karyawan','tempat_lahir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_induk_karyawan' => ['required','max:7','min:7','unique:users,nomor_induk_karyawan,'.$id.'id'],
            'nama_lengkap' => ['required','max:150'],
            'email' => ['required','max:150','unique:users,email'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'role' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $karyawan = User::findOrFail($id);
        $karyawan->update([
            'nomor_induk_karyawan' => $request->nomor_induk_karyawan,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'role' => $request->role,
            'tempat_lahir_id' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
        return redirect()->route('admin.data-master.karyawan.index')->with('success','Berhasil mengedit karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();
        session()->flash('success','Berhasil menghapus karyawan');
        return response()->json([
            'success' => true,
        ],200);
    }

    public function update_password(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'password_baru' => ['required','min:3'],
            'konfirm_password' => ['required','same:password_baru'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $karyawan = User::findOrFail($id);
        $karyawan->update([
            'password' => Hash::make($request->password_baru),
        ]);
        return back()->with('success','Berhasil mengedit password');
    }
}
