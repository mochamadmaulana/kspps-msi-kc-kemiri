@extends('layout.admin',['title_satu'=>'Registrasi','title_dua'=>'Anggota'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary d-sm-none btn-icon">
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
                    <a href="{{ route('admin.anggota.registrasi.identitas-edit',[$data_regist->id,$identitas->id]) }}" class="list-group-item list-group-item-action text-success">
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
                    @if ($alamat_identitas != NULL)
                    <a href="#" class="list-group-item list-group-item-action text-success">
                        <span class="text-danger">*</span> ALAMAT IDENTITAS
                        <span class="ms-auto">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                        </span>
                    </a>
                    @else
                    <a href="{{ route('admin.anggota.registrasi.alamat-identitas',$data_regist->id) }}" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> ALAMAT IDENTITAS
                    </a>
                    @endif
                    <a href="{{ route('admin.anggota.registrasi.usaha',$data_regist->id) }}" class="list-group-item list-group-item-action">
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ringkasan</h3>
            </div>
            <div class="card-body">
                <ul class="steps steps-counter steps-vertical">
                    <li class="step-item">
                        @if ($identitas != NULL)
                        <div class="h4 m-0 text-success">
                            IDENTITAS KTP/SIM
                            <span class="ms-auto">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                            </span>
                        </div>
                        @else
                        <div class="h4 m-0">IDENTITAS KTP/SIM</div>
                        @endif
                        <div class="text-muted">
                            Identitas calon anggota KSPPS harus sesuai dengan jenis identitas yang dipilih, KTP atau SIM!
                        </div>
                    </li>

                    <li class="step-item">
                        @if ($alamat_identitas != NULL)
                        <div class="h4 m-0 text-success">
                            ALAMAT IDENTITAS
                            <span class="ms-auto">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checks"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                            </span>
                        </div>
                        @else
                        <div class="h4 m-0">ALAMAT IDENTITAS</div>
                        @endif
                        <div class="text-muted">
                            Alamat calon anggota KSPPS harus sesuai dengan alamat dari jenis identitas yang dipilih pada tahap ke-1
                        </div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">USAHA</div>
                        <div class="text-muted">
                            Calon anggota KSPPS harus memiliki usaha, jika tidak maka dianggap tidak layak untuk menjadi anggota KSPPS!
                        </div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">ALAMAT USAHA</div>
                        <div class="text-muted">Alamat usaha calon anggota KSPPS diisi dengan benar sesuai fakta dilapangan!</div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">PASANGAN</div>
                        <div class="text-muted">Jika calon anggota KSPPS belum menikah maka tahap ke-5 (PASANGAN) ini diisikan dengan sanak-saudara kandung!</div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">ALAMAT USAHA PASANGAN</div>
                        <div class="text-muted">Alamat usaha pasangan calon anggota KSPPS diisi dengan benar sesuai fakta dilapangan!</div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">LAMPIRAN</div>
                        <div class="text-muted">
                            Lampiran berupa foto/file :
                            <ol>
                                <li>KTP/SIM</li>
                                <li>Selfie dengan KTP/SIM sesuai jenis identitas yang dipilih pada tahap ke-1</li>
                                <li>Kartu Keluarga (KK)</li>
                                <li>Bukti Pembayaran Registrasi</li>
                            </ol>
                        </div>
                    </li>
                    <li class="step-item">
                        <div class="h4 m-0">SYARAT & KETENTUAN</div>
                        <div class="text-muted">Calon anggota KSPPS wajib menyetujui SYARAT & KETENTUAN yang berlaku!</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$("#majlis").select2({
    theme: "bootstrap-5",
});
$("#tempat-lahir").select2({
    theme: "bootstrap-5",
});
$("#agama").select2({
    theme: "bootstrap-5",
});
$("#status-pernikahan").select2({
    theme: "bootstrap-5",
});
$("#pendidikan-terakhir").select2({
    theme: "bootstrap-5",
});
$("#jenis-usaha").select2({
    theme: "bootstrap-5",
});
$("#komoditi-usaha").select2({
    theme: "bootstrap-5",
});
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
$("#provinsi-usaha").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten-usaha").select2({
    theme: "bootstrap-5",
});
$("#kecamatan-usaha").select2({
    theme: "bootstrap-5",
});
$("#kelurahan-usaha").select2({
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
$('#provinsi-usaha').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten-usaha').empty();
                    $('#kota-kabupaten-usaha').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten_usaha"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten-usaha').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten-usaha').empty();
        $('#kota-kabupaten-usaha').setAttr("disabled");
    }
});
$('#kota-kabupaten-usaha').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan-usaha').empty();
                    $('#kecamatan-usaha').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan_usaha"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan-usaha').empty();
                }
            }
        });
    }else{
        $('#kecamatan-usaha').empty();
        $('#kecamatan-usaha').setAttr("disabled");
    }
});
$('#kecamatan-usaha').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan-usaha').empty();
                    $('#kelurahan-usaha').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan_usaha"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan-usaha').empty();
                }
            }
        });
    }else{
        $('#kelurahan-usaha').empty();
        $('#kelurahan-usaha').setAttr("disabled");
    }
});


