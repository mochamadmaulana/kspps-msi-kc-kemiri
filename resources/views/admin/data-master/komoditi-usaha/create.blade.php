@extends('layout.admin',['title_satu'=>'Form Tambah','title_dua'=>'Komoditi Usaha'])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('admin.data-master.komoditi-usaha.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('admin.data-master.komoditi-usaha.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<form action="{{ route('admin.data-master.komoditi-usaha.store') }}" method="POST" class="card">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Jenis Usaha</div>
                <select name="jenis_usaha" class="form-select @error('jenis_usaha') is-invalid @enderror" id="jenis-usaha" data-placeholder="pilih jenis usaha">
                    <option value=""></option>
                    @foreach ($jenis_usaha as $ju)
                    <option value="{{ $ju->id }}" @if(@old('jenis_usaha') == $ju->id) selected @endif>{{ $ju->nama }} ({{ $ju->kode }})</option>
                    @endforeach
                </select>
                @error('jenis_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4 mb-3">
                <div class="form-label required">Komoditi</div>
                <input type="text" name="komoditi" class="form-control @error('komoditi') is-invalid @enderror" value="{{ @old('komoditi') }}" placeholder="Komoditi..">
                @error('komoditi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
            Simpan
        </button>
    </div>
</form>
@endsection

@push('js')
<script>
$("#jenis-usaha").select2({
    theme: "bootstrap-5",
});
</script>
@endpush
