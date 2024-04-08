@extends('layout.branch_manager',['title_satu'=>'Detail','title_dua'=>'Majlis'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('branch-manager.data-master.majlis.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('branch-manager.data-master.majlis.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th class="col-lg-3">Kode</th>
                    <td class="col-lg fst-italic">{{ $majlis->kode }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Kategori</th>
                    <td class="col-lg fst-italic">{{ $majlis->kategori }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Nama</th>
                    <td class="col-lg fst-italic">{{ $majlis->nama }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Ketua</th>
                    <td class="col-lg fst-italic">{{ $majlis->ketua->nama_lengkap ?? '...' }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Petugas</th>
                    <td class="col-lg fst-italic">{{ $majlis->petugas->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Kecamatan</th>
                    <td class="col-lg fst-italic">{{ $majlis->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Kelurahan</th>
                    <td class="col-lg fst-italic">{{ $majlis->kelurahan->nama_kelurahan }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Alamat</th>
                    <td class="col-lg fst-italic">{{ $majlis->alamat }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">RT/RW</th>
                    <td class="col-lg fst-italic">{{ $majlis->rt_rw }}</td>
                </tr>
                <tr>
                    <th class="col-lg-3">Tgl. Didirikan</th>
                    <td class="col-lg fst-italic">{{ \Carbon\Carbon::parse($majlis->tanggal_didirikan)->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
