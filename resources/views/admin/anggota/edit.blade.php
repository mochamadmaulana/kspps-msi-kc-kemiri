@extends('layout.admin',['title_satu'=>'Form Edit','title_dua'=>'Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<form action="{{ route('admin.anggota.update',$anggota->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Diri</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jenis Keanggotaan</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_keanggotaan" value="Majlis" class="form-selectgroup-input" @if(@old('jenis_keanggotaan',$anggota->jenis_keanggotaan) == 'Majlis') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">Majlis</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_keanggotaan" value="Umum" class="form-selectgroup-input" @if(@old('jenis_keanggotaan',$anggota->jenis_keanggotaan) == 'Umum') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">Umum</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Majlis</div>
                    <select name="majlis" class="form-select @error('majlis') is-invalid @enderror" id="majlis" data-placeholder="pilih majlis">
                        <option value=""></option>
                        @foreach ($majlis as $m)
                        <option value="{{ $m->id }}" @if(@old('majlis',$anggota->majlis_id) == $m->id) selected @endif>{{ $m->kode }} {{ $m->nama }}</option>
                        @endforeach
                    </select>
                    @error('majlis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">
                        Jenis Identitas
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pilih KTP atau SIM"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_identitas" value="KTP" class="form-selectgroup-input" @if(@old('jenis_identitas',$anggota->jenis_identitas) == 'KTP') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">KTP</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_identitas" value="SIM" class="form-selectgroup-input" @if(@old('jenis_identitas',$anggota->jenis_identitas) == 'SIM') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">SIM</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">
                        No. Identitas
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="NIK KTP atau No. SIM sesuai Jenis Identitas"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </div>
                    <input type="number" name="nomor_identitas" class="form-control @error('nomor_identitas') is-invalid @enderror" value="{{ @old('nomor_identitas',$anggota->nomor_identitas) }}" placeholder="No. Identitas..">
                    @error('nomor_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">No. Kartu Keluarga</div>
                    <input type="number" name="nomor_kartu_keluarga" class="form-control @error('nomor_kartu_keluarga') is-invalid @enderror" value="{{ @old('nomor_kartu_keluarga',$anggota->nomor_kartu_keluarga) }}" placeholder="No. Kartu Keluarga..">
                    @error('nomor_kartu_keluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Nama Lengkap</div>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ @old('nama_lengkap',$anggota->nama_lengkap) }}" placeholder="Nama Lengkap..">
                    @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Email</div>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email',$anggota->email) }}" placeholder="Email..">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">No. Telepone</div>
                    <input type="number" name="nomor_telepone" class="form-control @error('nomor_telepone') is-invalid @enderror" value="{{ @old('nomor_telepone',$anggota->nomor_telepone) }}" placeholder="No. Telepone..">
                    @error('nomor_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Tempat Lahir</div>
                    <select name="tempat_lahir" class="form-select @error('tempat_lahir') is-invalid @enderror" id="tempat-lahir" data-placeholder="pilih tempat lahir">
                        <option value=""></option>
                        @foreach ($tempat_lahir as $tl)
                        <option value="{{ $tl->id }}" @if(@old('tempat_lahir',$anggota->tempat_lahir_id) == $tl->id) selected @endif>{{ $tl->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Tgl. Lahir</div>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ @old('tanggal_lahir',$anggota->tanggal_lahir) }}">
                    @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jenis Kelamin</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" class="form-selectgroup-input" @if(@old('jenis_kelamin',$anggota->jenis_kelamin) == 'Laki-Laki') checked @endif>
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                <span class="p-auto">Laki-Laki</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-selectgroup-input" @if(@old('jenis_kelamin',$anggota->jenis_kelamin) == 'Perempuan') checked @endif>
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                <span class="p-auto">Perempuan</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">
                        Alamat
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Alamat KTP atau SIM"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </div>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ @old('alamat',$alamat->alamat) }}" placeholder="Alamat..">
                    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RT</div>
                                    <input type="number" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ @old('rt',$alamat->rt) }}" placeholder="RT..">
                                    @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RW</div>
                                    <input type="number" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ @old('rw',$alamat->rw) }}" placeholder="RW..">
                                    @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-label">Kode Pos</div>
                            <input type="number" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" value="{{ @old('kode_pos',$alamat->kode_pos) }}" placeholder="Kode Pos..">
                            @error('kode_pos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Provinsi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $alamat->provinsi->nama_provinsi }}" readonly>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-provinsi">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kota/Kabupaten</label>
                    <input type="text" class="form-control" value="{{ $alamat->kota->nama_kota }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" value="{{ $alamat->kecamatan->nama_kecamatan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" value="{{ $alamat->kelurahan->nama_kelurahan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Agama</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih agama">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama',$anggota->agama) == 'Islam') selected @endif>Islam</option>
                        <option value="Hindu" @if (@old('agama',$anggota->agama) == 'Hindu') selected @endif>Hindu</option>
                        <option value="Budha" @if (@old('agama',$anggota->agama) == 'Budha') selected @endif>Budha</option>
                        <option value="Protestan" @if (@old('agama',$anggota->agama) == 'Protestan') selected @endif>Protestan</option>
                        <option value="Katolik" @if (@old('agama',$anggota->agama) == 'Katolik') selected @endif>Katolik</option>
                        <option value="Khonghucu" @if (@old('agama',$anggota->agama) == 'Khonghucu') selected @endif>Khonghucu</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Status Pernikahan</div>
                    <select name="status_pernikahan" class="form-select @error('status_pernikahan') is-invalid @enderror" id="status-pernikahan" data-placeholder="pilih status pernikahan">
                        <option value=""></option>
                        <option value="Belum Menikah" @if (@old('status_pernikahan',$anggota->status_pernikahan) == 'Belum Menikah') selected @endif>Belum Menikah</option>
                        <option value="Nikah" @if (@old('status_pernikahan',$anggota->status_pernikahan) == 'Nikah') selected @endif>Nikah</option>
                        <option value="Cerai" @if (@old('status_pernikahan',$anggota->status_pernikahan) == 'Cerai') selected @endif>Cerai</option>
                        <option value="Janda/Duda" @if (@old('status_pernikahan',$anggota->status_pernikahan) == 'Janda/Duda') selected @endif>Janda/Duda</option>
                    </select>
                    @error('status_pernikahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Pendidikan Terakhir</div>
                    <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan-terakhir" data-placeholder="pilih pendidikan terakhir">
                        <option value=""></option>
                        <option value="Tidak Bersekolah" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'Tidak Bersekolah') selected @endif>Tidak Bersekolah</option>
                        <option value="SD" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'SD') selected @endif>SD</option>
                        <option value="SMP" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'SMP') selected @endif>SMP</option>
                        <option value="SMA" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'SMA') selected @endif>SMA</option>
                        <option value="D3" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'D3') selected @endif>Diploma 3</option>
                        <option value="Sarjana 1" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'Sarjana 1') selected @endif>Sarjana 1</option>
                        <option value="Sarjana 2" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'Sarjana 2') selected @endif>Sarjana 2</option>
                        <option value="Sarjana 3" @if (@old('pendidikan_terakhir',$anggota->pendidikan_terakhir) == 'Sarjana 3') selected @endif>Sarjana 3</option>
                    </select>
                    @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Nama Ibu Kandung</div>
                    <input type="number" name="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value="{{ @old('nama_ibu_kandung',$anggota->nama_ibu_kandung) }}" placeholder="Nama Ibu Kandung..">
                    @error('nama_ibu_kandung')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Jumlah Keluarga</div>
                    <input type="number" name="jumlah_keluarga" class="form-control @error('jumlah_keluarga') is-invalid @enderror" value="{{ @old('jumlah_keluarga') }}" placeholder="Jumlah Keluarga..">
                    @error('jumlah_keluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Pendapatan Lain-lain</div>
                    <input type="number" name="pendapatan_lain_lain" class="form-control @error('pendapatan_lain_lain') is-invalid @enderror" value="{{ @old('pendapatan_lain_lain') }}" placeholder="Rp..">
                    @error('pendapatan_lain_lain')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">Usaha Anggota</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Jenis Usaha</div>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $usaha->jenis_usaha->nama }} ({{ $usaha->jenis_usaha->kode }})" readonly>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-jenis-usaha-anggota">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Komoditi Usaha</label>
                    <input type="text" class="form-control" value="{{ $usaha->komoditi_usaha->nama }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Deskripsi</div>
                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ @old('deskripsi',$usaha->deskripsi) }}" placeholder="{{ empty($usaha->deskripsi) ? 'null..' : '' }}">
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Alamat</div>
                    <input type="text" name="alamat_usaha" class="form-control @error('alamat_usaha') is-invalid @enderror" value="{{ @old('alamat_usaha',$usaha->alamat) }}" placeholder="Alamat..">
                    @error('alamat_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RT</div>
                                    <input type="number" name="rt_usaha" class="form-control @error('rt_usaha') is-invalid @enderror" value="{{ @old('rt_usaha',$usaha->rt) }}" placeholder="RT..">
                                    @error('rt_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RW</div>
                                    <input type="number" name="rw_usaha" class="form-control @error('rw_usaha') is-invalid @enderror" value="{{ @old('rw_usaha',$usaha->rw) }}" placeholder="RW..">
                                    @error('rw_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-label">Kode Pos</div>
                            <input type="number" name="kode_pos_usaha" class="form-control @error('kode_pos_usaha') is-invalid @enderror" value="{{ @old('kode_pos_usaha',$usaha->kode_pos) }}" placeholder="Kode Pos..">
                            @error('kode_pos_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Provinsi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $usaha->provinsi->nama_provinsi }}" readonly>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-provinsi-usaha">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kota/Kabupaten</label>
                    <input type="text" class="form-control" value="{{ $usaha->kota->nama_kota }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" value="{{ $usaha->kecamatan->nama_kecamatan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" value="{{ $usaha->kelurahan->nama_kelurahan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Pendapatan Perbulan</div>
                    <input type="number" name="pendapatan_perbulan" class="form-control @error('pendapatan_perbulan') is-invalid @enderror" value="{{ @old('pendapatan_perbulan',$usaha->pendapatan_perbulan) }}" placeholder="Rp..">
                    @error('pendapatan_perbulan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">Data Pasangan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">
                        Jenis Identitas
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pilih KTP atau SIM"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_identitas_pasangan" value="KTP" class="form-selectgroup-input" @if(@old('jenis_identitas_pasangan',$anggota->pasangan->jenis_identitas) == 'KTP') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">KTP</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_identitas_pasangan" value="SIM" class="form-selectgroup-input" @if(@old('jenis_identitas_pasangan',$anggota->pasangan->jenis_identitas) == 'SIM') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">SIM</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">
                        No. Identitas
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="NIK KTP atau No. SIM sesuai Jenis Identitas"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </div>
                    <input type="text" name="nomor_identitas_pasangan" class="form-control @error('nomor_identitas_pasangan') is-invalid @enderror" value="{{ @old('nomor_identitas_pasangan',$anggota->pasangan->nomor_identitas) }}" placeholder="No. Identitas..">
                    @error('nomor_identitas_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Nama Lengkap</div>
                    <input type="text" name="nama_lengkap_pasangan" class="form-control @error('nama_lengkap_pasangan') is-invalid @enderror" value="{{ @old('nama_lengkap_pasangan',$anggota->pasangan->nama_lengkap) }}" placeholder="Nama Lengkap..">
                    @error('nama_lengkap_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">No. Telepone</div>
                    <input type="text" name="nomor_telepone_pasangan" class="form-control @error('nomor_telepone_pasangan') is-invalid @enderror" value="{{ @old('nomor_telepone_pasangan',$anggota->pasangan->nomor_telepone) }}" placeholder="No. Telepone..">
                    @error('nomor_telepone_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Tempat Lahir</div>
                    <select name="tempat_lahir_pasangan" class="form-select @error('tempat_lahir_pasangan') is-invalid @enderror" id="tempat-lahir-pasangan" data-placeholder="pilih tempat lahir">
                        <option value=""></option>
                        @foreach ($tempat_lahir as $tl)
                        <option value="{{ $tl->id }}" @if(@old('tempat_lahir_pasangan',$anggota->pasangan->tempat_lahir_id) == $tl->id) selected @endif>{{ $tl->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('tempat_lahir_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Tgl. Lahir</div>
                    <input type="date" name="tanggal_lahir_pasangan" class="form-control @error('tanggal_lahir_pasangan') is-invalid @enderror" value="{{ @old('tanggal_lahir_pasangan',$anggota->pasangan->tanggal_lahir) }}">
                    @error('tanggal_lahir_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jenis Kelamin</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin_pasangan" value="Laki-Laki" class="form-selectgroup-input" @if(@old('jenis_kelamin_pasangan',$anggota->pasangan->jenis_kelamin) == 'Laki-Laki') checked @endif>
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                <span class="p-auto">Laki-Laki</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin_pasangan" value="Perempuan" class="form-selectgroup-input" @if(@old('jenis_kelamin_pasangan',$anggota->pasangan->jenis_kelamin) == 'Perempuan') checked @endif>
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                <span class="p-auto">Perempuan</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Agama</div>
                    <select name="agama_pasangan" class="form-select @error('agama_pasangan') is-invalid @enderror" id="agama-pasangan" data-placeholder="pilih agama">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Islam') selected @endif>Islam</option>
                        <option value="Hindu" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Hindu') selected @endif>Hindu</option>
                        <option value="Budha" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Budha') selected @endif>Budha</option>
                        <option value="Protestan" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Protestan') selected @endif>Protestan</option>
                        <option value="Katolik" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Katolik') selected @endif>Katolik</option>
                        <option value="Khonghucu" @if (@old('agama_pasangan',$anggota->pasangan->agama) == 'Khonghucu') selected @endif>Khonghucu</option>
                    </select>
                    @error('agama_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Pendidikan Terakhir</div>
                    <select name="pendidikan_terakhir_pasangan" class="form-select @error('pendidikan_terakhir_pasangan') is-invalid @enderror" id="pendidikan-terakhir-pasangan" data-placeholder="pilih pendidikan terakhir">
                        <option value=""></option>
                        <option value="Tidak Bersekolah" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'Tidak Bersekolah') selected @endif>Tidak Bersekolah</option>
                        <option value="SD" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'SD') selected @endif>SD</option>
                        <option value="SMP" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'SMP') selected @endif>SMP</option>
                        <option value="SMA" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'SMA') selected @endif>SMA</option>
                        <option value="D3" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'D3') selected @endif>Diploma 3</option>
                        <option value="Sarjana 1" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'Sarjana 1') selected @endif>Sarjana 1</option>
                        <option value="Sarjana 2" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'Sarjana 2') selected @endif>Sarjana 2</option>
                        <option value="Sarjana 3" @if (@old('pendidikan_terakhir_pasangan',$anggota->pasangan->pendidikan_terakhir) == 'Sarjana 3') selected @endif>Sarjana 3</option>
                    </select>
                    @error('pendidikan_terakhir_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">Usaha Pasangan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Jenis Usaha</div>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $usaha_pasangan->jenis_usaha->nama }}" readonly>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-jenis-usaha-pasangan">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Komoditi Usaha</label>
                    <input type="text" class="form-control" value="{{ $usaha_pasangan->komoditi_usaha->nama }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Deskripsi</div>
                    <input type="text" name="deskripsi_pasangan" class="form-control @error('deskripsi_pasangan') is-invalid @enderror" value="{{ @old('deskripsi_pasangan',$usaha_pasangan->deskripsi) }}" placeholder="Deskripsi..">
                    @error('deskripsi_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Alamat</div>
                    <input type="text" name="alamat_usaha_pasangan" class="form-control @error('alamat_usaha_pasangan') is-invalid @enderror" value="{{ @old('alamat_usaha_pasangan',$usaha_pasangan->alamat) }}" placeholder="Alamat..">
                    @error('alamat_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RT</div>
                                    <input type="number" name="rt_usaha_pasangan" class="form-control @error('rt_usaha_pasangan') is-invalid @enderror" value="{{ @old('rt_usaha_pasangan',$usaha_pasangan->rt) }}" placeholder="RT..">
                                    @error('rt_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-6 mb-3 mb-sm-0">
                                    <div class="form-label">RW</div>
                                    <input type="number" name="rw_usaha_pasangan" class="form-control @error('rw_usaha_pasangan') is-invalid @enderror" value="{{ @old('rw_usaha_pasangan',$usaha_pasangan->rw) }}" placeholder="RW..">
                                    @error('rw_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-label">Kode Pos</div>
                            <input type="number" name="kode_pos_usaha_pasangan" class="form-control @error('kode_pos_usaha_pasangan') is-invalid @enderror" value="{{ @old('kode_pos_usaha_pasangan',$usaha_pasangan->kode_pos) }}" placeholder="Kode Pos..">
                            @error('kode_pos_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Provinsi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $usaha_pasangan->provinsi->nama_provinsi }}" readonly>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-provinsi-usaha-pasangan">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kota/Kabupaten</label>
                    <input type="text" class="form-control" value="{{ $usaha_pasangan->kota->nama_kota }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" value="{{ $usaha_pasangan->kecamatan->nama_kecamatan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" value="{{ $usaha_pasangan->kelurahan->nama_kelurahan }}" readonly></input>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Pendapatan Perbulan</div>
                    <input type="number" name="pendapatan_perbulan_pasangan" class="form-control @error('pendapatan_perbulan_pasangan') is-invalid @enderror" value="{{ @old('pendapatan_perbulan_pasangan',$usaha_pasangan->pendapatan_perbulan) }}" placeholder="Rp..">
                    @error('pendapatan_perbulan_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">Lampiran</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label">File Identitas {{ session()->get('jenis_identitas') }}</div>
                    <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_identitas->hash) }}" class="fst-italic" target="_blank">{{ substr_replace($file_identitas->hash, "....", 15) }}{{ $file_identitas->extention }}</a>
                    <a href="javascript:void(0)" class="ms-1 text-green" data-bs-toggle="modal" data-bs-target="#modal-edit-file-identitas">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    </a>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">File Selfie Identitas {{ session()->get('jenis_identitas') }}</div>
                    <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_selfie_identitas->hash) }}" class="fst-italic" target="_blank">{{ substr_replace($file_selfie_identitas->hash, "....", 15) }}{{ $file_selfie_identitas->extention }}</a>
                    <a href="javascript:void(0)" class="ms-1 text-green" data-bs-toggle="modal" data-bs-target="#modal-edit-selfie-identitas">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    </a>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">File Kartu Keluarga</div>
                    <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_kartu_keluarga->hash) }}" class="fst-italic" target="_blank">{{ substr_replace($file_kartu_keluarga->hash, "....", 15) }}{{ $file_kartu_keluarga->extention }}</a>
                    <a href="javascript:void(0)" class="ms-1 text-green" data-bs-toggle="modal" data-bs-target="#modal-edit-kartu-keluarga">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    </a>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">File Bukti Pembayaran Registrasi</div>
                    <a href="{{ asset('storage/img/'.Auth::user()->kantor->uuid.'/'.$anggota->uuid.'/'.$file_bukti_pembayaran_registrasi->hash) }}" class="fst-italic" target="_blank">{{ substr_replace($file_bukti_pembayaran_registrasi->hash, "....", 15) }}{{ $file_bukti_pembayaran_registrasi->extention }}</a>
                    <a href="javascript:void(0)" class="ms-1 text-green" data-bs-toggle="modal" data-bs-target="#modal-edit-bukti-pembayaran-registrasi">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">Registrasi</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Metode Bayar</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="metode_bayar" value="Cash" class="form-selectgroup-input" @if(@old('metode_bayar',$anggota->registrasi->metode_bayar) == 'Cash') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">Cash</span>
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="metode_bayar" value="Transfer" class="form-selectgroup-input" @if(@old('metode_bayar',$anggota->registrasi->metode_bayar) == 'Transfer') checked @endif>
                            <span class="form-selectgroup-label">
                                <span class="p-auto">Transfer</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">
                        Biaya
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Total Rp.50.000"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </div>
                    <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ @old('biaya',$anggota->registrasi->biaya) }}" placeholder="Biaya..">
                    @error('biaya')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                Simpan
            </button>
        </div>
    </div>
</form>
@endsection

@push('modal')
<!-- Modal Edit Provinsi -->
<div class="modal modal-blur fade" id="modal-edit-provinsi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Provinsi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-provinsi',[$anggota->id,$alamat->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Provinsi</label>
                        <select name="provinsi" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" data-placeholder="pilih provinsi">
                            <option value=""></option>
                            @foreach ($provinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kota/Kabupaten</label>
                        <select name="kota_kabupaten" class="form-select" id="kota-kabupaten" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kecamatan</label>
                        <select name="kecamatan" class="form-select" id="kecamatan" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kelurahan</label>
                        <select name="kelurahan" class="form-select" id="kelurahan" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit jenis usaha anggota -->
<div class="modal modal-blur fade" id="modal-edit-jenis-usaha-anggota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Jenis Usaha Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-jenis-usaha',[$anggota->id,$usaha->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Jenis Usaha</div>
                        <select name="jenis_usaha" class="form-select @error('jenis_usaha') is-invalid @enderror" id="jenis-usaha" data-placeholder="pilih jenis usaha">
                            <option value=""></option>
                            @foreach ($jenis_usaha as $ju)
                            <option value="{{ $ju->id }}">{{ $ju->nama }} ({{ $ju->kode }})</option>
                            @endforeach
                        </select>
                        @error('jenis_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Komoditi Usaha</label>
                        <select name="komoditi_usaha" class="form-select" id="komoditi-usaha" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Provinsi Usaha -->
<div class="modal modal-blur fade" id="modal-edit-provinsi-usaha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Provinsi Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-provinsi-usaha',[$anggota->id,$usaha->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Provinsi</label>
                        <select name="provinsi_usaha" class="form-select @error('provinsi_usaha') is-invalid @enderror" id="provinsi-usaha" data-placeholder="pilih provinsi">
                            <option value=""></option>
                            @foreach ($provinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kota/Kabupaten</label>
                        <select name="kota_kabupaten_usaha" class="form-select" id="kota-kabupaten-usaha" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kecamatan</label>
                        <select name="kecamatan_usaha" class="form-select" id="kecamatan-usaha" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kelurahan</label>
                        <select name="kelurahan_usaha" class="form-select" id="kelurahan-usaha" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit jenis usaha pasangan -->
<div class="modal modal-blur fade" id="modal-edit-jenis-usaha-pasangan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Jenis Usaha Pasangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-jenis-usaha-pasangan',[$usaha_pasangan->pasangan_anggota_id,$usaha_pasangan->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">Jenis Usaha</div>
                        <select name="jenis_usaha_pasangan" class="form-select @error('jenis_usaha_pasangan') is-invalid @enderror" id="jenis-usaha-pasangan" data-placeholder="pilih jenis usaha">
                            <option value=""></option>
                            @foreach ($jenis_usaha as $ju)
                            <option value="{{ $ju->id }}">{{ $ju->nama }} ({{ $ju->kode }})</option>
                            @endforeach
                        </select>
                        @error('jenis_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Komoditi Usaha</label>
                        <select name="komoditi_usaha_pasangan" class="form-select" id="komoditi-usaha-pasangan" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Provinsi Alamat Usaha Pasangan -->
<div class="modal modal-blur fade" id="modal-edit-provinsi-usaha-pasangan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Provinsi Usaha Pasangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-provinsi-usaha-pasangan',[$usaha_pasangan->pasangan_anggota_id,$usaha_pasangan->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Provinsi</label>
                        <select name="provinsi_usaha_pasangan" class="form-select @error('provinsi_usaha_pasangan') is-invalid @enderror" id="provinsi-usaha-pasangan" data-placeholder="pilih provinsi">
                            <option value=""></option>
                            @foreach ($provinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                            @endforeach
                        </select>
                        @error('provinsi_usaha_pasangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kota/Kabupaten</label>
                        <select name="kota_kabupaten_usaha_pasangan" class="form-select" id="kota-kabupaten-usaha-pasangan" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kecamatan</label>
                        <select name="kecamatan_usaha_pasangan" class="form-select" id="kecamatan-usaha-pasangan" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kelurahan</label>
                        <select name="kelurahan_usaha_pasangan" class="form-select" id="kelurahan-usaha-pasangan" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Identitas -->
<div class="modal modal-blur fade" id="modal-edit-file-identitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit File Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-identitas',[$anggota->id,$file_identitas->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            File Identitas
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Format file : jpg jpeg png pdf | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="file" name="file_identitas" class="form-control @error('file_identitas') is-invalid @enderror" />
                        @error('file_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Selfie Identitas -->
<div class="modal modal-blur fade" id="modal-edit-selfie-identitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit File Selfie Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-selfie-identitas',[$anggota->id,$file_selfie_identitas->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            File Selfie Identitas
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Format file : jpg jpeg png pdf | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="file" name="file_selfie_identitas" class="form-control @error('file_selfie_identitas') is-invalid @enderror" />
                        @error('file_selfie_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Kartu Keluarga -->
<div class="modal modal-blur fade" id="modal-edit-kartu-keluarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kartu Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-kartu-keluarga',[$anggota->id,$file_kartu_keluarga->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            File Kartu Keluarga
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Format file : jpg jpeg png pdf | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="file" name="file_kartu_keluarga" class="form-control @error('file_kartu_keluarga') is-invalid @enderror" />
                        @error('file_kartu_keluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Bukti Pembayaran Registrasi -->
<div class="modal modal-blur fade" id="modal-edit-bukti-pembayaran-registrasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Bukti Pembayaran Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.anggota.update-pembayaran-registrasi',[$anggota->id,$file_bukti_pembayaran_registrasi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            File Bukti Pembayaran Registrasi
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Format file : jpg jpeg png pdf | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="file" name="file_bukti_pembayaran_registrasi" class="form-control @error('file_bukti_pembayaran_registrasi') is-invalid @enderror" />
                        @error('file_bukti_pembayaran_registrasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
$("#majlis").select2({
    theme: "bootstrap-5",
});
$("#tempat-lahir").select2({
    theme: "bootstrap-5",
});
$("#agama").select2({
    theme: "bootstrap-5",
});
$("#status-pernikahan").select2({
    theme: "bootstrap-5",
});
$("#pendidikan-terakhir").select2({
    theme: "bootstrap-5",
});
$("#jenis-usaha").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-jenis-usaha-anggota"
});
$("#komoditi-usaha").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-jenis-usaha-anggota"
});
$("#provinsi").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi"
});
$("#kota-kabupaten").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi"
});
$("#kecamatan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi"
});
$("#kelurahan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi"
});
$('#provinsi').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten').empty();
                    $('#kota-kabupaten').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten').empty();
        $('#kota-kabupaten').setAttr("disabled");
    }
});
$('#kota-kabupaten').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan').empty();
                    $('#kecamatan').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan').empty();
                }
            }
        });
    }else{
        $('#kecamatan').empty();
        $('#kecamatan').setAttr("disabled");
    }
});
$('#kecamatan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan').empty();
                    $('#kelurahan').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan').empty();
                }
            }
        });
    }else{
        $('#kelurahan').empty();
        $('#kelurahan').setAttr("disabled");
    }
});
$("#provinsi-usaha").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten-usaha").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha"
});
$("#kecamatan-usaha").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha"
});
$("#kelurahan-usaha").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha"
});
$('#jenis-usaha').on('change', function() {
    var usahaID = $(this).val();
    if(usahaID) {
        $.ajax({
            url: '/get-komoditi-usaha/'+usahaID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#komoditi-usaha').empty();
                    $('#komoditi-usaha').removeAttr("disabled");
                    $.each(data, function(key, komoditi){
                        $('select[name="komoditi_usaha"]').append('<option value="'+ komoditi.id +'">' + komoditi.nama+ '</option>');
                    });
                }else{
                    $('#komoditi-usaha').empty();
                }
            }
        });
    }else{
        $('#komoditi-usaha').empty();
        $('#komoditi-usaha').setAttr("disabled");
    }
});
$('#provinsi-usaha').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten-usaha').empty();
                    $('#kota-kabupaten-usaha').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten_usaha"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten-usaha').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten-usaha').empty();
        $('#kota-kabupaten-usaha').setAttr("disabled");
    }
});
$('#kota-kabupaten-usaha').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan-usaha').empty();
                    $('#kecamatan-usaha').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan_usaha"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan-usaha').empty();
                }
            }
        });
    }else{
        $('#kecamatan-usaha').empty();
        $('#kecamatan-usaha').setAttr("disabled");
    }
});
$('#kecamatan-usaha').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan-usaha').empty();
                    $('#kelurahan-usaha').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan_usaha"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan-usaha').empty();
                }
            }
        });
    }else{
        $('#kelurahan-usaha').empty();
        $('#kelurahan-usaha').setAttr("disabled");
    }
});
// End Anggota

