@extends('layouts.backend.app', [
    'title' => 'Manage Galeri',
    'contentTitle' => 'Manage Galeri',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-sm">Tambah Galeri</a>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $no = 1;
                        @endphp

                        @foreach($galeri as $item) <!-- Changed variable to $item for clarity -->
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->judul }}</td> <!-- Use $item instead of $galeri -->
                            <td><img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" width="100"></td> <!-- Use $item instead of $galeri -->
                            <td>
                                <div class="row ml-2">
                                    <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                                    
                                    <form method="POST" action="{{ route('admin.galeri.destroy', $item->id) }}" style="display:inline;"> <!-- Added style for inline display -->
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus ?')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash fa-fw"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Reset the form after submission
    document.getElementById('uploadForm').onsubmit = function() {
        // Prevent the default action to reset form
        setTimeout(() => {
            this.reset();
        }, 1000); // Reset after 1 second, adjust as needed
    };
</script>

@stop

@push('js')
<!-- DataTables -->
<script src="{{ asset('templates/backend/AdminLTE-3.0.1/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.0.1/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#dataTable1").DataTable();
  });
</script>
@endpush