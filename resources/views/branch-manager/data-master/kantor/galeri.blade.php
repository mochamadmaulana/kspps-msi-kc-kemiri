@extends('layout.branch_manager',['title_dua'=>'Galeri Kantor KC - '.$kantor->nama])

@push('btn-page-header')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ route('branch-manager.data-master.kantor.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
            Kembali
        </a>
        <a href="{{ route('branch-manager.data-master.kantor.index') }}" class="btn btn-secondary d-sm-none btn-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" /></svg>
        </a>
    </div>
</div>
@endpush

@section('page-body')
<div class="row row-cards mt-2">
    @if ($kantor->galeri_kantor->count() == 0)
    <h3 class="text-center text-muted fst-italic">
        Galeri kosong !..
    </h3>
    @endif
    @foreach ($kantor->galeri_kantor as $gk)
    <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
            <a href="{{ asset('storage/img/kantor/'.$kantor->uuid.'/'.$gk->hash) }}" target="_blank" class="d-block"><img src="{{ asset('storage/img/kantor/'.$kantor->uuid.'/'.$gk->hash) }}" class="card-img-top"></a>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <div>{{ $gk->original }}</div>
                        <div class="text-muted">Galeri : {{ \Carbon\Carbon::parse($gk->created_at)->diffForhumans() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
