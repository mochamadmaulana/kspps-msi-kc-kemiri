@extends('layout.branch_manager',['title_satu'=>'Detail','title_dua'=>'Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('branch-manager.anggota.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('branch-manager.anggota.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Data Diri</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="col-lg-4">Jenis Keanggotaan</th>
                    <td class="col-lg fst-italic">{{ $anggota->jenis_keanggotaan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Majlis</th>
                    <td class="col-lg fst-italic">{{ $anggota->majlis->kode }} {{ $anggota->majlis->nama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">No. Identitas</th>
                    <td class="col-lg fst-italic">{{ $anggota->nomor_identitas }} <span class="badge bg-muted ms-2">{{ $anggota->jenis_identitas }}</span></td>
                </tr>
                <tr>
                    <th class="col-lg-4">No. Kartu Keluarga</th>
                    <td class="col-lg fst-italic">{{ $anggota->nomor_kartu_keluarga }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Nama Lengkap</th>
                    <td class="col-lg fst-italic">{{ $anggota->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Email</th>
                    <td class="col-lg fst-italic">{{ $anggota->email ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">No. Telepone</th>
                    <td class="col-lg fst-italic">{{ $anggota->nomor_telepone }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Tempat, Tgl. Lahir</th>
                    <td class="col-lg fst-italic">{{ $anggota->tempat_lahir->nama_kota }}, {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Jenis Kelamin</th>
                    <td class="col-lg fst-italic">
                        {{ $anggota->jenis_kelamin }}
                        @if ($anggota->jenis_kelamin == 'Laki-Laki')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">Agama</th>
                    <td class="col-lg fst-italic">{{ $anggota->agama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Status Pernikahan</th>
                    <td class="col-lg fst-italic">{{ $anggota->status_pernikahan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Pendidikan Terakhir</th>
                    <td class="col-lg fst-italic">{{ $anggota->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Nama Ibu Kandung</th>
                    <td class="col-lg fst-italic">{{ $anggota->nama_ibu_kandung }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Jumlah Keluarga</th>
                    <td class="col-lg fst-italic">{{ $anggota->jumlah_keluarga }} Orang</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Pendapatan Lain-lain</th>
                    <td class="col-lg fst-italic">Rp. {{ number_format($anggota->pendapatan_lain_lain,0) }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Alamat</th>
                    <td class="col-lg fst-italic">{{ $alamat->alamat }}, RT{{ $alamat->rt ?? '...' }}/RW{{ $alamat->rw ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Provinsi</th>
                    <td class="col-lg fst-italic">{{ $alamat->provinsi->nama_provinsi }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kota/Kabupaten</th>
                    <td class="col-lg fst-italic">{{ $alamat->kota->nama_kota }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kecamatan</th>
                    <td class="col-lg fst-italic">{{ $alamat->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kelurahan</th>
                    <td class="col-lg fst-italic">{{ $alamat->kelurahan->nama_kelurahan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Status Keanggotaan</th>
                    <td class="col-lg fst-italic"><span class="{{ \Helpers::badge_status_keanggotaan($anggota->status) }}">{{ $anggota->status }}</span></td>
                </tr>
                <tr>
                    <th class="col-lg-4">Status Registrasi</th>
                    <td class="col-lg fst-italic"><span class="{{ \Helpers::badge_registrasi_anggota($anggota->registrasi->status) }}">{{ $anggota->registrasi->status }}</span></td>
                </tr>
                <tr>
                    <th class="col-lg-4">Persetujuan Admin</th>
                    <td class="col-lg fst-italic">
                        @if ($anggota->registrasi->persetujuan_admin == 'Diproses')
                        <span class="badge bg-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" /></svg>
                            Menunggu
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_admin == 'Diterima' && $anggota->registrasi->persetujuan_branch_manager != 'Ditolak')
                        <span class="badge bg-green">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                            Diterima
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_admin == 'Ditolak')
                        <span class="badge bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                            Ditolak
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_branch_manager == 'Ditolak')
                        <span class="badge bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-stop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-7.5a1.5 1.5 0 0 1 3 0v6.5" /><path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5" /><path d="M14 5.5a1.5 1.5 0 0 1 3 0v6.5" /><path d="M17 7.5a1.5 1.5 0 0 1 3 0v8.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /></svg>
                            Blocked
                        </span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">Persetujuan Branch Manager</th>
                    <td class="col-lg fst-italic">
                        @if ($anggota->registrasi->persetujuan_branch_manager == 'Diproses')
                        <span class="badge bg-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" /></svg>
                            Menunggu
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_branch_manager == 'Diterima' && $anggota->registrasi->persetujuan_admin != 'Ditolak')
                        <span class="badge bg-green">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                            Diterima
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_branch_manager == 'Ditolak')
                        <span class="badge bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                            Ditolak
                        </span>
                        @endif
                        @if ($anggota->registrasi->persetujuan_admin == 'Ditolak')
                        <span class="badge bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-stop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-7.5a1.5 1.5 0 0 1 3 0v6.5" /><path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5" /><path d="M14 5.5a1.5 1.5 0 0 1 3 0v6.5" /><path d="M17 7.5a1.5 1.5 0 0 1 3 0v8.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /></svg>
                            Blocked
                        </span>
                        @endif

                        @if ($anggota->registrasi->persetujuan_admin == 'Diterima' && $anggota->registrasi->persetujuan_branch_manager == 'Diproses')
                        <a href="javascript:void(0)" class="ms-2" data-bs-toggle="modal" data-bs-target="#modal-persetujuan-admin">
                            Persetujuan
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-click" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" /><path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" /><path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" /><path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" /><path d="M5 3l-1 -1" /><path d="M4 7h-1" /><path d="M14 3l1 -1" /><path d="M15 6h1" /></svg>
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">Diinput Oleh</th>
                    <td class="col-lg fst-italic">
                        {{ $anggota->registrasi->inputer->nama_lengkap }}
                    </td>
                </tr>
                <tr>
                    @if ($anggota->registrasi->status == 'Diterima')
                    <th class="col-lg-4">Tgl. Bergabung</th>
                    @else
                    <th class="col-lg-4">Tgl. Registrasi</th>
                    @endif
                    <td class="col-lg fst-italic">{{ \Carbon\Carbon::parse($anggota->created_at)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Biaya Registrasi</th>
                    <td class="col-lg fst-italic">
                        Rp. {{ number_format($anggota->registrasi->biaya,0) }}
                        <span class="badge bg-green ms-2">{{ $anggota->registrasi->metode_bayar }}</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">
        <h1 class="card-title">Usaha Anggota</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="col-lg-4">Jenis Usaha</th>
                    <td class="col-lg fst-italic">{{ $usaha->jenis_usaha->nama }} ({{ $usaha->jenis_usaha->kode }})</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Komoditi</th>
                    <td class="col-lg fst-italic">{{ $usaha->komoditi_usaha->nama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Deskripsi</th>
                    <td class="col-lg fst-italic">{{ $usaha->deskripsi ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Alamat</th>
                    <td class="col-lg fst-italic">{{ $usaha->alamat }}, RT{{ $usaha->rt ?? '...' }}/RW{{ $usaha->rw ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Provinsi</th>
                    <td class="col-lg fst-italic">{{ $usaha->provinsi->nama_provinsi }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kota/Kabupaten</th>
                    <td class="col-lg fst-italic">{{ $usaha->kota->nama_kota }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kecamatan</th>
                    <td class="col-lg fst-italic">{{ $usaha->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kelurahan</th>
                    <td class="col-lg fst-italic">{{ $usaha->kelurahan->nama_kelurahan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Pendapatan Perbulan</th>
                    <td class="col-lg fst-italic">Rp. {{ number_format($usaha->pendapatan_perbulan,0) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h1 class="card-title">Data Pasangan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="col-lg-4">No. Identitas</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->nomor_identitas }} <span class="badge bg-muted ms-2">{{ $anggota->pasangan->jenis_identitas }}</span></td>
                </tr>
                <tr>
                    <th class="col-lg-4">Nama Lengkap</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">No. Telepone</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->nomor_telepone }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Tempat, Tgl. Lahir</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->tempat_lahir->nama_kota }}, {{ \Carbon\Carbon::parse($anggota->pasangan->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Jenis Kelamin</th>
                    <td class="col-lg fst-italic">
                        {{ $anggota->pasangan->jenis_kelamin }}
                        @if ($anggota->pasangan->jenis_kelamin == 'Laki-Laki')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">Agama</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->agama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Pendidikan Terakhir</th>
                    <td class="col-lg fst-italic">{{ $anggota->pasangan->pendidikan_terakhir }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h1 class="card-title">Usaha Pasangan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="col-lg-4">Jenis Usaha</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->jenis_usaha->nama }} ({{ $usaha_pasangan->jenis_usaha->kode }})</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Komoditi</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->komoditi_usaha->nama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Deskripsi</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->deskripsi ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Alamat</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->alamat }}, RT{{ $usaha_pasangan->rt ?? '...' }}/RW{{ $usaha_pasangan->rw ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Provinsi</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->provinsi->nama_provinsi }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kota/Kabupaten</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->kota->nama_kota }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kecamatan</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Kelurahan</th>
                    <td class="col-lg fst-italic">{{ $usaha_pasangan->kelurahan->nama_kelurahan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-4">Pendapatan Perbulan</th>
                    <td class="col-lg fst-italic">Rp. {{ number_format($usaha_pasangan->pendapatan_perbulan,0) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h1 class="card-title">File Lampiran</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="col-lg-4">File Identitas {{ $anggota->jenis_identitas }}</th>
                    <td class="col-lg fst-italic">
                        <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_identitas->hash) }}" class="fs-green" target="_blank">
                            {{ substr_replace($file_identitas->hash, "....", 15) }}{{ $file_identitas->extention }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">File Selfie Identitas {{ $anggota->jenis_identitas }}</th>
                    <td class="col-lg fst-italic">
                        <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_selfie_identitas->hash) }}" class="fs-green" target="_blank">
                            {{ substr_replace($file_selfie_identitas->hash, "....", 15) }}{{ $file_selfie_identitas->extention }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">File Kartu Keluarga</th>
                    <td class="col-lg fst-italic">
                        <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_kartu_keluarga->hash) }}" class="fs-green" target="_blank">
                            {{ substr_replace($file_kartu_keluarga->hash, "....", 15) }}{{ $file_kartu_keluarga->extention }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="col-lg-4">File Bukti Pembayaran Registrasi</th>
                    <td class="col-lg fst-italic">
                        <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_bukti_pembayaran_registrasi->hash) }}" class="fs-green" target="_blank">
                            {{ substr_replace($file_bukti_pembayaran_registrasi->hash, "....", 15) }}{{ $file_bukti_pembayaran_registrasi->extention }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">
        <h1 class="card-title">Histori Registrasi</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-hover">
                <thead>
                    <tr>
                        <th>Catatan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota->histori_registrasi as $hr)
                        <tr>
                            <td><span class="fw-bold">{{ $hr->karyawan->nama_lengkap }}</span> <span class="{{ \Helpers::bg_badge_role($hr->karyawan->role) }}">{{ $hr->karyawan->role }}</span> : {{ $hr->keterangan }}</td>
                            <td>{{ \Carbon\Carbon::parse($hr->created_at)->translatedFormat('d F Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal Persetujuan -->
<div class="modal modal-blur fade" id="modal-persetujuan-admin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Persetujuan Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('branch-manager.anggota.persetujuan-registrasi',$anggota->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Status</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="1" class="form-selectgroup-input" @if(@old('status') == '1') checked @endif checked>
                                <span class="form-selectgroup-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                                    <span class="p-auto">Diterima</span>
                                </span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="0" class="form-selectgroup-input" @if(@old('status') == '0') checked @endif>
                                <span class="form-selectgroup-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                    <span class="p-auto">Ditolak</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ @old('keterangan') }}</textarea>
                        @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush
