
@extends('layouts.app')

@section('title', 'Kelola Produk | NARA CATERING')

@section('content')

<div class="container" style="padding-top:40px; padding-bottom:40px;">

    <h1 style="font-family:'Playfair Display',serif;">Kelola Produk</h1>
    <p style="color:#887568; margin:10px 0 25px;">
        Kelola daftar menu NARA CATERING.
    </p>

    @if(session('success'))
        <div style="background:#E5F4E7; color:#246B35; padding:14px; border-radius:8px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produk.create') }}" class="btn">
        + Tambah Produk
    </a>

    <div style="overflow-x:auto; margin-top:25px; background:white; border-radius:12px; padding:20px;">

        <table style="width:100%; border-collapse:collapse; min-width:700px;">
            <thead>
                <tr style="background:#F0E4D5; text-align:left;">
                    <th style="padding:13px;">Foto</th>
                    <th style="padding:13px;">Nama Produk</th>
                    <th style="padding:13px;">Kategori</th>
                    <th style="padding:13px;">Harga</th>
                    <th style="padding:13px;">Stok</th>
                    <th style="padding:13px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produks as $produk)
                    <tr style="border-bottom:1px solid #EFE5DC;">
                        <td style="padding:12px;">
                            @if($produk->gambar)
                                <img src="{{ asset('storage/'.$produk->gambar) }}"
                                     width="65" height="55"
                                     style="object-fit:cover; border-radius:8px;">
                            @else
                                Belum ada foto
                            @endif
                        </td>

                        <td style="padding:12px;">
                            {{ $produk->nama_produk }}
                        </td>

                        <td style="padding:12px;">
                            {{ $produk->kategori->nama_kategori ?? '-' }}
                        </td>

                        <td style="padding:12px;">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>

                        <td style="padding:12px;">
                            {{ $produk->stok }}
                        </td>

                        <td style="padding:12px;">
                            <a href="{{ route('produk.show', $produk->id) }}">Detail</a>
                            |
                            <a href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                            |
                            <form action="{{ route('produk.destroy', $produk->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="border:none; background:none; color:red; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:25px; text-align:center;">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:20px;">
            {{ $produks->links() }}
        </div>
    </div>

</div>

@endsection