// Start Pasangan
$("#tempat-lahir-pasangan").select2({
    theme: "bootstrap-5",
});
$("#agama-pasangan").select2({
    theme: "bootstrap-5",
});
$("#pendidikan-terakhir-pasangan").select2({
    theme: "bootstrap-5",
});
$("#provinsi-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha-pasangan"
});
$("#kota-kabupaten-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha-pasangan"
});
$("#kecamatan-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha-pasangan"
});
$("#kelurahan-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-provinsi-usaha-pasangan"
});
$("#jenis-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-jenis-usaha-pasangan"
});
$("#komoditi-usaha-pasangan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit-jenis-usaha-pasangan"
});
$('#jenis-usaha-pasangan').on('change', function() {
    var usahaID = $(this).val();
    if(usahaID) {
        $.ajax({
            url: '/get-komoditi-usaha/'+usahaID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#komoditi-usaha-pasangan').empty();
                    $('#komoditi-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, komoditi){
                        $('select[name="komoditi_usaha_pasangan"]').append('<option value="'+ komoditi.id +'">' + komoditi.nama+ '</option>');
                    });
                }else{
                    $('#komoditi-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#komoditi-usaha-pasangan').empty();
        $('#komoditi-usaha-pasangan').setAttr("disabled");
    }
});
$('#provinsi-usaha-pasangan').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten-usaha-pasangan').empty();
                    $('#kota-kabupaten-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten_usaha_pasangan"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten-usaha-pasangan').empty();
        $('#kota-kabupaten-usaha-pasangan').setAttr("disabled");
    }
});
$('#kota-kabupaten-usaha-pasangan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan-usaha-pasangan').empty();
                    $('#kecamatan-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan_usaha_pasangan"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kecamatan-usaha-pasangan').empty();
        $('#kecamatan-usaha-pasangan').setAttr("disabled");
    }
});
$('#kecamatan-usaha-pasangan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan-usaha-pasangan').empty();
                    $('#kelurahan-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan_usaha_pasangan"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kelurahan-usaha-pasangan').empty();
        $('#kelurahan-usaha-pasangan').setAttr("disabled");
    }
});
</script>
@endpush
