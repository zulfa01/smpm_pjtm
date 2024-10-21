@extends('layouts.backend.app', [
    'title' => 'Edit Data Galeri',
    'contentTitle' => 'Edit Data Galeri'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content')

<div class="">    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Box Data Galeri</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.galeri.update', $galeri->id) }}">
                @csrf
                @method('PUT') <!-- Menyertakan method PUT untuk update -->
                
                <div class="form-group">
                    <label for="judul">Judul Galeri</label>
                    <input value="{{ $galeri->judul }}" required="" type="text" name="judul" placeholder="Masukkan judul galeri" class="form-control"> 
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Galeri</label>
                    <textarea required="" name="deskripsi" placeholder="Masukkan deskripsi galeri" class="form-control">{{ $galeri->deskripsi }}</textarea>
                </div>
                
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="dropify form-control" data-height="190" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" data-default-file="{{ asset('uploads/galeri/' . $galeri->foto) }}">
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
