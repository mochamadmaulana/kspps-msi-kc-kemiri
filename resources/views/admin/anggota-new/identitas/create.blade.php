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
                    <span class="list-group-item list-group-item-action active">
                        <span class="text-danger">*</span> IDENTITAS KTP/SIM
                    </span>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                        <span class="text-danger">*</span> ALAMAT IDENTITAS
                    </a>
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
        <form action="{{ route('admin.anggota.registrasi.identitas-store',$data_regist->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">IDENTITAS KTP/SIM</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Jenis Keanggotaan</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_keanggotaan" value="Majlis" class="form-selectgroup-input" @if(@old('jenis_keanggotaan') == 'Majlis') checked @endif checked>
                                    <span class="form-selectgroup-label">
                                        <span class="p-auto">Majlis</span>
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_keanggotaan" value="Umum" class="form-selectgroup-input" @if(@old('jenis_keanggotaan') == 'Umum') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <span class="p-auto">Umum</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Majlis</div>
                            <select name="majlis" class="form-select @error('majlis') is-invalid @enderror" id="majlis" data-placeholder="pilih majlis">
                                <option value=""></option>
                                @foreach ($majlis as $m)
                                <option value="{{ $m->id }}" @if(@old('majlis') == $m->id) selected @endif>{{ $m->kode }} {{ $m->nama }}</option>
                                @endforeach
                            </select>
                            @error('majlis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">
                                Jenis Identitas
                                <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pilih KTP atau SIM"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                            </label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_identitas" value="KTP" class="form-selectgroup-input" @if(@old('jenis_identitas') == 'KTP') checked @endif checked>
                                    <span class="form-selectgroup-label">
                                        <span class="p-auto">KTP</span>
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_identitas" value="SIM" class="form-selectgroup-input" @if(@old('jenis_identitas') == 'SIM') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <span class="p-auto">SIM</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">
                                No. Identitas
                                <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="NIK KTP atau No. SIM sesuai Jenis Identitas"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                            </div>
                            <input type="number" name="nomor_identitas" class="form-control @error('nomor_identitas') is-invalid @enderror" value="{{ @old('nomor_identitas') }}" placeholder="No. Identitas..">
                            @error('nomor_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">No. Kartu Keluarga</div>
                            <input type="number" name="nomor_kartu_keluarga" class="form-control @error('nomor_kartu_keluarga') is-invalid @enderror" value="{{ @old('nomor_kartu_keluarga') }}" placeholder="No. Kartu Keluarga..">
                            @error('nomor_kartu_keluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Nama Lengkap</div>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ @old('nama_lengkap') }}" placeholder="Nama Lengkap..">
                            @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label">Email</div>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email') }}" placeholder="Email..">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">No. Telepone</div>
                            <input type="number" name="nomor_telepone" class="form-control @error('nomor_telepone') is-invalid @enderror" value="{{ @old('nomor_telepone') }}" placeholder="No. Telepone..">
                            @error('nomor_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Tempat Lahir</div>
                            <select name="tempat_lahir" class="form-select @error('tempat_lahir') is-invalid @enderror" id="tempat-lahir" data-placeholder="pilih tempat lahir">
                                <option value=""></option>
                                @foreach ($tempat_lahir as $tl)
                                <option value="{{ $tl->id }}" @if(@old('tempat_lahir') == $tl->id) selected @endif>{{ $tl->nama_kota }}</option>
                                @endforeach
                            </select>
                            @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Tgl. Lahir</div>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ @old('tanggal_lahir') }}">
                            @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label required">Jenis Kelamin</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" class="form-selectgroup-input" @if(@old('jenis_kelamin') == 'Laki-Laki') checked @endif>
                                    <span class="form-selectgroup-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                        <span class="p-auto">Laki-Laki</span>
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-selectgroup-input" @if(@old('jenis_kelamin') == 'Perempuan') checked @endif checked>
                                    <span class="form-selectgroup-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                        <span class="p-auto">Perempuan</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Agama</div>
                            <select name="agama" class="form-select @error('agama') is-invalid @enderror" id="agama" data-placeholder="pilih agama">
                                <option value=""></option>
                                <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Islam</option>
                                <option value="Hindu" @if (@old('agama') == 'Hindu') selected @endif>Hindu</option>
                                <option value="Budha" @if (@old('agama') == 'Budha') selected @endif>Budha</option>
                                <option value="Protestan" @if (@old('agama') == 'Protestan') selected @endif>Protestan</option>
                                <option value="Katolik" @if (@old('agama') == 'Katolik') selected @endif>Katolik</option>
                                <option value="Khonghucu" @if (@old('agama') == 'Khonghucu') selected @endif>Khonghucu</option>
                            </select>
                            @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Status Pernikahan</div>
                            <select name="status_pernikahan" class="form-select @error('status_pernikahan') is-invalid @enderror" id="status-pernikahan" data-placeholder="pilih status pernikahan">
                                <option value=""></option>
                                <option value="Belum Menikah" @if (@old('status_pernikahan') == 'Belum Menikah') selected @endif>Belum Menikah</option>
                                <option value="Nikah" @if (@old('status_pernikahan') == 'Nikah') selected @endif>Nikah</option>
                                <option value="Cerai" @if (@old('status_pernikahan') == 'Cerai') selected @endif>Cerai</option>
                                <option value="Janda/Duda" @if (@old('status_pernikahan') == 'Janda/Duda') selected @endif>Janda/Duda</option>
                            </select>
                            @error('status_pernikahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Pendidikan Terakhir</div>
                            <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan-terakhir" data-placeholder="pilih pendidikan terakhir">
                                <option value=""></option>
                                <option value="Tidak Bersekolah" @if (@old('pendidikan_terakhir') == 'Tidak Bersekolah') selected @endif>Tidak Bersekolah</option>
                                <option value="SD" @if (@old('pendidikan_terakhir') == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if (@old('pendidikan_terakhir') == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if (@old('pendidikan_terakhir') == 'SMA') selected @endif>SMA</option>
                                <option value="D3" @if (@old('pendidikan_terakhir') == 'D3') selected @endif>Diploma 3</option>
                                <option value="Sarjana 1" @if (@old('pendidikan_terakhir') == 'Sarjana 1') selected @endif>Sarjana 1</option>
                                <option value="Sarjana 2" @if (@old('pendidikan_terakhir') == 'Sarjana 2') selected @endif>Sarjana 2</option>
                                <option value="Sarjana 3" @if (@old('pendidikan_terakhir') == 'Sarjana 3') selected @endif>Sarjana 3</option>
                            </select>
                            @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Nama Ibu Kandung</div>
                            <input type="text" name="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value="{{ @old('nama_ibu_kandung') }}" placeholder="Nama Ibu Kandung..">
                            @error('nama_ibu_kandung')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-label required">Jumlah Keluarga</div>
                            <input type="number" name="jumlah_keluarga" class="form-control @error('jumlah_keluarga') is-invalid @enderror" value="{{ @old('jumlah_keluarga') }}" placeholder="Jumlah Keluarga..">
                            @error('jumlah_keluarga')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
