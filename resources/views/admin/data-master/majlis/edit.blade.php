@extends('layout.admin',['title_satu'=>'Form Edit','title_dua'=>'Majlis'])

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
<form action="{{ route('admin.data-master.majlis.update',$majlis->id) }}" method="POST" class="card">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <label class="form-label required">Kategori</label>
                <div class="form-selectgroup">
                    <label class="form-selectgroup-item">
                        <input type="radio" name="kategori" value="MMU" class="form-selectgroup-input" @if(@old('kategori',$majlis->kategori) == 'MMU') checked @endif checked>
                        <span class="form-selectgroup-label">
                            <span class="p-auto">MMU</span>
                        </span>
                    </label>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="kategori" value="MMG" class="form-selectgroup-input" @if(@old('kategori',$majlis->kategori) == 'MMG') checked @endif>
                        <span class="form-selectgroup-label">
                            <span class="p-auto">MMG</span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Kode</div>
                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ @old('kode',$majlis->kode) }}" placeholder="Kode.." autofocus>
                @error('kode')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Nama</div>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ @old('nama',$majlis->nama) }}" placeholder="Nama..">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="row">
                    <div class="col-lg-8 mb-3 mb-sm-0">
                        <div class="form-label">Alamat</div>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ @old('alamat',$majlis->alamat) }}" placeholder="Alamat..">
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-lg">
                        <div class="form-label">RT/RW</div>
                        <input type="text" name="rt_rw" class="form-control @error('rt_rw') is-invalid @enderror" value="{{ @old('rt_rw',$majlis->rt_rw) }}" placeholder="RT/RW..">
                        @error('rt_rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Kecamatan</div>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $majlis->kecamatan->nama_kecamatan }}" disabled>
                    <button class="btn btn-outline-success" type="button" onclick="loadEditModal()">
                        Edit
                    </button>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label">Kelurahan</div>
                <input type="text" class="form-control" value="{{ $majlis->kelurahan->nama_kelurahan }}" disabled>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Petugas</div>
                <select name="petugas" class="form-select @error('petugas') is-invalid @enderror" id="petugas" data-placeholder="pilih petugas">
                    <option value=""></option>
                    @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" @if(@old('petugas',$majlis->petugas_id) == $p->id) selected @endif>{{ $p->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error('petugas')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Tgl. Didirikan</div>
                <input type="date" name="tanggal_didirikan" class="form-control @error('tanggal_didirikan') is-invalid @enderror" value="{{ @old('tanggal_didirikan',$majlis->tanggal_didirikan) }}">
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
<!-- Modal Edit Kecamatan -->
<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.data-master.majlis.update-kecamatan',$majlis->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Kecamatan</label>
                        <select name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" data-placeholder="pilih kecamatan">
                            <option value=""></option>
                            @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
function loadEditModal() {
    $('#modal-edit').modal('show');
}
$("#petugas").select2({
    theme: "bootstrap-5",
});
$("#kecamatan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
});
$("#kelurahan").select2({
    theme: "bootstrap-5",
    dropdownParent: "#modal-edit"
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
