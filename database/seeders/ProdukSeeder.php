<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $nasiBox = Kategori::where('nama_kategori', 'Nasi Box')->first();
        $snackBox = Kategori::where('nama_kategori', 'Snack Box')->first();
        $prasmanan = Kategori::where('nama_kategori', 'Prasmanan')->first();
        $harian = Kategori::where('nama_kategori', 'Catering Harian')->first();

        $produks = [
            [
                'kategori_id' => $nasiBox->id,
                'nama_produk' => 'Nasi Box Ayam Bakar',
                'harga' => 25000,
                'deskripsi' => 'Nasi putih dengan ayam bakar, lalapan, sambal, dan kerupuk.',
                'stok' => 50,
            ],
            [
                'kategori_id' => $nasiBox->id,
                'nama_produk' => 'Nasi Box Ayam Geprek',
                'harga' => 22000,
                'deskripsi' => 'Nasi putih dengan ayam geprek, sambal, dan lalapan.',
                'stok' => 40,
            ],
            [
                'kategori_id' => $snackBox->id,
                'nama_produk' => 'Snack Box Premium',
                'harga' => 18000,
                'deskripsi' => 'Paket snack berisi aneka kue pilihan dan air mineral.',
                'stok' => 30,
            ],
            [
                'kategori_id' => $prasmanan->id,
                'nama_produk' => 'Paket Prasmanan Hemat',
                'harga' => 50000,
                'deskripsi' => 'Paket prasmanan dengan nasi, lauk, sayur, sambal, dan kerupuk per porsi.',
                'stok' => 100,
            ],
            [
                'kategori_id' => $harian->id,
                'nama_produk' => 'Paket Catering Harian',
                'harga' => 20000,
                'deskripsi' => 'Menu makanan harian dengan nasi, lauk, dan sayuran.',
                'stok' => 60,
            ],
        ];

        foreach ($produks as $produk) {
            Produk::updateOrCreate(
                ['nama_produk' => $produk['nama_produk']],
                [
                    'kategori_id' => $produk['kategori_id'],
                    'harga' => $produk['harga'],
                    'deskripsi' => $produk['deskripsi'],
                    'stok' => $produk['stok'],
                ]
            );
        }
    }
}
