
@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container" style="max-width: 700px; padding: 40px 20px;">

    <h1>Detail Kategori</h1>
    <p>Informasi kategori produk NARA CATERING.</p>

    <div style="background: #fdf8f3; padding: 25px; border-radius: 10px; margin-top: 20px;">

        <div style="margin-bottom: 20px;">
            <strong>Nama Kategori</strong>
            <p>{{ $kategori->nama_kategori }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <strong>Deskripsi</strong>
            <p>{{ $kategori->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <strong>Jumlah Produk</strong>
            <p>{{ $kategori->produks->count() }} produk</p>
        </div>

        <div style="margin-bottom: 20px;">
            <strong>Dibuat Pada</strong>
            <p>{{ $kategori->created_at->format('d-m-Y H:i') }}</p>
        </div>

    </div>

    <div style="margin-top: 20px;">

        <a
            href="{{ route('kategori.edit', $kategori->id) }}"
            style="display: inline-block; background: #8b4513; color: white; padding: 10px 18px; border-radius: 6px; text-decoration: none;"
        >
            Edit Kategori
        </a>

        <a
            href="{{ route('kategori.index') }}"
            style="display: inline-block; margin-left: 10px; color: #8b4513; text-decoration: none;"
        >
            Kembali
        </a>

    </div>

</div>
@endsection
