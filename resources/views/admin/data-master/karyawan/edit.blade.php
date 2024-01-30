@extends('layout.admin',['title_satu'=>'Form Edit','title_dua'=>'Karyawan'])

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
<form action="{{ route('admin.data-master.karyawan.update',$karyawan->id) }}" method="POST" class="card">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="form-label required">No. Induk Karyawan</div>
                <input type="text" name="nomor_induk_karyawan" class="form-control @error('nomor_induk_karyawan') is-invalid @enderror" value="{{ @old('nomor_induk_karyawan',$karyawan->nomor_induk_karyawan) }}" placeholder="No. Induk Karyawan.." autofocus>
                @error('nomor_induk_karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Nama Lengkap</div>
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ @old('nama_lengkap',$karyawan->nama_lengkap) }}" placeholder="Nama Lengkap..">
                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Email</div>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email',$karyawan->email) }}" placeholder="Email..">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tempat Lahir</div>
                <select name="tempat_lahir" class="form-select @error('tempat_lahir') is-invalid @enderror" id="tempat-lahir" data-placeholder="pilih tempat lahir">
                    <option value=""></option>
                    @foreach ($tempat_lahir as $tl)
                    <option value="{{ $tl->id }}" @if(@old('tempat_lahir',$karyawan->tempat_lahir_id) == $tl->id) selected @endif>{{ $tl->nama_kota }}</option>
                    @endforeach
                </select>
                @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tgl. Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ @old('tanggal_lahir',$karyawan->tanggal_lahir) }}">
                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Password</div>
                <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit-pass">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                    Edit Password
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <label class="form-label required">Role</label>
                <div class="form-selectgroup">
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="Staff Lapangan" class="form-selectgroup-input" @if(@old('role',$karyawan->role) == 'Staff Lapangan') checked @endif checked>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                            <span class="p-auto">Staff Lapangan</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="Kasi Pembiayaan" class="form-selectgroup-input" @if(@old('role',$karyawan->role) == 'Kasi Pembiayaan') checked @endif>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                            <span class="p-auto">Kasi Pembiayaan</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="Kasi Keuangan" class="form-selectgroup-input" @if(@old('role',$karyawan->role) == 'Kasi Keuangan') checked @endif>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                            <span class="p-auto">Kasi Keuangan</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="Branch Manager" class="form-selectgroup-input" @if(@old('role',$karyawan->role) == 'Branch Manager') checked @endif>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> --}}
                            <span class="p-auto">Branch Manager</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="role" value="Admin" class="form-selectgroup-input" @if(@old('role',$karyawan->role) == 'Admin') checked @endif>
                        <span class="form-selectgroup-label">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19l18 0" /><path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /></svg> --}}
                            <span class="p-auto">Admin</span>
                        </span>
                    </label>
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

@push('modal')
<!-- Modal Edit Password -->
<div class="modal modal-blur fade" id="modal-edit-pass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.data-master.karyawan.edit-password',$karyawan->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            Password Baru
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="minimal 3 karakter"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="password" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Password Baru..">
                        @error('password_baru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-label required">Konfirmasi Password</div>
                        <input type="password" name="konfirm_password" class="form-control @error('konfirm_password') is-invalid @enderror" placeholder="Konfirm Password Baru..">
                        @error('konfirm_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link text-red" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
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
$("#tempat-lahir").select2({
    theme: "bootstrap-5",
});
</script>
@endpush
