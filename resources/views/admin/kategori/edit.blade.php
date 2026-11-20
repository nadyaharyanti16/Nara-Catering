
@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container" style="max-width: 700px; padding: 40px 20px;">

    <h1>Edit Kategori</h1>
    <p>Ubah informasi kategori produk NARA CATERING.</p>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="nama_kategori" style="display: block; margin-bottom: 8px;">
                Nama Kategori
            </label>

            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                required
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px;"
            >

            @error('nama_kategori')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="deskripsi" style="display: block; margin-bottom: 8px;">
                Deskripsi Kategori
            </label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="5"
                style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px;"
            >{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

            @error('deskripsi')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button
            type="submit"
            style="background: #8b4513; color: white; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer;"
        >
            Update Kategori
        </button>

        <a
            href="{{ route('kategori.index') }}"
            style="margin-left: 10px; color: #8b4513; text-decoration: none;"
        >
            Kembali
        </a>

    </form>
</div>
@endsection
