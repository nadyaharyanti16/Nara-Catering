
@extends('layouts.app')

@section('title', 'NARA CATERING | Rasa Lezat, Penuh Cerita')

@section('content')

<style>
    .hero {
        padding: 75px 7%;
        background: #F0E4D5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 35px;
    }

    .hero-content {
        max-width: 650px;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(35px, 5vw, 55px);
        line-height: 1.2;
        color: #633F2D;
        margin-bottom: 20px;
    }

    .hero p {
        line-height: 1.8;
        color: #765C4B;
        margin-bottom: 25px;
    }

    .hero-label {
        color: #A65F3F;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero-icon {
        font-size: 130px;
        text-align: center;
        min-width: 200px;
    }

    .section {
        padding: 55px 0;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: #633F2D;
        margin-bottom: 10px;
    }

    .section-desc {
        color: #887568;
        margin-bottom: 25px;
    }

    .category-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 35px;
    }

    .category-item {
        padding: 10px 20px;
        border: 1px solid #D8C3B2;
        border-radius: 30px;
        text-decoration: none;
        color: #684733;
        background: white;
        font-size: 14px;
    }

    .category-item.active,
    .category-item:hover {
        background: #A65F3F;
        color: white;
        border-color: #A65F3F;
    }

    .search-form {
        display: flex;
        gap: 10px;
        margin-bottom: 30px;
        max-width: 500px;
    }

    .search-form input {
        flex: 1;
        min-width: 0;
        padding: 12px 15px;
        border: 1px solid #D8C3B2;
        border-radius: 8px;
        font: inherit;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .product-card {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid #EFE5DC;
        transition: 0.2s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px #49352B15;
    }

    .product-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        background: #EDE3D8;
    }

    .product-info {
        padding: 20px;
    }

    .product-category {
        color: #A65F3F;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .product-info h3 {
        margin: 10px 0;
        color: #49352B;
    }

    .product-info p {
        color: #887568;
        font-size: 14px;
        line-height: 1.6;
        min-height: 45px;
    }

    .product-price {
        color: #A65F3F;
        font-size: 18px;
        font-weight: 700;
        margin: 15px 0;
    }

    .empty {
        padding: 40px;
        background: white;
        border-radius: 12px;
        text-align: center;
        color: #887568;
    }

    @media(max-width: 800px) {
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .hero-icon {
            display: none;
        }
    }

    @media(max-width: 550px) {
        .hero {
            padding: 50px 6%;
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .search-form {
            flex-wrap: wrap;
        }
    }
</style>

<section class="hero">
    <div class="hero-content">
        <div class="hero-label">SELAMAT DATANG DI NARA CATERING</div>

        <h1>Rasa Lezat,<br>Penuh Cerita.</h1>

        <p>
            Hadirkan kelezatan di setiap momen istimewa.
            NARA CATERING menyediakan berbagai pilihan
            hidangan berkualitas untuk acara keluarga,
            pernikahan, rapat, dan berbagai kebutuhan lainnya.
        </p>

        <a href="#menu" class="btn">Jelajahi Menu Kami</a>
    </div>

    <div class="hero-icon">🍽️</div>
</section>

<div class="container">

    <section class="section">
        <h2 class="section-title">Tentang NARA CATERING</h2>

        <p class="section-desc">
            NARA CATERING merupakan UMKM di bidang penyediaan
            makanan dan jasa catering yang berlokasi di Lampung.
            Kami mengutamakan kualitas bahan, kebersihan,
            cita rasa, dan pelayanan untuk menemani setiap
            momen istimewa pelanggan.
        </p>
    </section>

    <section class="section" id="menu">
        <h2 class="section-title">Pilihan Menu Kami</h2>

        <p class="section-desc">
            Temukan hidangan favorit untuk berbagai kebutuhan acara.
        </p>

        <div class="category-list">
            <a href="{{ route('menu.index') }}"
               class="category-item {{ !request('kategori') ? 'active' : '' }}">
                Semua Menu
            </a>

            @foreach($kategoris as $kategori)
                <a href="{{ route('menu.index', ['kategori' => $kategori->id]) }}"
                   class="category-item {{ request('kategori') == $kategori->id ? 'active' : '' }}">
                    {{ $kategori->nama_kategori }}
                </a>
            @endforeach
        </div>

        <form action="{{ route('menu.index') }}" method="GET" class="search-form">
            @if(request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            @endif

            <input
                type="text"
                name="cari"
                placeholder="Cari nama menu..."
                value="{{ request('cari') }}"
            >

            <button type="submit" class="btn">Cari</button>
        </form>

        <div class="product-grid">
            @forelse($produks as $produk)
                <div class="product-card">

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

                    <div class="product-info">
                        <span class="product-category">
                            {{ $produk->kategori->nama_kategori ?? 'Menu' }}
                        </span>

                        <h3>{{ $produk->nama_produk }}</h3>

                        <p>
                            {{ Str::limit($produk->deskripsi ?? 'Hidangan lezat dari NARA CATERING.', 75) }}
                        </p>

                        <div class="product-price">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </div>

                        <a href="{{ route('menu.show', $produk->id) }}"
                           class="btn">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty">
                    <h3>Menu belum tersedia</h3>
                    <p>Silakan kembali lagi nanti untuk melihat pilihan menu kami.</p>
                </div>
            @endforelse
        </div>

        <div style="margin-top:30px;">
            {{ $produks->links() }}
        </div>

    </section>
</div>

@endsection
