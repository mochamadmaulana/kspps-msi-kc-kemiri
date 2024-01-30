<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlamatAnggota;
use App\Models\Anggota;
use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->_forget_data_session();
        $pembiayaan = Pembiayaan::latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        $anggota = Anggota::with('majlis','tempat_lahir','registrasi')->where('kantor_id',Auth::user()->kantor_id)->latest()->get();
        return view('admin.pembiayaan.index',compact('pembiayaan','anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pilih_anggota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anggota' => ['required']
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal pilih anggota!')->withErrors($validator)->withInput();
        }
        $anggota = Anggota::with('tempat_lahir','usaha')->findOrFail($request->anggota);
        $alamat = AlamatAnggota::with('provinsi','kota','kecamatan','kelurahan')->where('anggota_id',$anggota->id)->first();
        // echo json_encode($alamat->alamat);die;
        Session::put(['id_anggota' => $anggota->id]);
        Session::put(['jenis_identitas' => $anggota->jenis_identitas]);
        Session::put(['nomor_identitas' => $anggota->nomor_identitas]);
        Session::put(['nama_lengkap' => $anggota->nama_lengkap]);
        Session::put(['tempat_tanggal_lahir' => $anggota->tempat_lahir->nama_kota.', '.date('d-M-Y',strtotime($anggota->tanggal_lahir))]);
        Session::put(['nomor_telepone' => $anggota->nomor_telepone]);
        Session::put(['alamat' => $alamat->alamat]);
        Session::put(['rt' => $alamat->rt]);
        Session::put(['rw' => $alamat->rw]);
        Session::put(['kode_pos' => $alamat->kode_pos]);
        Session::put(['provinsi' => $alamat->provinsi->nama_provinsi]);
        Session::put(['kota' => $alamat->kota->nama_kota]);
        Session::put(['kecamatan' => $alamat->kecamatan->nama_kecamatan]);
        Session::put(['kelurahan' => $alamat->kelurahan->nama_kelurahan]);
        Session::put(['pendidikan_terakhir' => $anggota->pendidikan_terakhir]);
        Session::put(['nomor_kartu_keluarga' => $anggota->nomor_kartu_keluarga]);
        Session::put(['jenis_usaha' => $anggota->usaha->jenis_usaha->nama]);
        Session::put(['komoditi_usaha' => $anggota->usaha->komoditi_usaha->nama]);
        Session::put(['deskripsi' => $anggota->usaha->deskripsi ?? '...']);
        Session::put(['pendapatan_perbulan' => $anggota->usaha->pendapatan_perbulan]);
        Session::put(['majlis' => $anggota->majlis->kode . ' ' . $anggota->majlis->nama]);
        Session::put(['nama_ibu_kandung' => $anggota->nama_ibu_kandung]);
        return redirect()->route('admin.pembiayaan.create')->with('success','Berhasil pilih anggota');
    }

    public function create()
    {
        // $anggota = Anggota::where('kantor_id',Auth::user()->kantor_id)->latest()->get();
        return view('admin.pembiayaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function _forget_data_session()
    {
        Session::forget('id_anggota');
        Session::forget('nomor_identitas');
        Session::forget('nama_lengkap');
        Session::forget('tempat_tanggal_lahir');
        Session::forget('nomor_telepone');
        Session::forget('alamat');
        Session::forget('rt');
        Session::forget('rw');
        Session::forget('kode_pos');
        Session::forget('provinsi');
        Session::forget('kota');
        Session::forget('kecamatan');
        Session::forget('kelurahan');
        Session::forget('pendidikan_terakhir');
        Session::forget('nomor_kartu_keluarga');
        Session::forget('jenis_usaha');
        Session::forget('komoditi_usaha');
        Session::forget('deskripsi');
        Session::forget('pendapatan_perbulan');
        Session::forget('majlis');
        Session::forget('nama_ibu_kandung');
    }
}
