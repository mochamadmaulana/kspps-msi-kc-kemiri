@extends('layout.admin',['title_satu'=>'Detail','title_dua'=>'Majlis'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.data-master.majlis.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.data-master.majlis.index') }}" class="btn btn-secondary d-sm-none btn-icon">
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
                    <td class="col-lg fst-italic">
                        @if ($majlis->ketua_id != null)
                        {{ $majlis->ketua->nama_lengkap }}
                        <a href="javascript:void(0)" class="fst-italic text-green" onclick="pilihKetua({{ $majlis->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </a>
                        @else
                        <a href="javascript:void(0)" class="fst-italic text-primary" onclick="pilihKetua({{ $majlis->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                            Pilih Ketua
                        </a>
                        @endif
                    </td>
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
                    <td class="col-lg fst-italic">{{ date('d-M-Y',strtotime($majlis->tanggal_didirikan)) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal Pilih Ketua -->
<div class="modal modal-blur fade" id="modal-pilih-ketua" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Ketua Majlis {{ $majlis->nama }}</h5>
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
function pilihKetua(id){
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
