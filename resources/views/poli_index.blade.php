@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Daftar Poli</h5>
        <div class="card-body">
            <a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>

            @if(session('pesan'))
                <div class="alert alert-success">{{ session('pesan') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Poli</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($polis as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ number_format($p->biaya, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('poli.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('poli.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($polis->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
