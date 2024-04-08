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
                    <h3 class="card-title">ALAMAT IDENTITAS</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Alamat</div>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ @old('alamat') }}" placeholder="Alamat..">
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-6 mb-3 mb-sm-0">
                                            <div class="form-label">RT</div>
                                            <input type="number" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ @old('rt') }}" placeholder="RT..">
                                            @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-6 mb-3 mb-sm-0">
                                            <div class="form-label">RW</div>
                                            <input type="number" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ @old('rw') }}" placeholder="RW..">
                                            @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-label">Kode Pos</div>
                                    <input type="number" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" value="{{ @old('kode_pos') }}" placeholder="Kode Pos..">
                                    @error('kode_pos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Provinsi</label>
                            <select name="provinsi" class="form-select @error('kelurahan') is-invalid @enderror" id="provinsi" data-placeholder="pilih provinsi">
                                <option value=""></option>
                                @foreach ($provinsi as $prov)
                                <option value="{{ $prov->id }}">{{ $prov->nama_provinsi }}</option>
                                @endforeach
                            </select>
                            @error('provinsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Kota/Kabupaten</label>
                            <select name="kota_kabupaten" class="form-select @error('kelurahan') is-invalid @enderror" id="kota-kabupaten" disabled></select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Kecamatan</label>
                            <select name="kecamatan" class="form-select @error('kelurahan') is-invalid @enderror" id="kecamatan" disabled></select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Kelurahan</label>
                            <select name="kelurahan" class="form-select @error('kelurahan') is-invalid @enderror" id="kelurahan" disabled></select>
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
$("#provinsi").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten").select2({
    theme: "bootstrap-5",
});
$("#kecamatan").select2({
    theme: "bootstrap-5",
});
$("#kelurahan").select2({
    theme: "bootstrap-5",
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
