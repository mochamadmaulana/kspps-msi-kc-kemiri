@extends('layout.admin',['title_satu'=>'Form Edit','title_dua'=>'Kantor KC - '.$kantor->nama])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.data-master.kantor.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.data-master.kantor.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<form action="{{ route('admin.data-master.kantor.update',$kantor->id) }}" method="POST" class="card">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Kode Kantor</div>
                <input type="text" name="kode_kantor" class="form-control @error('kode_kantor') is-invalid @enderror" value="{{ @old('kode_kantor',$kantor->kode) }}" placeholder="Kode Kantor.." autofocus>
                @error('kode_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Nama Kantor</div>
                <input type="text" name="nama_kantor" class="form-control @error('nama_kantor') is-invalid @enderror" value="{{ @old('nama_kantor',$kantor->nama) }}" placeholder="Nama Kantor..">
                @error('nama_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Email Kantor</div>
                <input type="text" name="email_kantor" class="form-control @error('email_kantor') is-invalid @enderror" value="{{ @old('email_kantor',$kantor->email) }}" placeholder="Email Kantor..">
                @error('email_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">No.Tlp Kantor</div>
                <input type="number" name="nomor_telepone_kantor" class="form-control @error('nomor_telepone_kantor') is-invalid @enderror" value="{{ @old('nomor_telepone_kantor',$kantor->nomor_telepone) }}" placeholder="No.Tlp Kantor..">
                @error('nomor_telepone_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="row">
                    <div class="col-lg-8 mb-3 mb-sm-0">
                        <div class="form-label">Alamat</div>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ @old('alamat',$kantor->alamat) }}" placeholder="Alamat..">
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-lg">
                        <div class="form-label">RT/RW</div>
                        <input type="text" name="rt_rw" class="form-control @error('rt_rw') is-invalid @enderror" value="{{ @old('rt_rw',$kantor->rt_rw) }}" placeholder="RT/RW..">
                        @error('rt_rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Provinsi</div>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $kantor->provinsi->nama_provinsi }}" disabled>
                    <button class="btn btn-outline-success" type="button" onclick="loadEditModal({{ $kantor->id }})">
                        Edit
                    </button>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Kota/Kabupaten</div>
                <input type="text" class="form-control" value="{{ $kantor->kota->nama_kota }}" disabled>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Kecamatan</div>
                <input type="text" class="form-control" value="{{ $kantor->kecamatan->nama_kecamatan }}" disabled>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Kelurahan</div>
                <input type="text" class="form-control" value="{{ $kantor->kelurahan->nama_kelurahan }}" disabled>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tgl. Didirikan</div>
                <input type="date" name="tanggal_didirikan" class="form-control @error('tanggal_didirikan') is-invalid @enderror" value="{{ @old('tanggal_didirikan',$kantor->tanggal_didirikan) }}" placeholder="Tanggal Didirikan..">
                @error('tanggal_didirikan')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
<!-- Modal Edit Provinsi -->
<div class="modal modal-blur fade" id="modal-edit" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Provinsi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.data-master.kantor.update-provinsi',$kantor->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Provinsi</label>
                        <select name="provinsi" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" data-placeholder="pilih provinsi">
                            <option value=""></option>
                            @foreach ($provinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kota/Kabupaten</label>
                        <select name="kota_kabupaten" class="form-select" id="kota-kabupaten" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kecamatan</label>
                        <select name="kecamatan" class="form-select" id="kecamatan" disabled></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Kelurahan</label>
                        <select name="kelurahan" class="form-select" id="kelurahan" disabled></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
function loadEditModal(id) {
    $('#id-kantor').val(id);
    $('#modal-edit').modal('show');
}
$("#provinsi").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
});
$("#kota-kabupaten").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
});
$("#kecamatan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
});
$("#kelurahan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
});
$('#provinsi').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten').empty();
                    $('#kota-kabupaten').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten').empty();
        $('#kota-kabupaten').setAttr("disabled");
    }
});
$('#kota-kabupaten').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan').empty();
                    $('#kecamatan').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan').empty();
                }
            }
        });
    }else{
        $('#kecamatan').empty();
        $('#kecamatan').setAttr("disabled");
    }
});
$('#kecamatan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan').empty();
                    $('#kelurahan').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan').empty();
                }
            }
        });
    }else{
        $('#kelurahan').empty();
        $('#kelurahan').setAttr("disabled");
    }
});
</script>
@endpush
