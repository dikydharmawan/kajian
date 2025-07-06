@extends('layouts.app')

@section('title', 'Edit Peserta Volunter')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Data Peserta</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.peserta.update', $peserta->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $peserta->nama) }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $peserta->nim) }}" required>
                            @error('nim')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" value="{{ old('prodi', $peserta->prodi) }}" required>
                            @error('prodi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="number" inputmode="numeric" pattern="[0-9]*" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}" required>
                            @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="divisi_id" class="form-label">Divisi</label>
                            <select class="form-select @error('divisi_id') is-invalid @enderror" id="divisi_id" name="divisi_id" required>
                                <option value="">-- Pilih Divisi --</option>
                                @foreach($divisis as $divisi)
                                    <option value="{{ $divisi->id }}" {{ old('divisi_id', $peserta->divisi_id) == $divisi->id ? 'selected' : '' }}>{{ $divisi->nama }}</option>
                                @endforeach
                            </select>
                            @error('divisi_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.divisi.peserta') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-main"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 