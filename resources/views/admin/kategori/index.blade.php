
@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="container" style="padding: 40px 20px;">

    <h1>Data Kategori</h1>
    <p>Kelola kategori produk NARA CATERING.</p>

    @if(session('success'))
        <div style="background: #d1fae5; padding: 12px; margin: 15px 0; border-radius: 8px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kategori.create') }}"
       style="display: inline-block; background: #8b4513; color: white; padding: 10px 18px; border-radius: 6px; text-decoration: none; margin: 15px 0;">
        + Tambah Kategori
    </a>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f3e8dc;">
                    <th style="padding: 12px; text-align: left;">No</th>
                    <th style="padding: 12px; text-align: left;">Nama Kategori</th>
                    <th style="padding: 12px; text-align: left;">Deskripsi</th>
                    <th style="padding: 12px; text-align: left;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kategoris as $kategori)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">{{ $loop->iteration }}</td>
                        <td style="padding: 12px;">{{ $kategori->nama_kategori }}</td>
                        <td style="padding: 12px;">
                            {{ $kategori->deskripsi ?? '-' }}
                        </td>
                        <td style="padding: 12px; white-space: nowrap;">
                            <a href="{{ route('kategori.show', $kategori->id) }}">
                                Detail
                            </a>
                            |
                            <a href="{{ route('kategori.edit', $kategori->id) }}">
                                Edit
                            </a>
                            |
                            <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini? Produk dalam kategori ini juga akan terhapus.');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="color: red; border: none; background: none; cursor: pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 20px; text-align: center;">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
