@extends('layout.staff_lapangan',['title_dua'=>'Dashboard'])

@section('page-body')
<div class="row row-deck row-cards mb-3">
    <div class="col-md col-lg">
        <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (!empty($galeri_kantor->count()))
                @foreach ($galeri_kantor as $key => $gl)
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <img class="d-block w-100 rounded" alt="" src="{{ asset('storage/img/kantor/'.$uuid_kantor.'/'.$gl->hash) }}">
                </div>
                @endforeach
                @else
                <div class="carousel-item active">
                    <img class="d-block w-100 rounded" alt="" src="{{ asset('frontend/dist/photos') }}/book-on-the-grass.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded" alt="" src="{{ asset('frontend/dist/photos') }}/books-and-purple-flowers-on-a-wooden-stool-by-the-bed.jpg">
                </div>
                @endif
            </div>
            <a class="carousel-control-prev" href="#carousel-controls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-controls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <div class="col-12">
        <div class="row row-cards">
            <div class="col-sm-4 col-lg-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Total Anggota
                                </div>
                                <div class="text-muted">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-transfer-in" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 18v3h16v-14l-8 -4l-8 4v3" /><path d="M4 14h9" /><path d="M10 11l3 3l-3 3" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Total Piutang
                                </div>
                                <div class="text-muted">
                                    Rp. 0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" /><path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Total Asset
                                </div>
                                <div class="text-muted">
                                    Rp. 0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-6">
        <div class="card">
            <div class="card-header justify-content-center">
                <h3 class="card-title">VISI</h3>
            </div>
            <div class="card-body">
                <p><span class="ms-5"></span>Menjadi koperasi sebagai mitra yang amanah dalam mewujudkan harapan dan kesejahteraan anggotanya</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-6">
        <div class="card">
            <div class="card-header justify-content-center">
                <h3 class="card-title">MISI</h3>
            </div>
            <div class="card-body">
                <ol>
                    <li>Menciptakan kesejahteraan bagi para anggota yang berkesinambungan.</li>
                    <li>Berdaya guna sebagai mitra strategis dan terpercaya bagi anggota.</li>
                    <li>Berkontribusi dalam perkembangan perkoprasian di indonesia.</li>
                    <li>Koperasi dan unit usaha secara profesional dengan menerapkan prinsi <span class="fw-bold fst-italic">Good Corporate Governance</span>.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
