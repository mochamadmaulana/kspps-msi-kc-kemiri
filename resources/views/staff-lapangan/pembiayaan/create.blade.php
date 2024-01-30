@extends('layout.staff_lapangan',['title_satu'=>'Form Tambah','title_dua'=>'Pembiayaan'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('staff-lapangan.pembiayaan.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('staff-lapangan.pembiayaan.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<form action="{{ route('staff-lapangan.pembiayaan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Anggota</h1>
            <a class="ms-3" href="javascript:void(0)" id="btn-modal-detail-anggota" data-id_anggota="{{ Session::get('id_anggota') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye hide-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                Detail
            </a>
        </div>
        {{-- <div class="card-body collapse" id="collapseDataAnggota"> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label">No. Identitas {{ Session::get('jenis_identitas') }}</div>
                    <input type="hidden" value="{{ Session::get('id_anggota') }}">
                    <input type="text" class="form-control" value="{{ Session::get('nomor_identitas') }}" readonly>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">No. Kartu Keluarga</label>
                    <input type="text" class="form-control" value="{{ Session::get('nomor_kartu_keluarga') }}" readonly>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Nama Lengkap</div>
                    <input type="text" class="form-control" value="{{ Session::get('nama_lengkap') }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3"><hr></div>
                <div class="col-lg-4 mb-3 my-auto"><h3 class="text-muted fst-italic text-center">Usaha Anggota</h3></div>
                <div class="col-lg-4 mb-3"><hr></div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Jenis Usaha</label>
                    <input type="text" class="form-control" value="{{ Session::get('nama_ibu_kandung') }}" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Pasangan Anggota</h1>
            {{-- <a class="ms-3" data-bs-toggle="collapse" href="#collapseDataPasangan" role="button" aria-expanded="false" aria-controls="collapseDataPasangan">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye hide-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                View
            </a> --}}
        </div>
        {{-- <div class="card-body collapse" id="collapseDataPasangan"> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Nama Lengkap</div>
                    <input type="text" class="form-control" value="{{ Session::get('nama_lengkap_pasangan') }}" readonly>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label">Tempat, Tgl. Lahir</div>
                    <input type="text" class="form-control" value="{{ Session::get('tempat_tanggal_lahir_pasangan') }}" readonly>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">No. Identitas {{ Session::get('jenis_identitas_pasangan') }}</div>
                    <input type="text" class="form-control" value="{{ Session::get('nomor_identitas_pasangan') }}" readonly>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jenis Usaha</label>
                    <select name="kecamatan_identitas" class="form-select" id="kecamatan-identitas"></select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Komoditi Usaha</label>
                    <select name="kelurahan_identitas" class="form-select" id="kelurahan-identitas"></select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Perbulan</label>
                    <select name="kelurahan_identitas" class="form-select" id="kelurahan-identitas"></select>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Detail Tempat Tinggal</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Tempat Tinggal</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih tempat tinggal">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Milik Sendiri</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Milik Orang Tua</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Kontrakan/Sewa</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Lantai</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih lantai">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Keramik</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Semen</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Tanah</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Dinding</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih dinding">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Tembok</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>bilik</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Luas Bangunan</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih luas bangunan">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Sedang</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Luas</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Kecil</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Toilet</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih toilet">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Jamban</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>WC Milik Sendiri</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>WC Umum</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Sumber Air</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih sumber air">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Sumur</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>PAM</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Pendapatan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Anggota</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Pasangan</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Lain-lain</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jumlah Pendapatan</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="Pend.Anggota + Pend.Pasangan + Lain-lain" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jumlah Anggota Keluarga</label>
                    <input name="kota_kabupaten_identitas" class="form-control">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Perkapita</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="Jml.Perkapita : Jml Anggota Kel." disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Pengeluaran</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Konsumsi Sembako</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Biaya Lauk-Pauk</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Biaya Pendidikan</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Biaya Listrik (1 Bulan)</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Angsuran Ditempat Lain</label>
                    <input name="kota_kabupaten_identitas" class="form-control">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Biaya Lain-lain</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Jumlah Pengeluaran</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Pengajuan Pembiayaan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Nominal Pembiayaan Sebelumnya</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Nominal Anggsuran</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Nominal Pengajuan</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Tujuan Pembiayaan</label>
                    <input name="kota_kabupaten_identitas" class="form-control" placeholder="">
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Jenis Akad</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih tempat tinggal">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Muharabah (MMU)</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Muharabah (MMG)</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-label required">Jangka Waktu</div>
                    <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih tempat tinggal">
                        <option value=""></option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>25 Minggu</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>50 Minggu</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>75 Minggu</option>
                        <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>100 Minggu</option>
                    </select>
                    @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h1 class="card-title">Pengajuan Pembiayaan Berkelanjutan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Nominal Tabungan Saat Ini</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Nominal Anggsuran Lalu</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" disabled>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label required">Pendapatan Perkapita</label>
                    <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-secondary">
                        <h1 class="card-title text-white">Prestasi Kehadiran Anggota</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label required">Kehadiran</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label required">Alfa</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label required">Tempo</label>
                                        <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih tempat tinggal">
                                            <option value=""></option>
                                            <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>25</option>
                                            <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>50</option>
                                            <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>75</option>
                                            <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>100</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label required">Presentase</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label class="form-label required">Jumlah % Kehadiran</label>
                                <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-secondary">
                        <h1 class="card-title text-white">Prestasi Kecepatan Pelunasan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Tempo</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Anggsuran Lalu</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Minggu Lunas</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Presentase</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label class="form-label required">Jumlah % Kelunasan</label>
                                <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-secondary">
                        <h1 class="card-title text-white">Prestasi Tabungan Sukarela</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Saldo Tabungan</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Minggu Lunas</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Minggon</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas" placeholder="">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label class="form-label required">Presentase</label>
                                        <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label class="form-label required">Jumlah % Tab. Sukarela</label>
                                <input name="kota_kabupaten_identitas" class="form-control" id="kota-kabupaten-identitas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('modal')
<!-- Modal Detail Anggota -->
<div class="modal modal-blur fade" id="modal-detail-anggota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Anggota {{ Session::get('nama_lengkap') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-4 mb-3">
                        <div class="form-label">Tempat, Tgl. Lahir</div>
                        <input type="text" class="form-control" id="tempat-tanggal-lahir" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-label">No. Telepone</div>
                        <input type="text" class="form-control" value="{{ Session::get('nomor_telepone') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="form-label">Alamat</div>
                        <input type="text" class="form-control" value="{{ Session::get('alamat') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6 mb-3 mb-sm-0">
                                        <div class="form-label">RT</div>
                                        <input type="text" class="form-control" value="{{ Session::get('rt') ?? '...' }}" readonly>
                                    </div>
                                    <div class="col-6 mb-3 mb-sm-0">
                                        <div class="form-label">RW</div>
                                        <input type="text" class="form-control" value="{{ Session::get('rw') ?? '...' }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-label">Kode Pos</div>
                                <input type="text" class="form-control" value="{{ Session::get('kode_pos') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" class="form-control" value="{{ Session::get('provinsi') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" value="{{ Session::get('kota') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" value="{{ Session::get('kecamatan') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" value="{{ Session::get('kelurahan') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" value="{{ Session::get('pendidikan_terakhir') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">No. Kartu Keluarga</label>
                        <input type="text" class="form-control" value="{{ Session::get('nomor_kartu_keluarga') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Jenis Usaha</label>
                        <input type="text" class="form-control" value="{{ Session::get('jenis_usaha') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Komoditi Usaha</label>
                        <input type="text" class="form-control" value="{{ Session::get('komoditi_usaha') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Deskripsi Usaha</label>
                        <input type="text" class="form-control" value="{{ Session::get('deskripsi') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Pendapatan Perbulan</label>
                        <input type="text" class="form-control" value="{{ Session::get('pendapatan_perbulan') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Majlis</label>
                        <input type="text" class="form-control" value="{{ Session::get('majlis') }}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Nama Ibu Kandung</label>
                        <input type="text" class="form-control" value="{{ Session::get('nama_ibu_kandung') }}" readonly>
                    </div>
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
        </div>
    </div>
</div>
<!-- Modal Edit Identitas -->
<div class="modal modal-blur fade" id="modal-edit-identitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">
                            Pilih Identitas
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pilih KTP/SIM"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="identitas" value="KTP" class="form-selectgroup-input" @if(@old('identitas',session()->get('identitas')) == 'KTP') checked @endif checked>
                                <span class="form-selectgroup-label">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                                    <span class="p-auto">KTP</span>
                                </span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="identitas" value="SIM" class="form-selectgroup-input" @if(@old('identitas',session()->get('identitas')) == 'SIM') checked @endif>
                                <span class="form-selectgroup-label">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                                    <span class="p-auto">SIM</span>
                                </span>
                            </label>
                        </div>
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

@push('js')
<script>
$('#btn-modal-detail-anggota').on('click',function(){
    $('#btn-modal-detail-anggota').modal('show');
    if($('#modal-detail-anggota').data('id_anggota')) {
        $.ajax({
            url: '{{ url('get-anggota/') }}/' + $('#btn-modal-detail-anggota').data('id_anggota'),
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#tempat-tanggal-lahir').empty();
                    $.each(data, function(key, anggota){
                        $('#tempat-tanggal-lahir').val(anggota.tempat_lahir->nama+', '+anggota.tanggal_lahir);
                    });
                }else{
                    $('#tempat-tanggal-lahir').empty();
                    alert('ErRor, Something wrong, please contact admin !');
                }
            }
        });
    }else{
        $('#tempat-tanggal-lahir').empty();
    }
})
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
$("#provinsi-identitas").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten-identitas").select2({
    theme: "bootstrap-5",
});
$("#kecamatan-identitas").select2({
    theme: "bootstrap-5",
});
$("#kelurahan-identitas").select2({
    theme: "bootstrap-5",
});
$('#provinsi-identitas').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten-identitas').empty();
                    $('#kota-kabupaten-identitas').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten_identitas"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten-identitas').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten-identitas').empty();
        $('#kota-kabupaten-identitas').setAttr("disabled");
    }
});
$('#kota-kabupaten-identitas').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan-identitas').empty();
                    $('#kecamatan-identitas').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan_identitas"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan-identitas').empty();
                }
            }
        });
    }else{
        $('#kecamatan-identitas').empty();
        $('#kecamatan-identitas').setAttr("disabled");
    }
});
$('#kecamatan-identitas').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan-identitas').empty();
                    $('#kelurahan-identitas').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan_identitas"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan-identitas').empty();
                }
            }
        });
    }else{
        $('#kelurahan-identitas').empty();
        $('#kelurahan-identitas').setAttr("disabled");
    }
});
$("#provinsi-usaha").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten-usaha").select2({
    theme: "bootstrap-5",
});
$("#kecamatan-usaha").select2({
    theme: "bootstrap-5",
});
$("#kelurahan-usaha").select2({
    theme: "bootstrap-5",
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
</script>
@endpush
