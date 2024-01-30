<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\GaleriKantor;
use App\Models\Kantor;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kantor = Kantor::with('kota','kecamatan','kelurahan')->findOrFail(Auth::user()->kantor_id);
        $galeri_kantor = GaleriKantor::where('kantor_id',Auth::user()->kantor_id)->offset(0)->limit(5)->get();
        return view('admin.data-master.kantor.index',compact('kantor','galeri_kantor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kantor = Kantor::with('provinsi','kota','kecamatan','kelurahan')->findOrFail($id);
        $provinsi = Provinsi::orderBy('nama_provinsi')->get();
        return view('admin.data-master.kantor.edit',compact('kantor','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_kantor' => ['required','max:3','unique:kantor,kode,'.$id.'id'],
            'nama_kantor' => ['required'],
            'email_kantor' => ['required','email','unique:kantor,email,'.$id.'id'],
            'tanggal_didirikan' => ['required'],
            'nomor_telepone_kantor' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $kantor = Kantor::findOrFail($id);
        $kantor->update([
            'kode' => $request->kode_kantor,
            'nama' => $request->nama_kantor,
            'email' => $request->email_kantor,
            'nomor_telepone' => $request->nomor_telepone_kantor,
            'alamat' => $request->alamat,
            'rt_rw' => $request->rt_rw,
            'tanggal_didirikan' => $request->tanggal_didirikan,
        ]);
        return redirect()->route('admin.data-master.kantor.index')->with('success','Berhasil mengedit kantor');
    }

    public function update_provinsi(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal edit provinsi, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $kantor = Kantor::findOrFail($id);
        $kantor->update([
            'provinsi_id' => $request->provinsi,
            'kota_kab_id' => $request->kota_kabupaten,
            'kecamatan_id' => $request->kecamatan,
            'kelurahan_id' => $request->kelurahan,
        ]);
        return back()->with('success','Berhasil mengedit provinsi');
    }

    public function galeri()
    {
        $kantor = Kantor::findOrFail(Auth::user()->kantor_id);
        return view('admin.data-master.kantor.galeri',compact('kantor'));
    }

    public function upload_galeri(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'foto_galeri' => ['required','mimes:png,jpg,jpeg','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $kantor = Kantor::findOrFail($id);
        $foto_upload = $request->file('foto_galeri');
        if (!empty($foto_upload)) {
            $hash = $foto_upload->hashName();
            $original = $foto_upload->getClientOriginalName();
            $ext = $foto_upload->getClientOriginalExtension();
            $size = $foto_upload->getSize();
            $path_new_foto = $kantor->uuid . '/' . $hash;
            $foto_upload->storeAs('public/img/kantor/',$path_new_foto);
            GaleriKantor::create([
                'kantor_id' => $id,
                'hash' => $hash,
                'original' => $original,
                'extention' => $ext,
                'size' => $size,
            ]);
            return back()->with('success','Berhasil mengupload foto galeri');
        }else{
            return back()->with('error','Gagal, periksa kembali inputan!');
        }
    }

    public function delete_galeri(string $id)
    {
        $galeri = GaleriKantor::with('kantor')->findOrFail($id);
        if (File::exists(storage_path('app/public/img/kantor/'.$galeri->kantor->uuid.'/'.$galeri->hash))){
            unlink(storage_path('app/public/img/kantor/'.$galeri->kantor->uuid.'/'.$galeri->hash));
            $galeri->delete();
            session()->flash('success','Berhasil menghapus foto galeri');
            return response()->json([
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'success' => false,
            ],404);
        }
    }
}
