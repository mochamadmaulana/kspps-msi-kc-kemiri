@extends('layout.staff_lapangan', ['title_dua' => 'Profile'])

@section('page-body')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Akun</h3>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush list-group-hoverable">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Nama Lengkap</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">{{ Auth::user()->nama_lengkap }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">No. Induk Karyawan</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">{{ Auth::user()->nomor_induk_karyawan }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Email</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Tempat, Tgl Lahir</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">
                                            {{ \Helpers::str_ucfirst(Auth::user()->tempat_lahir->nama_kota) }}, {{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Kantor</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">{{ Auth::user()->kantor->nama }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Role</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">
                                            <span class="{{ \Helpers::bg_badge_role(Auth::user()->role) }}">{{ Auth::user()->role }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col text-truncate">
                                        <p class="text-reset d-block m-0">Status</p>
                                        <div class="d-block fst-italic text-muted text-truncate mt-n1">
                                            <span class="{{ \Helpers::badge_status_karyawan(Auth::user()->status) }}">{{ Auth::user()->status }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Foto Profile</h3>
                </div>
                <div class="card-body text-center">
                    @if (Auth::user()->foto_profile == NULL)
                    <span class="avatar avatar-xl" style="background-image: url({{ asset('frontend/dist/img/default.jpg') }})"></span>
                    @else
                    <a href="{{ asset('storage/img/foto-profile/'.Auth::user()->kantor->uuid.'/'.Auth::user()->foto_profile) }}" target="_blank">
                        <img src="{{ asset('storage/img/foto-profile/'.Auth::user()->kantor->uuid.'/'.Auth::user()->foto_profile) }}" class="avatar avatar-xl"></img>
                        {{-- <span class="avatar avatar-xl" style="background-image: url({{ asset('storage/img/foto-profile/'.Auth::user()->kantor->uuid.'/'.Auth::user()->foto_profile) }})"></span> --}}
                    </a>
                    @endif
                    <div class="d-grid gap-2">
                        @if (Auth::user()->foto_profile == NULL)
                        <a href="javascript:void(0)" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modal-upload-foto-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                            Upload
                        </a>
                        @else
                        <form action="{{ route('admin.profile.delete-foto-profile') }}" method="POST" class="d-grid">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                Hapus
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card my-2">
                <div class="card-header">
                    <h3 class="card-title">Edit Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update-password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label required">Password</div>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ @old('password') }}" placeholder="Password Baru..">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-label required">Konfirmasi Password</div>
                            <input type="password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" value="{{ @old('konfirmasi_password') }}" placeholder="Konfirmasi Password..">
                            @error('konfirmasi_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal Upload Foto Profile -->
<div class="modal modal-blur fade" id="modal-upload-foto-profile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Foto Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.profile.upload-foto-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label required">
                            Foto Profile
                            <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Format file : jpg jpeg png pdf | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                        </div>
                        <input type="file" name="foto_profile" class="form-control @error('foto_profile') is-invalid @enderror" />
                        @error('foto_profile')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush
