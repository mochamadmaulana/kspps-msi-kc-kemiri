@extends('layout.admin',['title_satu'=>'List','title_dua'=>'Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        @if ($draft != NULL)
        <a href="#" class="btn btn-secondary d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-files"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
            Draft
            <span class="badge bg-yellow ms-2">{{ $draft }}</span>
        </a>
        <a href="#" class="mx-2 btn btn-secondary d-sm-none btn-icon position-relative">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-files"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
            <span class="badge bg-yellow badge-notification badge-pill">{{ $draft }}</span>
        </a>
        @endif
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Registrasi
        </a>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
        </a>
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
                        <input type="search" name="search" class="form-control form-control-md" value="{{ request('search') }}" placeholder="Cari disini.." autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-hover">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>No. Identitas</th>
                        <th>Majlis</th>
                        <th>No. Telepone</th>
                        <th>Inputer</th>
                        <th>Keanggotaan</th>
                        <th>Registrasi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $a)
                    <tr>
                        <td>{{ $a->nama_lengkap }}</td>
                        <td>{{ $a->nomor_identitas }} <span class="ms-1 badge bg-info">{{ $a->jenis_identitas }}</span></td>
                        <td>{{ $a->majlis->kode }} {{ $a->majlis->nama }}</td>
                        <td>{{ $a->nomor_telepone }}</td>
                        {{-- <td class="fst-italic">{{ $a->registrasi }}</td> --}}
                        <td class="fst-italic"></td>
                        <td><span class="{{ \Helpers::badge_status_keanggotaan($a->status) }}">{{ $a->status }}</span></td>
                        <td><span class="{{ \Helpers::badge_registrasi_anggota($a->registrasi->status) }}">{{ $a->registrasi->status }}</span></td>
                        <td>
                            <div class="btn-list flex-nowrap float-end">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('admin.anggota.show',$a->id) }}">
                                            Detail
                                        </a>
                                        @if ($a->registrasi->inputer_id == Auth::user()->id && $a->registrasi->status != 'Diterima'&& $a->registrasi->status != 'Diproses')
                                        <a class="dropdown-item" href="{{ route('admin.anggota.edit',$a->id) }}">
                                            Edit
                                        </a>
                                        <button class="dropdown-item" type="button" onclick="loadDeleteModal({{ $a->id }}, `{{ $a->nama_lengkap }}`)">
                                            Hapus
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 p-3">
            <span class="float-right">{{ $anggota->links() }}</span>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal Hapus Data -->
<div class="modal modal-blur fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin, untuk menghapus anggota <span class="fw-bold fst-italic" id="nama-lengkap"></span>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <button type="button" id="modal-confirm_delete" class="btn btn-danger ms-auto" data-bs-dismiss="modal">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
function loadDeleteModal(id, name) {
    $('#nama-lengkap').html(name);
    $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
    $('#modal-hapus').modal('show');
}
function confirmDelete(id) {
    $.ajax({
        url: '{{ url('admin/anggota') }}/' + id,
        type: 'delete',
        data : {"_token":"{{ csrf_token() }}"},
        success: function(response){
            //hide modal
            $('#modal-hapus').modal('hide');
            //show success message
            if(response.success){
                location.reload();
            }
        },
        error: function (error) {
            // Error logic goes here..!
            alert('Something error, please try again!')
        }
    });
}
</script>
@endpush
