<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function edit()
    {
        $profile = User::with('tempat_lahir')->findOrFail(Auth::user()->id);
        $tempat_lahir = Kota::orderBy('nama_kota')->get();
        return view('admin.profile.edit',compact('profile','tempat_lahir'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_induk_karyawan' => ['required','max:7','min:7','unique:users,nomor_induk_karyawan,'.Auth::user()->id.'id'],
            'email' => ['required','max:150','unique:users,email,'.Auth::user()->id.'id'],
            'nama_lengkap' => ['required','max:150'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $profile = User::findOrFail(Auth::user()->id);
        $profile->update([
            'nomor_induk_karyawan' => $request->nomor_induk_karyawan,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => strtolower($request->email),
            'tempat_lahir_id' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
        return redirect()->route('admin.profile.index')->with('success','Berhasil mengedit profile akun');
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required','min:3'],
            'konfirmasi_password' => ['required','same:password'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit password !')->withErrors($validator)->withInput();
        }
        User::findOrFail(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
        return back()->with('success','Berhasil mengedit password');
    }

    public function upload_foto_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto_profile' => ['required','mimes:png,jpg,jpeg','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupload foto profile !')->withErrors($validator)->withInput();
        }
        $profile = User::findOrFail(Auth::user()->id);
        $foto_profile = $request->file('foto_profile');
        if (!empty($foto_profile)) {
            $hash = $foto_profile->hashName();
            $path = $profile->kantor->uuid . '/' . $hash;
            $foto_profile->storeAs('public/img/foto-profile/',$path);
            $profile->update(['foto_profile'=>$hash]);
            return back()->with('success','Berhasil mengupload foto profile');
        }else{
            return back()->with('error','Gagal, periksa kembali inputan!');
        }
    }

    public function delete_foto_profile()
    {
        $profile = User::findOrFail(Auth::user()->id);
        if (File::exists(storage_path('app/public/img/foto-profile/'.$profile->kantor->uuid.'/'.$profile->foto_profile))){
            unlink(storage_path('app/public/img/foto-profile/'.$profile->kantor->uuid.'/'.$profile->foto_profile));
            $profile->update(['foto_profile'=>NULL]);
            return back()->with('success','Berhasil menghapus foto profile');
        }else{
            return back()->with('error','Gagal menghapus foto profile !');
        }
    }
}
