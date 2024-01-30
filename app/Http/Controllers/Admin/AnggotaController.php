<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlamatAnggota;
use App\Models\Anggota;
use App\Models\HistoriRegistrasiAnggota;
use App\Models\JenisUsaha;
use App\Models\Kota;
use App\Models\LampiranRegistrasiAnggota;
use App\Models\Majlis;
use App\Models\PasanganAnggota;
use App\Models\Provinsi;
use App\Models\RegistrasiAnggota;
use App\Models\UsahaAnggota;
use App\Models\UsahaPasanganAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::with('majlis', 'tempat_lahir', 'registrasi')->where('kantor_id', Auth::user()->kantor_id)->latest()->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tempat_lahir = Kota::orderBy('nama_kota')->get();
        $provinsi = Provinsi::orderBy('nama_provinsi')->get();
        $jenis_usaha = JenisUsaha::get();
        $majlis = Majlis::where('kantor_id', Auth::user()->kantor_id)->latest()->get();
        return view('admin.anggota.create', compact('tempat_lahir', 'majlis', 'provinsi', 'jenis_usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'majlis' => ['required'],
            'nomor_identitas' => ['required', 'max:17'],
            'nomor_kartu_keluarga' => ['required', 'max:17'],
            'nama_lengkap' => ['required', 'max:200'],
            'email' => ['nullable', 'email'],
            'nomor_telepone' => ['required', 'max:13'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'rt' => ['nullable', 'max:3', 'min:3'],
            'rw' => ['nullable', 'max:3', 'min:3'],
            'kode_pos' => ['nullable', 'max:5', 'min:5'],
            'provinsi' => ['required'],
            'agama' => ['required'],
            'status_pernikahan' => ['required'],
            'pendidikan_terakhir' => ['required'],
            'nama_ibu_kandung' => ['required', 'max:200'],
            'jumlah_keluarga' => ['required'],
            'jenis_usaha' => ['required'],
            'deskripsi' => ['nullable', 'max:200'],
            'alamat_usaha' => ['required'],
            'rt_usaha' => ['nullable', 'max:3', 'min:3'],
            'rw_usaha' => ['nullable', 'max:3', 'min:3'],
            'kode_pos_usaha' => ['nullable', 'max:5', 'min:5'],
            'provinsi_usaha' => ['required'],
            'pendapatan_perbulan' => ['required'],
            'nomor_identitas_pasangan' => ['required', 'max:17'],
            'nama_lengkap_pasangan' => ['required', 'max:200'],
            'nomor_telepone_pasangan' => ['required', 'max:13'],
            'tempat_lahir_pasangan' => ['required'],
            'tanggal_lahir_pasangan' => ['required'],
            'agama_pasangan' => ['required'],
            'pendidikan_terakhir_pasangan' => ['required'],
            'jenis_usaha_pasangan' => ['required'],
            'deskripsi_pasangan' => ['nullable', 'max:200'],
            'alamat_usaha_pasangan' => ['required'],
            'rt_usaha_pasangan' => ['nullable', 'max:3', 'min:3'],
            'rw_usaha_pasangan' => ['nullable', 'max:3', 'min:3'],
            'kode_pos_usaha_pasangan' => ['nullable', 'max:5', 'min:5'],
            'provinsi_usaha_pasangan' => ['required'],
            'pendapatan_perbulan_pasangan' => ['required'],
            'biaya' => ['required'],
            'file_identitas' => ['required', 'mimes:png,jpg,jpeg,pdf', 'max:15360'],
            'file_selfie_identitas' => ['required', 'mimes:png,jpg,jpeg,pdf', 'max:15360'],
            'file_kartu_keluarga' => ['required', 'mimes:png,jpg,jpeg,pdf', 'max:15360'],
            'file_bukti_pembayaran_registrasi' => ['required', 'mimes:png,jpg,jpeg,pdf', 'max:15360'],
        ], [
            'alamat_usaha.required' => 'The alamat is required.',
            'rt_usaha.max' => 'The rt field must not be greater than 3 characters.',
            'rt_usaha.min' => 'The rt field must be at least 3 characters.',
            'rw_usaha.max' => 'The rw field must not be greater than 3 characters.',
            'rw_usaha.min' => 'The rw field must be at least 3 characters.',
            'kode_pos_usaha.max' => 'The kode pos field must not be greater than 5 characters.',
            'kode_pos_usaha.min' => 'The kode pos field must be at least 5 characters.',
            'provinsi_usaha.required' => 'The provinsi is required.',
            'nomor_identitas_pasangan.required' => 'The nomor identitas is required.',
            'nomor_identitas_pasangan.max' => 'The nomor identitas field must not be greater than 17 characters.',
            'nama_lengkap_pasangan.required' => 'The nama lengkap is required.',
            'nama_lengkap_pasangan.max' => 'The nama lengkap field must not be greater than 200 characters.',
            'nomor_telepone_pasangan.required' => 'The nomor telepone is required.',
            'nomor_telepone_pasangan.max' => 'The nomor telepone field must not be greater than 13 characters.',
            'tempat_lahir_pasangan.required' => 'The tempat lahir is required.',
            'tanggal_lahir_pasangan.required' => 'The tanggal lahir is required.',
            'agama_pasangan.required' => 'The agama is required.',
            'pendidikan_terakhir_pasangan.required' => 'The pendidikan terakhir is required.',
            'jenis_usaha_pasangan.required' => 'The jenis usaha is required.',
            'deskripsi_pasangan.max' => 'The rw field must not be greater than 200 characters.',
            'alamat_usaha_pasangan.required' => 'The alamat is required.',
            'rt_usaha_pasangan.max' => 'The rt field must not be greater than 3 characters.',
            'rt_usaha_pasangan.min' => 'The rt field must be at least 3 characters.',
            'rw_usaha_pasangan.max' => 'The rw field must not be greater than 3 characters.',
            'rw_usaha_pasangan.min' => 'The rw field must be at least 3 characters.',
            'kode_pos_usaha_pasangan.max' => 'The kode pos field must not be greater than 5 characters.',
            'kode_pos_usaha_pasangan.min' => 'The kode pos field must be at least 5 characters.',
            'provinsi_usaha_pasangan.required' => 'The provinsi is required.',
            'pendapatan_perbulan_pasangan.required' => 'The pendapatan perbulan is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $anggota = Anggota::create([
                "uuid" => uniqid(),
                "kantor_id" => Auth::user()->kantor_id,
                "inputer_id" => Auth::user()->id,
                "majlis_id" => $request->majlis,
                "jenis_keanggotaan" => $request->jenis_keanggotaan,
                "jenis_identitas" => $request->jenis_identitas,
                "nomor_identitas" => $request->nomor_identitas,
                "nama_lengkap" => $request->nama_lengkap,
                "email" => $request->email,
                "nomor_telepone" => $request->nomor_telepone,
                "tempat_lahir_id" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "jenis_kelamin" => $request->jenis_kelamin,
                "agama" => $request->agama,
                "status_pernikahan" => $request->status_pernikahan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "nama_ibu_kandung" => $request->nama_ibu_kandung,
                "nomor_kartu_keluarga" => $request->nomor_kartu_keluarga,
                "jumlah_keluarga" => $request->jumlah_keluarga,
                "pendapatan_lain_lain" => $request->pendapatan_lain_lain,
            ]);
            RegistrasiAnggota::create([
                "anggota_id" => $anggota->id,
                "inputer_id" => Auth::user()->id,
                "status" => "Diajukan",
                "metode_bayar" => $request->metode_bayar,
                "biaya" => $request->biaya,
                "status" => "Diproses",
                "persetujuan_admin" => "Diterima",
            ]);
            AlamatAnggota::create([
                'anggota_id' => $anggota->id,
                'jenis' => 'Identitas',
                'alamat' => $request->alamat,
                'provinsi_id' => $request->provinsi,
                'kota_id' => $request->kota_kabupaten,
                'kecamatan_id' => $request->kecamatan,
                'kelurahan_id' => $request->kelurahan,
                'rt' => $request->rt ?? null,
                'rw' => $request->rw ?? null,
                'kode_pos' => $request->kode_pos ?? null,
            ]);
            $pasangan_anggota = PasanganAnggota::create([
                "anggota_id" => $anggota->id,
                "jenis_identitas" => $request->jenis_identitas_pasangan,
                "nomor_identitas" => $request->nomor_identitas_pasangan,
                "nama_lengkap" => $request->nama_lengkap_pasangan,
                "nomor_telepone" => $request->nomor_telepone_pasangan,
                "tempat_lahir_id" => $request->tempat_lahir_pasangan,
                "tanggal_lahir" => $request->tanggal_lahir_pasangan,
                "jenis_kelamin" => $request->jenis_kelamin_pasangan,
                "agama" => $request->agama_pasangan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir_pasangan,
            ]);
            UsahaAnggota::create([
                'anggota_id' => $anggota->id,
                'jenis_usaha_id' => $request->jenis_usaha,
                'komoditi_usaha_id' => $request->komoditi_usaha,
                'deskripsi' => $request->deskripsi,
                'pendapatan_perbulan' => $request->pendapatan_perbulan,
                'alamat' => $request->alamat_usaha,
                'provinsi_id' => $request->provinsi_usaha,
                'kota_id' => $request->kota_kabupaten_usaha,
                'kecamatan_id' => $request->kecamatan_usaha,
                'kelurahan_id' => $request->kelurahan_usaha,
                'rt' => $request->rt_usaha ?? null,
                'rw' => $request->rw_usaha ?? null,
                'kode_pos' => $request->kode_pos_usaha ?? null,
            ]);
            UsahaPasanganAnggota::create([
                'pasangan_anggota_id' => $pasangan_anggota->id,
                'jenis_usaha_id' => $request->jenis_usaha_pasangan,
                'komoditi_usaha_id' => $request->komoditi_usaha_pasangan,
                'deskripsi' => $request->deskripsi_pasangan,
                'pendapatan_perbulan' => $request->pendapatan_perbulan_pasangan,
                'alamat' => $request->alamat_usaha_pasangan,
                'provinsi_id' => $request->provinsi_usaha_pasangan,
                'kota_id' => $request->kota_kabupaten_usaha_pasangan,
                'kecamatan_id' => $request->kecamatan_usaha_pasangan,
                'kelurahan_id' => $request->kelurahan_usaha_pasangan,
                'rt' => $request->rt_usaha_pasangan ?? null,
                'rw' => $request->rw_usaha_pasangan ?? null,
                'kode_pos' => $request->kode_pos_usaha_pasangan ?? null,
            ]);
            HistoriRegistrasiAnggota::create([
                'anggota_id' => $anggota->id,
                'karyawan_id' => Auth::user()->id,
                'keterangan' => 'Mengajukan anggota baru',
            ]);

            HistoriRegistrasiAnggota::create([
                'anggota_id' => $anggota->id,
                'karyawan_id' => Auth::user()->id,
                'keterangan' => 'Pengajuan anggota diterima',
            ]);
            $folder = Auth::user()->kantor->uuid;
            // Upload file identitas
            if (!empty($request->file('file_identitas'))) {
                $file_identitas = $request->file('file_identitas');
                $hash = $file_identitas->hashName();
                $path_upload_identitas = $folder . '/' . $anggota->uuid . '/' . $hash;
                $file_identitas->storeAs('public/img/', $path_upload_identitas);
                LampiranRegistrasiAnggota::create([
                    'anggota_id' => $anggota->id,
                    'jenis' => 'Identitas',
                    'hash' => $hash,
                    'original' => $file_identitas->getClientOriginalName(),
                    'extention' => $file_identitas->getClientOriginalExtension(),
                    'size' => $file_identitas->getSize(),
                ]);
            }
            // Upload file selfie identitas
            if (!empty($request->file('file_selfie_identitas'))) {
                $file_selfie_identitas = $request->file('file_selfie_identitas');
                $hash = $file_selfie_identitas->hashName();
                $path_upload_selfie_identitas = $folder . '/' . $anggota->uuid . '/' . $hash;
                $file_selfie_identitas->storeAs('public/img/', $path_upload_selfie_identitas);
                LampiranRegistrasiAnggota::create([
                    'anggota_id' => $anggota->id,
                    'jenis' => 'Selfie Identitas',
                    'hash' => $hash,
                    'original' => $file_selfie_identitas->getClientOriginalName(),
                    'extention' => $file_selfie_identitas->getClientOriginalExtension(),
                    'size' => $file_selfie_identitas->getSize(),
                ]);
            }
            // Upload file kartu keluarga
            if (!empty($request->file('file_kartu_keluarga'))) {
                $file_kartu_keluarga = $request->file('file_kartu_keluarga');
                $hash = $file_kartu_keluarga->hashName();
                $path_upload_kartu_keluarga = $folder . '/' . $anggota->uuid . '/' . $hash;
                $file_kartu_keluarga->storeAs('public/img/', $path_upload_kartu_keluarga);
                LampiranRegistrasiAnggota::create([
                    'anggota_id' => $anggota->id,
                    'jenis' => 'Kartu Keluarga',
                    'hash' => $hash,
                    'original' => $file_kartu_keluarga->getClientOriginalName(),
                    'extention' => $file_kartu_keluarga->getClientOriginalExtension(),
                    'size' => $file_kartu_keluarga->getSize(),
                ]);
            }
            // Upload file bukti pembayaran registrasi
            if (!empty($request->file('file_bukti_pembayaran_registrasi'))) {
                $file_bukti_pembayaran_registrasi = $request->file('file_bukti_pembayaran_registrasi');
                $hash = $file_bukti_pembayaran_registrasi->hashName();
                $path_upload_bukti_pembayaran_registrasi = $folder . '/' . $anggota->uuid . '/' . $hash;
                $file_bukti_pembayaran_registrasi->storeAs('public/img/', $path_upload_bukti_pembayaran_registrasi);
                LampiranRegistrasiAnggota::create([
                    'anggota_id' => $anggota->id,
                    'jenis' => 'Bukti Pembayaran Registrasi',
                    'hash' => $hash,
                    'original' => $file_bukti_pembayaran_registrasi->getClientOriginalName(),
                    'extention' => $file_bukti_pembayaran_registrasi->getClientOriginalExtension(),
                    'size' => $file_bukti_pembayaran_registrasi->getSize(),
                ]);
            }
            DB::commit();
            return redirect()->route('admin.anggota.index')->with("success", "Berhasil registrasi anggota");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.anggota.index')->with("error", "Gagal registrasi anggota!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::with('majlis', 'tempat_lahir', 'registrasi', 'pasangan', 'pasangan.tempat_lahir', 'histori_registrasi')->findOrFail($id);
        $usaha = UsahaAnggota::with('jenis_usaha', 'komoditi_usaha', 'provinsi', 'kota', 'kecamatan', 'kelurahan')->where('anggota_id', $id)->first();
        $usaha_pasangan = UsahaPasanganAnggota::with('jenis_usaha', 'komoditi_usaha', 'provinsi', 'kota', 'kecamatan', 'kelurahan')->where('pasangan_anggota_id', $anggota->pasangan->id)->first();
        $alamat = AlamatAnggota::with('provinsi', 'kota', 'kecamatan', 'kelurahan')->where('anggota_id', $id)->where('jenis', 'Identitas')->first();
        $file_identitas = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Identitas')->first();
        $file_selfie_identitas = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Selfie Identitas')->first();
        $file_kartu_keluarga = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Kartu Keluarga')->first();
        $file_bukti_pembayaran_registrasi = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Bukti Pembayaran Registrasi')->first();
        return view('admin.anggota.detail', compact('anggota', 'alamat', 'usaha', 'usaha_pasangan', 'file_identitas', 'file_selfie_identitas', 'file_kartu_keluarga', 'file_bukti_pembayaran_registrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $majlis = Majlis::where('kantor_id', Auth::user()->kantor_id)->latest()->get();
        $tempat_lahir = Kota::orderBy('nama_kota')->get();
        $jenis_usaha = JenisUsaha::get();
        $provinsi = Provinsi::orderBy('nama_provinsi')->get();
        $anggota = Anggota::with('majlis', 'registrasi', 'pasangan', 'pasangan.tempat_lahir')->findOrFail($id);
        $usaha = UsahaAnggota::with('jenis_usaha', 'komoditi_usaha', 'provinsi', 'kota', 'kecamatan', 'kelurahan')->where('anggota_id', $id)->first();
        $usaha_pasangan = UsahaPasanganAnggota::with('jenis_usaha', 'komoditi_usaha', 'provinsi', 'kota', 'kecamatan', 'kelurahan')->where('pasangan_anggota_id', $anggota->pasangan->id)->first();
        $alamat = AlamatAnggota::with('provinsi', 'kota', 'kecamatan', 'kelurahan')->where('anggota_id', $id)->where('jenis', 'Identitas')->first();
        $file_identitas = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Identitas')->first();
        $file_selfie_identitas = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Selfie Identitas')->first();
        $file_kartu_keluarga = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Kartu Keluarga')->first();
        $file_bukti_pembayaran_registrasi = LampiranRegistrasiAnggota::where('anggota_id', $id)->where('jenis', 'Bukti Pembayaran Registrasi')->first();
        return view('admin.anggota.edit', compact('jenis_usaha', 'anggota', 'usaha', 'usaha_pasangan', 'alamat', 'provinsi', 'majlis', 'tempat_lahir', 'file_identitas', 'file_selfie_identitas', 'file_kartu_keluarga', 'file_bukti_pembayaran_registrasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'majlis' => ['required'],
            'nomor_identitas' => ['required', 'max:17'],
            'nomor_kartu_keluarga' => ['required', 'max:17'],
            'nama_lengkap' => ['required', 'max:200'],
            'email' => ['nullable', 'email'],
            'nomor_telepone' => ['required', 'max:13'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'rt' => ['nullable', 'max:3', 'min:3'],
            'rw' => ['nullable', 'max:3', 'min:3'],
            'kode_pos' => ['nullable', 'max:5', 'min:5'],
            'agama' => ['required'],
            'status_pernikahan' => ['required'],
            'pendidikan_terakhir' => ['required'],
            'nama_ibu_kandung' => ['required', 'max:200'],
            'jumlah_keluarga' => ['required'],
            'deskripsi' => ['nullable', 'max:200'],
            'alamat_usaha' => ['required'],
            'rt_usaha' => ['nullable', 'max:3', 'min:3'],
            'rw_usaha' => ['nullable', 'max:3', 'min:3'],
            'kode_pos_usaha' => ['nullable', 'max:5', 'min:5'],
            'pendapatan_perbulan' => ['required'],
            'nomor_identitas_pasangan' => ['required', 'max:17'],
            'nama_lengkap_pasangan' => ['required', 'max:200'],
            'nomor_telepone_pasangan' => ['required', 'max:13'],
            'tempat_lahir_pasangan' => ['required'],
            'tanggal_lahir_pasangan' => ['required'],
            'agama_pasangan' => ['required'],
            'pendidikan_terakhir_pasangan' => ['required'],
            'deskripsi_pasangan' => ['nullable', 'max:200'],
            'alamat_usaha_pasangan' => ['required'],
            'rt_usaha_pasangan' => ['nullable', 'max:3', 'min:3'],
            'rw_usaha_pasangan' => ['nullable', 'max:3', 'min:3'],
            'kode_pos_usaha_pasangan' => ['nullable', 'max:5', 'min:5'],
            'pendapatan_perbulan_pasangan' => ['required'],
            'biaya' => ['required'],
        ], [
            'alamat_usaha.required' => 'The alamat is required.',
            'rt_usaha.max' => 'The rt field must not be greater than 3 characters.',
            'rt_usaha.min' => 'The rt field must be at least 3 characters.',
            'rw_usaha.max' => 'The rw field must not be greater than 3 characters.',
            'rw_usaha.min' => 'The rw field must be at least 3 characters.',
            'kode_pos_usaha.max' => 'The kode pos field must not be greater than 5 characters.',
            'kode_pos_usaha.min' => 'The kode pos field must be at least 5 characters.',
            'nomor_identitas_pasangan.required' => 'The nomor identitas is required.',
            'nomor_identitas_pasangan.max' => 'The nomor identitas field must not be greater than 17 characters.',
            'nama_lengkap_pasangan.required' => 'The nama lengkap is required.',
            'nama_lengkap_pasangan.max' => 'The nama lengkap field must not be greater than 200 characters.',
            'nomor_telepone_pasangan.required' => 'The nomor telepone is required.',
            'nomor_telepone_pasangan.max' => 'The nomor telepone field must not be greater than 13 characters.',
            'tempat_lahir_pasangan.required' => 'The tempat lahir is required.',
            'tanggal_lahir_pasangan.required' => 'The tanggal lahir is required.',
            'agama_pasangan.required' => 'The agama is required.',
            'pendidikan_terakhir_pasangan.required' => 'The pendidikan terakhir is required.',
            'deskripsi_pasangan.max' => 'The rw field must not be greater than 200 characters.',
            'alamat_usaha_pasangan.required' => 'The alamat is required.',
            'rt_usaha_pasangan.max' => 'The rt field must not be greater than 3 characters.',
            'rt_usaha_pasangan.min' => 'The rt field must be at least 3 characters.',
            'rw_usaha_pasangan.max' => 'The rw field must not be greater than 3 characters.',
            'rw_usaha_pasangan.min' => 'The rw field must be at least 3 characters.',
            'kode_pos_usaha_pasangan.max' => 'The kode pos field must not be greater than 5 characters.',
            'kode_pos_usaha_pasangan.min' => 'The kode pos field must be at least 5 characters.',
            'pendapatan_perbulan_pasangan.required' => 'The pendapatan perbulan is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Gagal, periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        $anggota = Anggota::findOrFail($id);
        if (!empty($anggota)) {
            try {
                DB::beginTransaction();
                Anggota::findOrFail($id)->update([
                    "majlis_id" => $request->majlis,
                    "jenis_keanggotaan" => $request->jenis_keanggotaan,
                    "jenis_identitas" => $request->jenis_identitas,
                    "nomor_identitas" => $request->nomor_identitas,
                    "nama_lengkap" => $request->nama_lengkap,
                    "email" => $request->email,
                    "nomor_telepone" => $request->nomor_telepone,
                    "tempat_lahir_id" => $request->tempat_lahir,
                    "tanggal_lahir" => $request->tanggal_lahir,
                    "jenis_kelamin" => $request->jenis_kelamin,
                    "agama" => $request->agama,
                    "status_pernikahan" => $request->status_pernikahan,
                    "pendidikan_terakhir" => $request->pendidikan_terakhir,
                    "nama_ibu_kandung" => $request->nama_ibu_kandung,
                    "nomor_kartu_keluarga" => $request->nomor_kartu_keluarga,
                    "jumlah_keluarga" => $request->jumlah_keluarga,
                    "pendapatan_lain_lain" => $request->pendapatan_lain_lain,
                ]);
                RegistrasiAnggota::where('anggota_id', $id)->first()->update([
                    "metode_bayar" => $request->metode_bayar,
                    "biaya" => $request->biaya,
                ]);
                AlamatAnggota::where('anggota_id', $id)->first()->update([
                    'alamat' => $request->alamat,
                    'rt' => $request->rt ?? null,
                    'rw' => $request->rw ?? null,
                    'kode_pos' => $request->kode_pos ?? null,
                ]);
                $pasangan_anggota = PasanganAnggota::where('anggota_id', $id)->first();
                $pasangan_anggota->update([
                    "jenis_identitas" => $request->jenis_identitas_pasangan,
                    "nomor_identitas" => $request->nomor_identitas_pasangan,
                    "nama_lengkap" => $request->nama_lengkap_pasangan,
                    "nomor_telepone" => $request->nomor_telepone_pasangan,
                    "tempat_lahir_id" => $request->tempat_lahir_pasangan,
                    "tanggal_lahir" => $request->tanggal_lahir_pasangan,
                    "jenis_kelamin" => $request->jenis_kelamin_pasangan,
                    "agama" => $request->agama_pasangan,
                    "pendidikan_terakhir" => $request->pendidikan_terakhir_pasangan,
                ]);
                UsahaAnggota::where('anggota_id', $id)->first()->update([
                    'deskripsi' => $request->deskripsi,
                    'pendapatan_perbulan' => $request->pendapatan_perbulan,
                    'alamat' => $request->alamat_usaha,
                    'rt' => $request->rt_usaha ?? null,
                    'rw' => $request->rw_usaha ?? null,
                    'kode_pos' => $request->kode_pos_usaha ?? null,
                ]);
                UsahaPasanganAnggota::where('pasangan_anggota_id', $pasangan_anggota->id)->first()->update([
                    'deskripsi' => $request->deskripsi_pasangan,
                    'pendapatan_perbulan' => $request->pendapatan_perbulan_pasangan,
                    'alamat' => $request->alamat_usaha_pasangan,
                    'rt' => $request->rt_usaha_pasangan ?? null,
                    'rw' => $request->rw_usaha_pasangan ?? null,
                    'kode_pos' => $request->kode_pos_usaha_pasangan ?? null,
                ]);
                DB::commit();
                return redirect()->route('admin.anggota.index')->with("success", "Berhasil mengedit anggota");
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect()->route('admin.anggota.index')->with("error", "Gagal mengedit anggota !");
            }
        } else {
            return redirect()->route('admin.anggota.index')->with("error", "Gagal mengedit anggota, harap hubungi admin !");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $registrasi = RegistrasiAnggota::where('anggota_id',$id)->first();
        $alamat = AlamatAnggota::where('anggota_id',$id)->first();
        $usaha = UsahaAnggota::where('anggota_id',$id)->first();
        $pasangan = PasanganAnggota::where('anggota_id',$id)->first();
        $usaha_pasangan = UsahaPasanganAnggota::where('pasangan_anggota_id',$pasangan->id)->first();
        $lampiran_registrasi = LampiranRegistrasiAnggota::where('anggota_id',$id)->get();
        $histori_registrasi = HistoriRegistrasiAnggota::where('anggota_id',$id)->get();

        $anggota->delete();
        $registrasi->delete();
        $alamat->delete();
        $usaha->delete();
        $pasangan->delete();
        $usaha_pasangan->delete();
        foreach ($histori_registrasi as $hr) {
            $hr->delete();
        }
        foreach ($lampiran_registrasi as $lr) {
            $lr->delete();
        }
        File::deleteDirectory(storage_path('app/public/img/' . Auth::user()->kantor->uuid . '/' . $anggota->uuid ));
        session()->flash('success', 'Berhasil menghapus anggota ' . $anggota->nama_lengkap);
        return response()->json([
            'success' => true,
        ], 200);
    }

    public function update_provinsi(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => ['required'],
        ],
        [
            'provinsi.required' => 'The provinsi is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit provinsi !')->withErrors($validator)->withInput();
        }
        $alamat = AlamatAnggota::where('id',$id)->where('anggota_id',$id_anggota)->first();
        $alamat->update([
            'provinsi_id' => $request->provinsi,
            'kota_id' => $request->kota_kabupaten,
            'kecamatan_id' => $request->kecamatan,
            'kelurahan_id' => $request->kelurahan,
        ]);
        return back()->with('success','Berhasil mengedit provinsi');
    }

    public function update_jenis_usaha(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_usaha' => ['required'],
        ],
        [
            'jenis_usaha.required' => 'The provinsi is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit jenis usaha anggota !')->withErrors($validator)->withInput();
        }
        $usaha_anggota = UsahaAnggota::where('id',$id)->where('anggota_id',$id_anggota)->first();
        $usaha_anggota->update([
            'jenis_usaha_id' => $request->jenis_usaha,
            'komoditi_usaha_id' => $request->komoditi_usaha,
        ]);
        return back()->with('success','Berhasil mengedit jenis usaha anggota');
    }

    public function update_provinsi_usaha(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_usaha' => ['required'],
        ],
        [
            'provinsi_usaha.required' => 'The provinsi is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit provinsi usaha !')->withErrors($validator)->withInput();
        }
        $alamat = UsahaAnggota::where('id',$id)->where('anggota_id',$id_anggota)->first();
        $alamat->update([
            'provinsi_id' => $request->provinsi_usaha,
            'kota_id' => $request->kota_kabupaten_usaha,
            'kecamatan_id' => $request->kecamatan_usaha,
            'kelurahan_id' => $request->kelurahan_usaha,
        ]);
        return back()->with('success','Berhasil mengedit provinsi usaha');
    }

    public function update_jenis_usaha_pasangan(Request $request, String $id_pasangan, String $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_usaha_pasangan' => ['required'],
        ],
        [
            'jenis_usaha_pasangan.required' => 'The provinsi is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit jenis usaha pasangan !')->withErrors($validator)->withInput();
        }
        $usaha_pasangan = UsahaPasanganAnggota::where('id',$id)->where('pasangan_anggota_id',$id_pasangan)->first();
        $usaha_pasangan->update([
            'jenis_usaha_id' => $request->jenis_usaha_pasangan,
            'komoditi_usaha_id' => $request->komoditi_usaha_pasangan,
        ]);
        return back()->with('success','Berhasil mengedit jenis usaha pasangan');
    }

    public function update_provinsi_usaha_pasangan(Request $request, String $id_pasangan, String $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_usaha_pasangan' => ['required'],
        ],
        [
            'provinsi_usaha_pasangan.required' => 'The provinsi is required.',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengedit provinsi usaha pasangan !')->withErrors($validator)->withInput();
        }
        $usaha_pasangan = UsahaPasanganAnggota::where('id',$id)->where('pasangan_anggota_id',$id_pasangan)->first();
        $usaha_pasangan->update([
            'provinsi_id' => $request->provinsi_usaha_pasangan,
            'kota_id' => $request->kota_kabupaten_usaha_pasangan,
            'kecamatan_id' => $request->kecamatan_usaha_pasangan,
            'kelurahan_id' => $request->kelurahan_usaha_pasangan,
        ]);
        return back()->with('success','Berhasil mengedit provinsi usaha pasangan');
    }

    public function update_identitas(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'file_identitas' => ['required','mimes:png,jpg,pdf','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupload file identitas !')->withErrors($validator)->withInput();
        }
        // Upload file identitas
        if ($request->hasFile('file_identitas')) {
            $old_file = LampiranRegistrasiAnggota::with('anggota','anggota.kantor')->where('id',$id)->where('anggota_id',$id_anggota)->first();
            if (File::exists(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash))){
                unlink(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash));
                $new_file = $request->file('file_identitas');
                $hash = $new_file->hashName();
                $path_upload_identitas = $old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$hash;
                $new_file->storeAs('public/img/',$path_upload_identitas);
                $old_file->update([
                    'hash' => $hash,
                    'original' => $new_file->getClientOriginalName(),
                    'extention' => $new_file->getClientOriginalExtension(),
                    'size' => $new_file->getSize(),
                ]);
                return back()->with('success','Berhasil mengupload file identitas');
            }else{
                return back()->with('error','Gagal mengupload file identitas !');
            }
        }else{
            return back()->with('error','Gagal mengupload file identitas !');
        }
    }

    public function update_selfie_identitas(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'file_selfie_identitas' => ['required','mimes:png,jpg,jpeg,pdf','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal upload file selfie identitas!'.session()->get('identitas').', periksa kembali inputan!')->withErrors($validator)->withInput();
        }
        // Upload file identitas
        if ($request->hasFile('file_selfie_identitas')) {
            $old_file = LampiranRegistrasiAnggota::with('anggota','anggota.kantor')->where('id',$id)->where('anggota_id',$id_anggota)->first();
            if (File::exists(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash))){
                unlink(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash));
                $new_file = $request->file('file_selfie_identitas');
                $hash = $new_file->hashName();
                $path_upload_selfie_identitas = $old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$hash;
                $new_file->storeAs('public/img/',$path_upload_selfie_identitas);
                $old_file->update([
                    'hash' => $hash,
                    'original' => $new_file->getClientOriginalName(),
                    'extention' => $new_file->getClientOriginalExtension(),
                    'size' => $new_file->getSize(),
                ]);
                return back()->with('success','Berhasil mengupload file selfie identitas');
            }else{
                return back()->with('error','Gagal mengupload file selfie identitas !');
            }
        }else{
            return back()->with('error','Gagal mengupload file selfie identitas !');
        }
    }

    public function update_kartu_keluarga(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'file_kartu_keluarga' => ['required','mimes:png,jpg,jpeg,pdf','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal upload file kartu keluarga !')->withErrors($validator)->withInput();
        }
        // Upload file identitas
        if ($request->hasFile('file_kartu_keluarga')) {
            $old_file = LampiranRegistrasiAnggota::with('anggota','anggota.kantor')->where('id',$id)->where('anggota_id',$id_anggota)->first();
            if (File::exists(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash))){
                unlink(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash));
                $new_file = $request->file('file_kartu_keluarga');
                $hash = $new_file->hashName();
                $path_upload_kartu_keluarga = $old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$hash;
                $new_file->storeAs('public/img/',$path_upload_kartu_keluarga);
                $old_file->update([
                    'hash' => $hash,
                    'original' => $new_file->getClientOriginalName(),
                    'extention' => $new_file->getClientOriginalExtension(),
                    'size' => $new_file->getSize(),
                ]);
                return back()->with('success','Berhasil mengupload file kartu keluarga');
            }else{
                return back()->with('error','Gagal mengupload file kartu keluarga !');
            }
        }else{
            return back()->with('error','Gagal mengupload file kartu keluarga !');
        }
    }

    public function update_pembayaran_registrasi(Request $request, String $id_anggota, String $id)
    {
        $validator = Validator::make($request->all(), [
            'file_bukti_pembayaran_registrasi' => ['required','mimes:png,jpg,jpeg,pdf','max:15360'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal upload file bukti pembayaran registrasi !')->withErrors($validator)->withInput();
        }
        // Upload file identitas
        if ($request->hasFile('file_bukti_pembayaran_registrasi')) {
            $old_file = LampiranRegistrasiAnggota::with('anggota','anggota.kantor')->where('id',$id)->where('anggota_id',$id_anggota)->first();
            if (File::exists(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash))){
                unlink(storage_path('app/public/img/'.$old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$old_file->hash));
                $new_file = $request->file('file_bukti_pembayaran_registrasi');
                $hash = $new_file->hashName();
                $path_upload_kartu_keluarga = $old_file->anggota->kantor->uuid.'/'.$old_file->anggota->uuid.'/'.$hash;
                $new_file->storeAs('public/img/',$path_upload_kartu_keluarga);
                $old_file->update([
                    'hash' => $hash,
                    'original' => $new_file->getClientOriginalName(),
                    'extention' => $new_file->getClientOriginalExtension(),
                    'size' => $new_file->getSize(),
                ]);
                return back()->with('success','Berhasil mengupload file bukti pembayaran registrasi');
            }else{
                return back()->with('error','Gagal mengupload file bukti pembayaran registrasi !');
            }
        }else{
            return back()->with('error','Gagal mengupload file bukti pembayaran registrasi !');
        }
    }

    public function persetujuan_registrasi(Request $request, String $id)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => ['required', 'max:200'],
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Gagal menindak persetujuan registrasi !')->withErrors($validator)->withInput();
        }
        $registrasi_anggota = RegistrasiAnggota::where('anggota_id', $id)->first();
        $registrasi_anggota->persetujuan_admin = $request->status == 1 ? 'Diterima' : 'Ditolak';
        if ($request->status == 0) {
            $registrasi_anggota->status = 'Ditolak';
        } else {
            $registrasi_anggota->status = 'Diproses';
        }
        $registrasi_anggota->update();
        HistoriRegistrasiAnggota::create([
            'anggota_id' => $id,
            'karyawan_id' => Auth::user()->id,
            'keterangan' => $request->keterangan,
        ]);
        return back()->with('success', 'Berhasil menindak persetujuan registrasi');
    }

    public function pengajuan_ulang_registrasi(Request $request, String $id)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => ['required', 'max:200'],
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Gagal mengajukan ulang registrasi !')->withErrors($validator)->withInput();
        }
        RegistrasiAnggota::where('anggota_id', $id)->where('inputer_id', Auth::user()->id)->update([
            'status' => 'Diajukan Ulang',
            'persetujuan_branch_manager' => 'Diproses',
        ]);
        HistoriRegistrasiAnggota::create([
            'anggota_id' => $id,
            'karyawan_id' => Auth::user()->id,
            'keterangan' => $request->keterangan
        ]);
        return back()->with('success', 'Berhasil mengajukan ulang registrasi');
    }
}
