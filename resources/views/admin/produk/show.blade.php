
@extends('layouts.app')

@section('title', 'Detail Produk | NARA CATERING')

@section('content')

<div class="container" style="padding:40px 0;">

    <h1 style="font-family:'Playfair Display',serif; margin-bottom:25px;">
        Detail Produk
    </h1>

    <div style="background:white; padding:25px; border-radius:12px; max-width:750px;">

        @if($produk->gambar)
            <img src="{{ asset('storage/'.$produk->gambar) }}"
                 alt="{{ $produk->nama_produk }}"
                 style="width:100%; max-width:400px; height:250px; object-fit:cover; border-radius:12px; margin-bottom:20px;">
        @endif

        <h2>{{ $produk->nama_produk }}</h2>

        <p style="margin-top:12px;">
            <strong>Kategori:</strong>
            {{ $produk->kategori->nama_kategori ?? '-' }}
        </p>

        <p style="margin-top:12px;">
            <strong>Harga:</strong>
            Rp {{ number_format($produk->harga, 0, ',', '.') }}
        </p>

        <p style="margin-top:12px;">
            <strong>Stok:</strong> {{ $produk->stok }}
        </p>

        <p style="margin-top:12px;">
            <strong>Deskripsi:</strong><br>
            {{ $produk->deskripsi ?? '-' }}
        </p>

        <div style="margin-top:25px;">
            <a href="{{ route('produk.edit', $produk->id) }}" class="btn">
                Edit Produk
            </a>

            <a href="{{ route('produk.index') }}"
               style="margin-left:12px; color:#A65F3F; text-decoration:none;">
                Kembali
            </a>
        </div>

    </div>

</div>

@endsection
