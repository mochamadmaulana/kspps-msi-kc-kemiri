@extends('layout.admin',['title_satu'=>'Form Tambah','title_dua'=>'Karyawan'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.data-master.karyawan.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.data-master.karyawan.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<form action="{{ route('admin.data-master.karyawan.store') }}" method="POST" class="card">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="form-label required">No. Induk Karyawan</div>
                <input type="text" name="nomor_induk_karyawan" class="form-control @error('nomor_induk_karyawan') is-invalid @enderror" value="{{ @old('nomor_induk_karyawan') }}" placeholder="No. Induk Karyawan.." autofocus>
                @error('nomor_induk_karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Nama Lengkap</div>
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ @old('nama_lengkap') }}" placeholder="Nama Lengkap..">
                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Email</div>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email') }}" placeholder="Email..">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tempat Lahir</div>
                <select name="tempat_lahir" class="form-select @error('tempat_lahir') is-invalid @enderror" id="tempat-lahir" data-placeholder="pilih tempat lahir">
                    <option value=""></option>
                    @foreach ($tempat_lahir as $tl)
                    <option value="{{ $tl->id }}" @if(@old('tempat_lahir') == $tl->id) selected @endif>{{ $tl->nama_kota }}</option>
                    @endforeach
                </select>
                @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tgl. Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ @old('tanggal_lahir') }}">
                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Password</div>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Pengguna..">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <label class="form-label required">Role</label>
                <div class="form-selectgroup">
                    @foreach ($role as $val_role)
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="{{ $val_role }}" class="form-selectgroup-input" @if(@old('role') == $val_role) checked @endif>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                            <span class="p-auto">{{ $val_role }}</span>
                        </span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
            Simpan
        </button>
    </div>
</form>
@endsection

@push('js')
<script>
$("#tempat-lahir").select2({
    theme: "bootstrap-5",
});
</script>
@endpush
