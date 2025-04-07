@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>

    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST') {{-- Ubah ke PUT kalau route-nya pakai PUT --}}

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($profile && $profile->foto)
                <img src="{{ asset($profile->foto) }}" width="100" class="mt-2">
            @else
                <img src="{{ asset('images/default.png') }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $profile->nama ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $profile->no_hp ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $profile->jurusan ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $profile->deskripsi ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

