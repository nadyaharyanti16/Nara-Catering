<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Nasi Box',
                'deskripsi' => 'Pilihan paket nasi lengkap untuk berbagai acara.',
            ],
            [
                'nama_kategori' => 'Snack Box',
                'deskripsi' => 'Aneka makanan ringan untuk rapat dan acara.',
            ],
            [
                'nama_kategori' => 'Prasmanan',
                'deskripsi' => 'Paket hidangan prasmanan untuk acara spesial.',
            ],
            [
                'nama_kategori' => 'Catering Harian',
                'deskripsi' => 'Menu makanan untuk kebutuhan sehari-hari.',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::updateOrCreate(
                ['nama_kategori' => $kategori['nama_kategori']],
                ['deskripsi' => $kategori['deskripsi']]
            );
        }
    }
}
