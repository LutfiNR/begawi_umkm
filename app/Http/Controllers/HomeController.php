<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function index(): View
    {
        // Produk Populer dengan struktur yang sama seperti ProductController
        $produkPopuler = [
            [
                'id' => 1,
                'nama' => "Sneaker Populer 1",
                'harga' => 350000,
                'gambar' => '/assets/Sneaker.png',
                'unggulan' => true,
                'diskon' => '10',
                'label' => 'Best Seller',
                'label_color' => 'bg-accent text-dark',
                'stok' => 60,
                'deskripsi' => "<p>Deskripsi Sneaker Populer 1. Nyaman dan stylish.</p>",
                'galeri_gambar' => [
                    '/assets/Sneaker.png',
                    '/assets/Sneaker.png',
                ],
            ],
            [
                'id' => 2,
                'nama' => "Sneaker Populer 2",
                'harga' => 375000,
                'gambar' => '/assets/Sneaker.png',
                'unggulan' => false,
                'diskon' => null,
                'label' => null,
                'label_color' => null,
                'stok' => 55,
                'deskripsi' => "<p>Deskripsi Sneaker Populer 2. Cocok untuk aktivitas outdoor.</p>",
                'galeri_gambar' => [
                    '/assets/Sneaker.png',
                    '/assets/Sneaker.png',
                ],
            ],
            [
                'id' => 3,
                'nama' => "Sneaker Populer 3",
                'harga' => 390000,
                'gambar' => '/assets/Sneaker.png',
                'unggulan' => true,
                'diskon' => '15',
                'label' => 'Diskon',
                'label_color' => 'bg-red-500 text-white',
                'stok' => 70,
                'deskripsi' => "<p>Deskripsi Sneaker Populer 3. Ringan dan empuk.</p>",
                'galeri_gambar' => [
                    '/assets/Sneaker.png',
                    '/assets/Sneaker.png',
                ],
            ],
            [
                'id' => 4,
                'nama' => "Sneaker Populer 4",
                'harga' => 420000,
                'gambar' => '/assets/Sneaker.png',
                'unggulan' => false,
                'diskon' => null,
                'label' => null,
                'label_color' => null,
                'stok' => 52,
                'deskripsi' => "<p>Deskripsi Sneaker Populer 4. Desain modern dan elegan.</p>",
                'galeri_gambar' => [
                    '/assets/Sneaker.png',
                    '/assets/Sneaker.png',
                ],
            ],
        ];

        // Link WA
        $nomorWA = '6281234567890';
        $pesanOtomatis = urlencode("Halo, saya tertarik dengan produk Anda yang ada di website.");
        $linkWA = "https://wa.me/{$nomorWA}?text={$pesanOtomatis}";

        return view('home', compact('produkPopuler', 'linkWA'));
    }
}
