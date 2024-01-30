@extends('layout.staff_lapangan',['title_satu'=>'List Laporan','title_dua'=>'Pengajuan Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
            Download
        </a>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 p-3">
            {{-- <span class="float-right">{{ $anggota->links() }}</span> --}}
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
