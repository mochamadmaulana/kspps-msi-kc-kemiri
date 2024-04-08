@extends('layout.admin',['title_satu'=>'Registrasi','title_dua'=>'Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.anggota.registrasi',$data_regist->id) }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.anggota.registrasi',$data_regist->id) }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<div class="row">
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">No. Registrasi : <span class="fw-bold">{{ $data_regist->nomor_registrasi }}</span></h3>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @if ($identitas != NULL)
                    <a href="#" class="list-group-item list-group-item-action text-success">
                        <span class="text-danger">*</span> IDENTITAS KTP/SIM
                        <span class="ms-auto">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                        </span>
                    </a>
                    @else
                    <a href="{{ route('admin.anggota.registrasi.identitas',$data_regist->id) }}" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> IDENTITAS KTP/SIM
                    </a>
                    @endif
                    <span class="list-group-item list-group-item-action active">
                        <span class="text-danger">*</span> ALAMAT IDENTITAS
                    </span>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> USAHA
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> ALAMAT USAHA
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> PASANGAN
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> USAHA PASANGAN
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> ALAMAT USAHA PASANGAN
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> LAMPIRAN
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> SYARAT & KETENTUAN
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg">
        <form action="{{ route('admin.anggota.registrasi.alamat-identitas-store',$data_regist->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">USAHA</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Jenis Usaha</div>
                            <select name="jenis_usaha" class="form-select @error('jenis_usaha') is-invalid @enderror" id="jenis-usaha" data-placeholder="pilih jenis usaha">
                                <option value=""></option>
                                @foreach ($jenis_usaha as $ju)
                                <option value="{{ $ju->id }}">{{ $ju->nama }} ({{ $ju->kode }})</option>
                                @endforeach
                            </select>
                            @error('jenis_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Komoditi Usaha</label>
                            <select name="komoditi_usaha" class="form-select" id="komoditi-usaha" disabled></select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label">Deskripsi</div>
                            <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ @old('deskripsi') }}" placeholder="Deskripsi..">
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
$("#jenis-usaha").select2({
    theme: "bootstrap-5",
});
$("#komoditi-usaha").select2({
    theme: "bootstrap-5",
});
$('#jenis-usaha').on('change', function() {
    var usahaID = $(this).val();
    if(usahaID) {
        $.ajax({
            url: '/get-komoditi-usaha/'+usahaID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#komoditi-usaha').empty();
                    $('#komoditi-usaha').removeAttr("disabled");
                    $.each(data, function(key, komoditi){
                        $('select[name="komoditi_usaha"]').append('<option value="'+ komoditi.id +'">' + komoditi.nama+ '</option>');
                    });
                }else{
                    $('#komoditi-usaha').empty();
                }
            }
        });
    }else{
        $('#komoditi-usaha').empty();
        $('#komoditi-usaha').setAttr("disabled");
    }
});
</script>
@endpush
