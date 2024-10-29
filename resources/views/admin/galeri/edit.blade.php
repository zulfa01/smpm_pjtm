@extends('layouts.backend.app', [
    'title' => 'Edit Galeri',
    'contentTitle' => 'Edit Galeri'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content')

<div class="">    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Galeri</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.galeri.update', $galeri->id) }}">
                @csrf
                @method('PUT') <!-- Tambahkan ini untuk menunjukkan bahwa ini adalah pembaruan -->
                
                <div class="form-group">
                    <label for="judul">Judul Galeri</label>
                    <input value="{{ $galeri->judul }}" required type="text" name="judul" placeholder="Masukkan judul galeri" class="form-control"> 
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="dropify form-control" data-height="190" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif">
                    <small class="form-text text-muted">* Kosongkan jika tidak ingin mengganti foto</small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('js')
<script type="text/javascript" src="{{ asset('plugins/dropify') }}/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $('.dropify').dropify({
        messages: {
            default: 'Drag atau Drop untuk memilih gambar',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });
</script>
@endpush
