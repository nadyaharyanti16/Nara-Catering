<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukPublikController extends Controller
{
    // Menampilkan daftar produk untuk pelanggan
    public function index(Request $request)
    {
        $query = Produk::with('kategori')
            ->where('stok', '>', 0);

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // Pencarian produk
        if ($request->filled('cari')) {
            $query->where('nama_produk', 'like', '%' . $request->cari . '%');
        }

        $produks = $query->latest()->paginate(12);

        $kategoris = Kategori::all();

        return view('publik.produk.index', compact(
            'produks',
            'kategoris'
        ));
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Produk::with('kategori')
            ->where('stok', '>', 0)
            ->findOrFail($id);

        return view('publik.produk.show', compact('produk'));
    }
}
