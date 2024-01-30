<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_induk_karyawan' => ['required'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, Harap periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $karyawan = User::with('tempat_lahir','kantor')->where('nomor_induk_karyawan',$request->nomor_induk_karyawan)->first();
        if (!empty($karyawan) && $request->nomor_induk_karyawan === $karyawan->nomor_induk_karyawan) {
            if (!empty($karyawan) && Hash::check($request->password, $karyawan->password)) {
                if($karyawan->aktif == true){
                    if ($karyawan->role === 'Admin') {
                        Auth::login($karyawan);
                        return redirect()->route('admin.dashboard')->with('success', 'Berhasil, Selamat bekerja..');
                    }elseif($karyawan->role === 'Staff Lapangan') {
                        Auth::login($karyawan);
                        return redirect()->route('staff-lapangan.dashboard')->with('success', 'Login berhasil, Selamat bekerja..');
                    }elseif($karyawan->role === 'Branch Manager') {
                        Auth::login($karyawan);
                        return redirect()->route('branch-manager.dashboard')->with('success', 'Login berhasil, Selamat bekerja..');
                    }elseif($karyawan->role === 'Asmen Pembiayaan') {
                        // Auth::login($karyawan);
                        // return redirect()->route('asmen-pembiayaan.dashboard')->with('success', 'Login berhasil, Selamat bekerja..');
                        return back()->with('error', 'Fitur '.$karyawan->role.' sedang dikembangkan !');
                    }elseif($karyawan->role === 'Asmen Keuangan') {
                        // Auth::login($karyawan);
                        // return redirect()->route('asmen-pembiayaan.dashboard')->with('success', 'Login berhasil, Selamat bekerja..');
                        return back()->with('error', 'Fitur '.$karyawan->role.' sedang dikembangkan !');
                    }else{
                        return back()->with('error', 'Fitur '.$karyawan->role.' sedang dikembangkan !');
                    }
                }else{
                    return back()->with('error', 'Akun tidak aktif!')->withErrors($validator)->withInput();
                }
            }else {
                return back()->with('error','Gagal, Harap periksa kembali inputan!')->withErrors($validator)->withInput();
            }
        } else {
            return back()->with('error','Gagal, Harap periksa kembali inputan!')->withErrors($validator)->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with("success", "Berhasil, sampai jumpa kembali..");
    }
}
