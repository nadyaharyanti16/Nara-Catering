<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Menampilkan semua produk di halaman admin
    public function index()
    {
        $produks = Produk::with('kategori')
            ->latest()
            ->paginate(10);

        return view('admin.produk.index', compact('produks'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.produk.create', compact('kategoris'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('produk', 'public');
        }

        Produk::create($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan detail produk di halaman admin
    public function show(Produk $produk)
    {
        $produk->load('kategori');

        return view('admin.produk.show', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();

        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    // Memperbarui data produk
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                ->store('produk', 'public');
        }

        $produk->update($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
