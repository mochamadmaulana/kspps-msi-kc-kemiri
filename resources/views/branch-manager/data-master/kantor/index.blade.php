@extends('layout.branch_manager',['title_satu'=>'List','title_dua'=>'Kantor KC - '.Helpers::str_ucfirst($kantor->nama)])

@section('page-body')
<div class="row">
    <div class="col-md col-lg">
        <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (!empty($galeri_kantor->count()))
                @foreach ($galeri_kantor as $key => $gl)
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <img class="d-block w-100 rounded" alt="" src="{{ asset('storage/img/kantor/'.$kantor->uuid.'/'.$gl->hash) }}">
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
    <div class="col-md-6 col-lg-4 mt-3 mt-md-0">
        <div class="card">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-lg-5">Kode Kantor</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->kode }}</dd>
                    <dt class="col-lg-5">Nama Kantor</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->nama }}</dd>
                    <dt class="col-lg-5">Email</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->email }}</dd>
                    <dt class="col-lg-5">No. Tlp Kantor</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->nomor_telepone }}</dd>
                    <dt class="col-lg-5">Tgl. Didirikan</dt>
                    <dd class="col-lg-7 fst-italic">{{ date('d-M-Y',strtotime($kantor->tanggal_didirikan)) }}</dd>
                    <dt class="col-lg-5">Alamat</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->alamat ?? '...' }}</dd>
                    <dt class="col-lg-5">RT/RW</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->rt_rw ?? '...' }}</dd>
                    <dt class="col-lg-5">Provinsi</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->provinsi->nama_provinsi }}</dd>
                    <dt class="col-lg-5">Kota/Kabupaten</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->kota->nama_kota }}</dd>
                    <dt class="col-lg-5">Kecamatan</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->kecamatan->nama_kecamatan }}</dd>
                    <dt class="col-lg-5">Kelurahan</dt>
                    <dd class="col-lg-7 fst-italic">{{ $kantor->kelurahan->nama_kelurahan }}</dd>
                </dl>
                <a href="{{ route('branch-manager.data-master.kantor.galeri',$kantor->id) }}" class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                    Galeri
                </a>
                {{-- <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th class="col-lg-3">Kode Kantor</th>
                            <td class="col-lg">{{ $kantor->kode }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Nama Kantor</th>
                            <td>{{ $kantor->nama }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Email Kantor</th>
                            <td>{{ $kantor->email }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">No.Tlp Kantor</th>
                            <td>{{ $kantor->nomor_telepone }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Tgl. Didirikan</th>
                            <td>{{ date('d-M-Y',strtotime($kantor->tanggal_didirikan)) }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Alamat</th>
                            <td>{{ $kantor->alamat ?? '...' }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">RT/RW</th>
                            <td>{{ $kantor->rt_rw ?? '...' }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Provinsi</th>
                            <td>{{ $kantor->provinsi->nama_provinsi }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Kota/Kabupaten</th>
                            <td>{{ $kantor->kota->nama_kota }}</td>
                        </tr>
                        <tr>
                            <th class="col-lg-3">Kecamatan</th>
                            <td>{{ $kantor->kecamatan->nama_kecamatan }}</td>
                        </tr>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
