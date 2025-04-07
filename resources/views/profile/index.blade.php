@extends('layouts.app')

@section('content')
<div class="container">
    @if($profile)
        <div class="card" style="width: 18rem;">
            @if($profile->foto)
                <img src="{{ asset($profile->foto) }}" class="card-img-top" alt="Foto Profil">
            @else
                <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $profile->nama }}</h5>
                <p class="card-text">No HP: {{ $profile->no_hp }}</p>
                <p class="card-text">Jurusan: {{ $profile->jurusan }}</p>
                <p class="card-text">{{ $profile->deskripsi }}</p>

                {{-- ✅ Perbaiki di sini: kirim ID ke route edit --}}
                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary">Edit Profil</a>

                {{-- ✅ Tambahkan tombol hapus jika ingin delete --}}
                <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin mau hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    @else
        <p>Belum ada data profil. Silakan <a href="{{ route('profile.create') }}">isi di sini</a>.</p>
    @endif
</div>
@endsection


