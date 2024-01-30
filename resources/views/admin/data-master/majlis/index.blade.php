@extends('layout.admin',['title_satu'=>'List','title_dua'=>'Majlis'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        @if (request('search'))
        <a href="{{ route('admin.data-master.majlis.index') }}" class="btn btn-warning d-none d-sm-inline-block" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
            Refresh
        </a>
        <a href="{{ route('admin.data-master.majlis.index') }}" class="btn btn-warning d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
        </a>
        @endif
        <a href="{{ route('admin.data-master.majlis.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Majlis
        </a>
        <a href="{{ route('admin.data-master.majlis.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                        <th>Kode</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Ketua</th>
                        <th>Petugas</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Tgl. Didirikan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majlis as $m)
                    <tr>
                        <td>{{ $m->kode }}</td>
                        <td>{{ $m->kategori }}</td>
                        <td>{{ $m->nama }}</td>
                        <td class="fst-italic">
                            @if ($m->ketua_id != null)
                            {{ $m->ketua->nama_lengkap }}
                            <a href="javascript:void(0)" class="text-green" onclick="pilihKetua({{ $m->id }},`{{ $m->nama }}`)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            </a>
                            @else
                            <a href="javascript:void(0)" class="text-primary" onclick="pilihKetua({{ $m->id }},`{{ $m->nama }}`)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                                Pilih Ketua
                            </a>
                            @endif
                        </td>
                        <td>{{ $m->petugas->nama_lengkap }}</td>
                        <td>{{ $m->kecamatan->nama_kecamatan }}</td>
                        <td>{{ $m->kelurahan->nama_kelurahan }}</td>
                        <td>{{ date('d-M-Y',strtotime($m->tanggal_didirikan)) }}</td>
                        <td>
                            <div class="btn-list flex-nowrap float-end">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('admin.data-master.majlis.show',$m->id) }}">
                                            Detail
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.data-master.majlis.edit',$m->id) }}">
                                            Edit
                                        </a>
                                        <button class="dropdown-item" type="button" onclick="loadDeleteModal({{ $m->id }}, `{{ $m->kode }}`, `{{ $m->nama }}`)">
                                            Hapus
                                        </button>
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
            <span class="float-right">{{ $majlis->links() }}</span>
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
                Yakin, untuk menghapus majlis <span class="fw-bold fst-italic" id="kode-majlis"></span> <span class="fw-bold fst-italic" id="nama-majlis"></span>
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
<!-- Modal Pilih Ketua -->
<div class="modal modal-blur fade" id="modal-pilih-ketua" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-pilih-ketua"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.data-master.majlis.store-ketua') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_majlis">
                    <div class="mb-3">
                        <label class="form-label required">Pilih Ketua</label>
                        <select name="ketua" class="form-select" id="ketua"></select>
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
$("#ketua").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-pilih-ketua"
});
function loadDeleteModal(id, kode, nama) {
    $('#kode-majlis').html(kode);
    $('#nama-majlis').html(nama);
    $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
    $('#modal-hapus').modal('show');
}
function confirmDelete(id) {
    $.ajax({
        url: '{{ url('admin/data-master/majlis') }}/' + id,
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
function pilihKetua(id,nama){
    $('#title-pilih-ketua').text('Pilih Ketua Majlis ' + nama);
    if(id) {
        $.ajax({
            url: '{{ url('get-anggota-majlis') }}/' + id,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#ketua').empty();
                    $('input[name="id_majlis"]').val(id);
                    $.each(data, function(key, anggota){
                        $('select[name="ketua"]').append('<option value="'+ anggota.id +'">' + anggota.nama_lengkap+ '</option>');
                    });
                    $('#modal-pilih-ketua').modal('show');
                }else{
                    $('#ketua').empty();
                    $('input[name="id_majlis"]').empty()
                }
            }
        });
    }else{
        $('#ketua').empty();
        $('input[name="id_majlis"]').empty();
    }
}
</script>
@endpush
