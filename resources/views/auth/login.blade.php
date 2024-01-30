@extends('layout.auth',['title'=>'Login'])

@section('page-body')
<div class="card card-md">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">Login akun <b class="fst-italic text-primary">KSPPS MSI</b></h2>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">No. Induk Karyawan</label>
                <input type="text" name="nomor_induk_karyawan" class="form-control @error('nomor_induk_karyawan') is-invalid @enderror" placeholder="No. Induk Karyawan.." autofocus>
                @error('nomor_induk_karyawan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                    {{-- <span class="form-label-description">
                        <a href="#">Saya lupa password</a>
                    </span> --}}
                </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password..">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M3 12h13l-3 -3" /><path d="M13 15l3 -3" /></svg>
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
