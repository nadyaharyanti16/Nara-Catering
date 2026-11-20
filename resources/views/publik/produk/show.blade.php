
@extends('layouts.app')

@section('title', $produk->nama_produk . ' | NARA CATERING')

@section('content')

<style>
    .detail-wrapper {
        max-width: 1100px;
        margin: 55px auto;
        padding: 0 25px;
    }

    .breadcrumb {
        margin-bottom: 25px;
        color: #887568;
        font-size: 14px;
    }

    .breadcrumb a {
        color: #A65F3F;
        text-decoration: none;
    }

    .detail-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 45px;
        background: white;
        padding: 30px;
        border-radius: 18px;
        border: 1px solid #EFE5DC;
    }

    .detail-image img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 13px;
        background: #F0E4D5;
    }

    .detail-info {
        padding: 15px 0;
    }

    .detail-category {
        display: inline-block;
        background: #F4E6DA;
        color: #A65F3F;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
    }

    .detail-info h1 {
        font-family: 'Playfair Display', serif;
        font-size: 35px;
        color: #633F2D;
        margin: 20px 0;
    }

    .detail-price {
        font-size: 27px;
        font-weight: 700;
        color: #A65F3F;
        margin-bottom: 25px;
    }

    .detail-description {
        line-height: 1.8;
        color: #765C4B;
        margin-bottom: 25px;
    }

    .detail-stock {
        background: #FAF7F2;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 25px;
        color: #684733;
    }

    .back-button {
        display: inline-block;
        margin-top: 25px;
        color: #A65F3F;
        text-decoration: none;
        font-weight: 600;
    }

    @media(max-width: 750px) {
        .detail-card {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 18px;
        }

        .detail-image img {
            height: 280px;
        }

        .detail-info h1 {
            font-size: 28px;
        }
    }
</style>

<div class="detail-wrapper">

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        /
        <a href="{{ route('menu.index') }}">Menu</a>
        /
        {{ $produk->nama_produk }}
    </div>

    <div class="detail-card">

        <div class="detail-image">
            @if($produk->gambar)
                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    alt="{{ $produk->nama_produk }}"
                >
            @else
                <img
                    src="https://placehold.co/600x400/F0E4D5/75452F?text=NARA+CATERING"
                    alt="Foto produk belum tersedia"
                >
            @endif
        </div>

        <div class="detail-info">

            <span class="detail-category">
                {{ $produk->kategori->nama_kategori ?? 'Menu' }}
            </span>

            <h1>{{ $produk->nama_produk }}</h1>

            <div class="detail-price">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </div>

            <h3 style="margin-bottom:10px;">Deskripsi Produk</h3>

            <p class="detail-description">
                {{ $produk->deskripsi ?? 'Hidangan lezat yang disiapkan dengan bahan berkualitas dari NARA CATERING.' }}
            </p>

            <div class="detail-stock">
                <strong>Ketersediaan:</strong>
                {{ $produk->stok > 0 ? 'Tersedia' : 'Stok habis' }}
                <br>
                <strong>Stok:</strong>
                {{ $produk->stok }}
            </div>

            <a href="{{ route('menu.index') }}" class="btn">
                Kembali ke Menu
            </a>

        </div>

    </div>

</div>

@endsection
