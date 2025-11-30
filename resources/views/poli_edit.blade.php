@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header">Edit Poli</h5>
        <div class="card-body">
            <form action="{{ route('poli.update', $poli->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Poli</label>
                    <input type="text" name="nama" value="{{ old('nama', $poli->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Biaya</label>
                    <input type="number" name="biaya" value="{{ old('biaya', $poli->biaya) }}" class="form-control @error('biaya') is-invalid @enderror" required>
                    @error('biaya')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-success">Update</button>
                <a href="{{ route('poli.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