$("#tempat-lahir-pasangan").select2({
    theme: "bootstrap-5",
});
$("#agama-pasangan").select2({
    theme: "bootstrap-5",
});
$("#pendidikan-terakhir-pasangan").select2({
    theme: "bootstrap-5",
});
$("#provinsi-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$("#kota-kabupaten-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$("#kecamatan-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$("#kelurahan-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$("#jenis-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$("#komoditi-usaha-pasangan").select2({
    theme: "bootstrap-5",
});
$('#jenis-usaha-pasangan').on('change', function() {
    var usahaID = $(this).val();
    if(usahaID) {
        $.ajax({
            url: '/get-komoditi-usaha/'+usahaID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#komoditi-usaha-pasangan').empty();
                    $('#komoditi-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, komoditi){
                        $('select[name="komoditi_usaha_pasangan"]').append('<option value="'+ komoditi.id +'">' + komoditi.nama+ '</option>');
                    });
                }else{
                    $('#komoditi-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#komoditi-usaha-pasangan').empty();
        $('#komoditi-usaha-pasangan').setAttr("disabled");
    }
});
$('#provinsi-usaha-pasangan').on('change', function() {
    var provID = $(this).val();
    if(provID) {
        $.ajax({
            url: '/get-kota-kabupaten/'+provID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kota-kabupaten-usaha-pasangan').empty();
                    $('#kota-kabupaten-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kotaKab){
                        $('select[name="kota_kabupaten_usaha_pasangan"]').append('<option value="'+ kotaKab.id +'">' + kotaKab.nama_kota+ '</option>');
                    });
                }else{
                    $('#kota-kabupaten-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kota-kabupaten-usaha-pasangan').empty();
        $('#kota-kabupaten-usaha-pasangan').setAttr("disabled");
    }
});
$('#kota-kabupaten-usaha-pasangan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kecamatan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kecamatan-usaha-pasangan').empty();
                    $('#kecamatan-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kec){
                        $('select[name="kecamatan_usaha_pasangan"]').append('<option value="'+ kec.id +'">' + kec.nama_kecamatan+ '</option>');
                    });
                }else{
                    $('#kecamatan-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kecamatan-usaha-pasangan').empty();
        $('#kecamatan-usaha-pasangan').setAttr("disabled");
    }
});
$('#kecamatan-usaha-pasangan').on('change', function() {
    var kecID = $(this).val();
    if(kecID) {
        $.ajax({
            url: '/get-kelurahan/'+kecID,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data){
                if(data){
                    $('#kelurahan-usaha-pasangan').empty();
                    $('#kelurahan-usaha-pasangan').removeAttr("disabled");
                    $.each(data, function(key, kel){
                        $('select[name="kelurahan_usaha_pasangan"]').append('<option value="'+ kel.id +'">' + kel.nama_kelurahan+ '</option>');
                    });
                }else{
                    $('#kelurahan-usaha-pasangan').empty();
                }
            }
        });
    }else{
        $('#kelurahan-usaha-pasangan').empty();
        $('#kelurahan-usaha-pasangan').setAttr("disabled");
    }
});
</script>
@endpush
