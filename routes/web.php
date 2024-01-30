<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('/',[AuthController::class,'store'])->name('login.store');
});

Route::get('admin',function (){
    return back()->with('error','Maaf, tujuan anda tidak ada!');
});
Route::get('staff-lapangan',function (){
    return back()->with('error','Maaf, tujuan anda tidak ada!');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Get Kota/Kabupaten By ID Provinsi
    Route::get('get-kota-kabupaten/{prov_id}', function(string $prov_id){
        $kota_kab = App\Models\Kota::where('provinsi_id',$prov_id)->orderBy('nama_kota')->get();
        return response()->json($kota_kab);
    });

    // Get Kecamatan By ID Kota/Kabupaten
    Route::get('get-kecamatan/{kota_kab_id}', function(string $kota_kab_id){
        $kecamatan = App\Models\Kecamatan::where('kota_id',$kota_kab_id)->orderBy('nama_kecamatan')->get();
        return response()->json($kecamatan);
    });

    // Get Kelurahan By ID Kecamatan
    Route::get('get-kelurahan/{kec_id}', function(string $kec_id){
        $kelurahan = App\Models\Kelurahan::where('kecamatan_id',$kec_id)->orderBy('nama_kelurahan')->get();
        return response()->json($kelurahan);
    });

    // Get anggota By ID Majelis
    Route::get('get-anggota-majlis/{majlis}', function(string $id){
        $majlis = App\Models\Majlis::findOrFail($id);
        $anggota = App\Models\Anggota::where('majlis_id',$id)->where('id','!=',$majlis->ketua_id)->orderBy('id',"DESC")->get();
        return response()->json($anggota);
    });

    // Get anggota By ID Kantor
    Route::get('get-anggota-kantor/{kantor}', function(string $id){
        $anggota = App\Models\Anggota::where('kantor_id',$id)->latest()->get();
        return response()->json($anggota);
    });

    // Get anggota Aktif By ID Kantor
    Route::get('get-anggota-kantor/aktif/{kantor}', function(string $id){
        $anggota = App\Models\Anggota::where('kantor_id',$id)->where('status','Aktif')->latest()->get();
        return response()->json($anggota);
    });

    // Get anggota By ID
    Route::get('get-anggota/{anggota}', function(string $id){
        $anggota = App\Models\Anggota::with('tempat_lahir')->findOrFail($id);
        return response()->json($anggota);
    });

    // Get Jenis Usaha
    Route::get('get-jenis-usaha', function(){
        $jenis_usaha = App\Models\JenisUsaha::get();
        return response()->json($jenis_usaha);
    });

    // Get Komoditi Usaha By ID Jenis Usaha
    Route::get('get-komoditi-usaha/{jenis_usaha_id}', function(string $id){
        $komoditi_usaha = App\Models\KomoditiUsaha::where('jenis_usaha_id',$id)->orderBy('nama')->get();
        return response()->json($komoditi_usaha);
    });
});
