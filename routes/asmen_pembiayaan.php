<?php

// use App\Http\Controllers\StaffLapangan\AnggotaController;
// use App\Http\Controllers\StaffLapangan\DashboardController;
// use App\Http\Controllers\StaffLapangan\PembiayaanController;
// use Illuminate\Support\Facades\Route;

// Route::middleware('auth')->prefix('staff-lapangan')->name('staff-lapangan.')->group(function () {

//     Route::get('dashboard',DashboardController::class)->name('dashboard');

//     Route::resource('anggota',AnggotaController::class);
//     Route::prefix('anggota')->name('anggota.')->group(function () {
//         Route::put('provinsi/{anggota}/update/{alamat}',[AnggotaController::class,'update_provinsi'])->name('update-provinsi');
//         Route::put('jenis-usaha/{anggota}/update/{usaha}',[AnggotaController::class,'update_jenis_usaha'])->name('update-jenis-usaha');
//         Route::put('provinsi-usaha/{anggota}/update{id}',[AnggotaController::class,'update_provinsi_usaha'])->name('update-provinsi-usaha');
//         Route::put('jenis-usaha-pasangan/{pasangan}/update/{usaha}',[AnggotaController::class,'update_jenis_usaha_pasangan'])->name('update-jenis-usaha-pasangan');
//         Route::put('provinsi-usaha-pasangan/{pasangan}/update{id}',[AnggotaController::class,'update_provinsi_usaha_pasangan'])->name('update-provinsi-usaha-pasangan');

//         Route::put('identitas/{anggota}/update/{id}',[AnggotaController::class,'update_identitas'])->name('update-identitas');
//         Route::put('selfie-identitas/{anggota}/update/{id}',[AnggotaController::class,'update_selfie_identitas'])->name('update-selfie-identitas');
//         Route::put('kartu-keluarga/{anggota}/update/{id}',[AnggotaController::class,'update_kartu_keluarga'])->name('update-kartu-keluarga');
//         Route::put('pembayaran-registrasi/{anggota}/update/{id}',[AnggotaController::class,'update_pembayaran_registrasi'])->name('update-pembayaran-registrasi');

//         Route::put('pengajuan-ulang-registrasi/{anggota}',[AnggotaController::class,'pengajuan_ulang_registrasi'])->name('pengajuan-ulang-registrasi');
//     });
//     Route::resource('pembiayaan',PembiayaanController::class);
//     Route::prefix('pembiayaan')->name('pembiayaan.')->group(function () {
//         Route::post('pilih-anggota',[PembiayaanController::class,'pilih_anggota'])->name('pilih-anggota');
//     });
// });
