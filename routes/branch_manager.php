<?php

use App\Http\Controllers\BranchManager\AnggotaController;
use App\Http\Controllers\BranchManager\DashboardController;
use App\Http\Controllers\BranchManager\DataMaster\AssetController;
use App\Http\Controllers\BranchManager\DataMaster\KantorController;
use App\Http\Controllers\BranchManager\DataMaster\KaryawanController;
use App\Http\Controllers\BranchManager\DataMaster\KomoditiUsahaController;
use App\Http\Controllers\BranchManager\DataMaster\MajlisController;
use App\Http\Controllers\BranchManager\DataMaster\PiutangController;
use App\Http\Controllers\BranchManager\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('branch-manager')->name('branch-manager.')->group(function () {

    Route::get('dashboard',DashboardController::class)->name('dashboard');

    Route::prefix('data-master')->name('data-master.')->group(function () {
        Route::get('piutang',[PiutangController::class,'index'])->name('piutang.index');

        Route::get('asset',AssetController::class)->name('asset.index');

        Route::get('kantor',[KantorController::class,'index'])->name('kantor.index');
        Route::get('kantor/{kantor}/galeri',[KantorController::class,'galeri'])->name('kantor.galeri');

        Route::get('karyawan',KaryawanController::class)->name('karyawan.index');

        Route::get('majlis',[MajlisController::class,'index'])->name('majlis.index');
        Route::get('majlis/{id}',[MajlisController::class,'show'])->name('majlis.show');

        Route::get('komoditi-usaha',KomoditiUsahaController::class)->name('komoditi-usaha.index');
    });

    Route::resource('anggota',AnggotaController::class);
    Route::prefix('anggota')->name('anggota.')->group(function () {
        Route::post('persetujuan-registrasi/{id}',[AnggotaController::class,'persetujuan_registrasi'])->name('persetujuan-registrasi');

        Route::put('provinsi/{anggota}/update/{alamat}',[AnggotaController::class,'update_provinsi'])->name('update-provinsi');
        Route::put('jenis-usaha/{anggota}/update/{usaha}',[AnggotaController::class,'update_jenis_usaha'])->name('update-jenis-usaha');
        Route::put('provinsi-usaha/{anggota}/update{id}',[AnggotaController::class,'update_provinsi_usaha'])->name('update-provinsi-usaha');
        Route::put('jenis-usaha-pasangan/{pasangan}/update/{usaha}',[AnggotaController::class,'update_jenis_usaha_pasangan'])->name('update-jenis-usaha-pasangan');
        Route::put('provinsi-usaha-pasangan/{pasangan}/update{id}',[AnggotaController::class,'update_provinsi_usaha_pasangan'])->name('update-provinsi-usaha-pasangan');

        Route::put('identitas/{anggota}/update/{id}',[AnggotaController::class,'update_identitas'])->name('update-identitas');
        Route::put('selfie-identitas/{anggota}/update/{id}',[AnggotaController::class,'update_selfie_identitas'])->name('update-selfie-identitas');
        Route::put('kartu-keluarga/{anggota}/update/{id}',[AnggotaController::class,'update_kartu_keluarga'])->name('update-kartu-keluarga');
        Route::put('pembayaran-registrasi/{anggota}/update/{id}',[AnggotaController::class,'update_pembayaran_registrasi'])->name('update-pembayaran-registrasi');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::get('edit',[ProfileController::class,'edit'])->name('edit');
        Route::put('update',[ProfileController::class,'update'])->name('update');
        Route::post('password/update',[ProfileController::class,'update_password'])->name('update-password');
        Route::post('upload-foto-profile',[ProfileController::class,'upload_foto_profile'])->name('upload-foto-profile');
        Route::delete('delete-foto-profile',[ProfileController::class,'delete_foto_profile'])->name('delete-foto-profile');
    });

});
