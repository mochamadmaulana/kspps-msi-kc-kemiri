<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataMaster\AssetController;
use App\Http\Controllers\Admin\DataMaster\KantorController;
use App\Http\Controllers\Admin\DataMaster\KaryawanController;
use App\Http\Controllers\Admin\DataMaster\KomoditiUsahaController;
use App\Http\Controllers\Admin\DataMaster\MajlisController;
use App\Http\Controllers\Admin\DataMaster\PiutangController;
use App\Http\Controllers\Admin\Laporan\PengajuanAnggota\DiterimaController;
use App\Http\Controllers\Admin\Laporan\PengajuanAnggota\DitolakController;
use App\Http\Controllers\Admin\PembiayaanController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard',DashboardController::class)->name('dashboard');

    Route::prefix('data-master')->name('data-master.')->group(function () {
        Route::resource('piutang',PiutangController::class)->except('show');
        Route::resource('asset',AssetController::class)->except('show');

        Route::get('kantor',[KantorController::class,'index'])->name('kantor.index');
        Route::get('kantor/{kantor}/edit',[KantorController::class,'edit'])->name('kantor.edit');
        Route::put('kantor/{kantor}/edit',[KantorController::class,'update'])->name('kantor.update');
        Route::put('kantor/update-provinsi/{kantor}',[KantorController::class,'update_provinsi'])->name('kantor.update-provinsi');
        Route::get('kantor/{kantor}/galeri',[KantorController::class,'galeri'])->name('kantor.galeri');
        Route::post('kantor/{kantor}/upload-galeri',[KantorController::class,'upload_galeri'])->name('kantor.galeri.upload');
        Route::delete('kantor/{galeri}/delete-galeri',[KantorController::class,'delete_galeri'])->name('kantor.galeri.delete');

        Route::resource('karyawan',KaryawanController::class)->except('show');
        Route::put('karyawan/{karyawan}/edit-password',[KaryawanController::class,'update_password'])->name('karyawan.edit-password');

        Route::resource('majlis',MajlisController::class);
        Route::post('majlis/store-ketua',[MajlisController::class,'store_ketua'])->name('majlis.store-ketua');
        Route::put('majlis/update-kecamatan/{majlis}',[MajlisController::class,'update_kecamatan'])->name('majlis.update-kecamatan');

        Route::resource('komoditi-usaha',KomoditiUsahaController::class)->except('show');
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

        Route::put('pengajuan-ulang-registrasi/{anggota}',[AnggotaController::class,'pengajuan_ulang_registrasi'])->name('pengajuan-ulang-registrasi');
    });

    Route::resource('pembiayaan',PembiayaanController::class);
    Route::prefix('pembiayaan')->name('pembiayaan.')->group(function () {
        Route::post('pilih-anggota',[PembiayaanController::class,'pilih_anggota'])->name('pilih-anggota');
    });

    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::prefix('pengajuan-anggota')->name('pengajuan-anggota.')->group(function () {
            Route::resource('diterima',DiterimaController::class);
            Route::resource('ditolak',DitolakController::class);
        });
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
