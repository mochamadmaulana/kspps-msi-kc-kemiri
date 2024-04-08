@extends('layout.branch_manager',['title_satu'=>'List','title_dua'=>'Karyawan'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        @if (request('search'))
        <a href="{{ route('branch-manager.data-master.karyawan.index') }}" class="btn btn-warning d-none d-sm-inline-block" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
            Refresh
        </a>
        <a href="{{ route('branch-manager.data-master.karyawan.index') }}" class="btn btn-warning d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
        </a>
        @endif
    </div>
</div>
@endpush
@section('page-body')
<div class="col-12">
    <div class="card">
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="ms-auto text-muted">
                    Search:
                    <div class="mx-2 d-inline-block">
                        <form action="">
                        <input type="search" name="search" class="form-control form-control-md" value="{{ request('search') }}" placeholder="Cari disini.." autocomplete="off" @if(request('search')) autofocus @endif>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-hover">
                <thead>
                    <tr>
                        <th>No. Induk Karyawan</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tempat, TgL. Lahir</th>
                        <th>Role</th>
                        <th>Aktif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                    <tr>
                        <td>{{ $k->nomor_induk_karyawan }}</td>
                        <td>{{ $k->nama_lengkap }}</td>
                        <td>{{ $k->email }}</td>
                        <td>{{ \Helpers::str_ucfirst($k->tempat_lahir->nama_kota) }}, {{ \Carbon\Carbon::parse($k->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        <td><span class="{{ \Helpers::bg_badge_role($k->role) }}">{{ $k->role }}</span></td>
                        <td><span class="badge {{ \Helpers::badge_status_karyawan($k->status) }}"><?= $k->status ?></span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 p-3">
            <span class="float-right">{{ $karyawan->links() }}</span>
        </div>
    </div>
</div>
@endsection
