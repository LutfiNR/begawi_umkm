<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Jangan lupa tambahkan ini

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function index(): View
    {
        // --- Persiapan Data ---
        $produkPopuler = [
            (object) ['nama' => 'Produk Populer A', 'harga' => 'Rp 100.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer B', 'harga' => 'Rp 120.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer C', 'harga' => 'Rp 80.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer D', 'harga' => 'Rp 150.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer A', 'harga' => 'Rp 100.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer B', 'harga' => 'Rp 120.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer C', 'harga' => 'Rp 80.000', 'gambar' => '/assets/Sneaker.png'],
            (object) ['nama' => 'Produk Populer D', 'harga' => 'Rp 150.000', 'gambar' => '/assets/Sneaker.png'],
        ];

        $nomorWA = '6281234567890';

        $pesanOtomatis = urlencode("Halo, saya tertarik dengan produk Anda yang ada di website.");

        $linkWA = "https://wa.me/{$nomorWA}?text={$pesanOtomatis}";

        return view('home', compact('produkPopuler', 'linkWA'));
    }
}