@extends('layout.admin',['title_dua'=>'Galeri Kantor KC - '.$kantor->nama])

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
<div class="mb-3">
    <button type="button" class="btn btn-warning" onclick="loadUploadGaleriModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
        Galeri
    </button>
</div>
@if ($kantor->galeri_kantor->count() == 0)
<h3 class="text-center text-muted fst-italic">
    Galeri kosong !..
</h3>
@endif
<div class="row row-cards">
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
                    <div class="ms-auto col-lg-3">
                        <a href="javascript:void(0)" class="ms-3 text-red delete-galeri" data-id="{{ $gk->id }}">
                        {{-- <a href="#" class="ms-3 btn btn-red"> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('modal')
<!-- Modal Upload Galeri -->
<div class="modal modal-blur fade" id="modal-upload-galeri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Galeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.data-master.kantor.galeri.upload',$kantor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-label required">
                        Foto Galeri
                        <span class="text-yellow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title=".jpg .jpeg .png | max 15360kb"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor" /></svg></span>
                    </div>
                    <input type="file" name="foto_galeri" class="form-control @error('foto_galeri') is-invalid @enderror" />
                    @error('foto_galeri')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link text-red" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
function loadUploadGaleriModal() {
    $('#modal-upload-galeri').modal('show');
}
$('.delete-galeri').click(function(){
    var id = $(this).data('id')
    $.ajax({
        url: '{{ url('admin/data-master/kantor') }}/' + id + '/delete-galeri',
        type: 'delete',
        data : {"_token":"{{ csrf_token() }}"},
        success: function(response){
            //hide modal
            //show success message
            if(response.success){
                location.reload();
            }
        },
        error: function (error) {
            // Error logic goes here..!
            if(!response.success){
                location.reload();
            }
        }
    });
})
</script>
@endpush
