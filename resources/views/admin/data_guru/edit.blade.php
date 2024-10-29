@extends('layouts.backend.app', [
    'title' => 'Edit Data Guru',
    'contentTitle' => 'Edit Data Guru'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content')

<div class="">    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Box Data Guru</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.data_guru.update', $dataGuru->id) }}">
                @csrf
                @method('PUT') <!-- Tambahkan ini untuk menunjukkan bahwa ini adalah pembaruan -->
                
                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input value="{{ $dataGuru->nama }}" required type="text" name="nama" placeholder="Masukkan nama guru" class="form-control"> 
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input value="{{ $dataGuru->jabatan }}" required type="text" name="jabatan" placeholder="Masukkan jabatan" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <textarea required name="mata_pelajaran" placeholder="Masukkan mata pelajaran" class="form-control">{{ $dataGuru->mata_pelajaran }}</textarea>
                        </div>
                    </div>
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
