<?php

namespace App\Http\Controllers\BranchManager;

use App\Http\Controllers\Controller;
use App\Models\AlamatAnggota;
use App\Models\Anggota;
use App\Models\HistoriRegistrasiAnggota;
use App\Models\LampiranRegistrasiAnggota;
use App\Models\RegistrasiAnggota;
use App\Models\UsahaAnggota;
use App\Models\UsahaPasanganAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::with('majlis','tempat_lahir','registrasi')->where('kantor_id',Auth::user()->kantor_id)->latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('branch-manager.anggota.index',compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $anggota = Anggota::with('majlis','tempat_lahir','registrasi','pasangan','pasangan.tempat_lahir','histori_registrasi')->findOrFail($id);
        $usaha = UsahaAnggota::with('jenis_usaha','komoditi_usaha','provinsi','kota','kecamatan','kelurahan')->where('anggota_id',$id)->first();
        $usaha_pasangan = UsahaPasanganAnggota::with('jenis_usaha','komoditi_usaha','provinsi','kota','kecamatan','kelurahan')->where('pasangan_anggota_id',$anggota->pasangan->id)->first();
        $alamat = AlamatAnggota::with('provinsi','kota','kecamatan','kelurahan')->where('anggota_id',$id)->where('jenis','Identitas')->first();
        $file_identitas = LampiranRegistrasiAnggota::where('anggota_id',$id)->where('jenis','Identitas')->first();
        $file_selfie_identitas = LampiranRegistrasiAnggota::where('anggota_id',$id)->where('jenis','Selfie Identitas')->first();
        $file_kartu_keluarga = LampiranRegistrasiAnggota::where('anggota_id',$id)->where('jenis','Kartu Keluarga')->first();
        $file_bukti_pembayaran_registrasi = LampiranRegistrasiAnggota::where('anggota_id',$id)->where('jenis','Bukti Pembayaran Registrasi')->first();
        return view('branch-manager.anggota.detail',compact('anggota','alamat','usaha','usaha_pasangan','file_identitas','file_selfie_identitas','file_kartu_keluarga','file_bukti_pembayaran_registrasi'));
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

    public function persetujuan_registrasi(Request $request, String $id)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => ['required','max:200'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal menindak persetujuan registrasi !')->withErrors($validator)->withInput();
        }
        $registrasi_anggota = RegistrasiAnggota::where('anggota_id',$id)->first();
        $registrasi_anggota->persetujuan_branch_manager = $request->status == 1 ? 'Diterima' : 'Ditolak';
        if($request->status == 0){
            $registrasi_anggota->status = 'Ditolak';
        }else{
            $registrasi_anggota->status = 'Diterima';
            Anggota::findOrFail($id)->update(['status'=>'Aktif']);
        }
        $registrasi_anggota->update();
        HistoriRegistrasiAnggota::create([
            'anggota_id' => $id,
            'karyawan_id' => Auth::user()->id,
            'keterangan' => $request->keterangan,
        ]);
        return back()->with('success','Berhasil menindak persetujuan registrasi');
    }
}
