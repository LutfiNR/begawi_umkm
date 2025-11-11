<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman katalog (semua produk & unggulan).
     */
    public function index(): View
    {
        $semuaProduk = $this->getSemuaProduk();

        // Ambil produk yang ditandai 'unggulan'
        $produkUnggulan = array_filter($semuaProduk, function ($produk) {
            return $produk['unggulan'] ?? false;
        });
        
        // Siapkan link WA (asumsi dari layout)
        $linkWA = $this->getLinkWA();

        return view('product', [
            'produkUnggulan' => (object) $produkUnggulan,
            'semuaProduk' => (object) $semuaProduk,
            'linkWA' => $linkWA
        ]);
    }

    /**
     * Menampilkan halaman detail satu produk.
     */
    public function show(string $id): View
    {
        $produk = $this->findProdukById($id);

        if (!$produk) {
            abort(404); // Tampilkan 404 jika produk tidak ada
        }
        
        // Siapkan link WA (asumsi dari layout)
        $linkWA = $this->getLinkWA();

        return view('product-detail', [
            'produk' => (object) $produk,
            'linkWA' => $linkWA
        ]);
    }

    // --- DATABASE TIRUAN ---

    /**
     * Helper untuk mencari produk berdasarkan ID.
     */
    private function findProdukById(string $id): ?array
    {
        return Arr::first($this->getSemuaProduk(), function ($produk) use ($id) {
            return $produk['id'] == $id;
        });
    }

    /**
     * Helper untuk Link WA (agar konsisten).
     */
    private function getLinkWA(string $pesan = "Halo, saya tertarik dengan produk Anda."): string
    {
        $nomorWA = '6281234567890'; // Ganti dengan nomor Anda
        $pesanOtomatis = urlencode($pesan);
        return "https://wa.me/{$nomorWA}?text={$pesanOtomatis}";
    }

    /**
     * Data master semua produk (database tiruan).
     */
    private function getSemuaProduk(): array
    {
        return [
            1 => [
                'id' => 1,
                'nama' => 'Sneaker Putih "The Cloud"',
                'harga' => 'Rp 450.000',
                'gambar' => '/assets/produk/sneaker1-main.jpg',
                'href' => '/product/1', // Link ke detail
                'unggulan' => true,
                'diskon'=> 10,
                'label' => 'Best Seller',
                'label_color' => 'bg-accent text-dark',
                'stok' => 120,
                'deskripsi' => '<p>Rasakan kenyamanan berjalan di atas awan dengan "The Cloud". Didesain untuk kenyamanan maksimal dengan sol empuk dan bahan breathable mesh.</p><p>Cocok untuk gaya kasual sehari-hari, gym, atau lari pagi.</p>',
                'galeri_gambar' => [
                    '/assets/produk/sneaker1-main.jpg',
                    '/assets/produk/sneaker1-2.jpg',
                    '/assets/produk/sneaker1-3.jpg',
                ]
            ],
            2 => [
                'id' => 2,
                'nama' => 'High-Top "Urban Retro"',
                'harga' => 'Rp 520.000',
                'gambar' => '/assets/produk/sneaker2-main.jpg',
                'href' => '/product/2',
                'unggulan' => true,
                'diskon'=> 20,
                'label' => 'Diskon 10%',
                'label_color' => 'bg-red-500 text-white',
                'stok' => 85,
                'deskripsi' => '<p>Gaya klasik 90-an kembali dengan "Urban Retro". Bahan kulit sintetis premium dengan aksen suede. Tampil beda dan klasik.</p>',
                'galeri_gambar' => [
                    '/assets/produk/sneaker2-main.jpg',
                    '/assets/produk/sneaker2-2.jpg',
                ]
            ],
            3 => [
                'id' => 3,
                'nama' => 'Running "Velocity"',
                'harga' => 'Rp 380.000',
                'gambar' => '/assets/produk/sneaker3-main.jpg',
                'href' => '/product/3',
                'unggulan' => false,
                'diskon'=> null,
                'stok' => 150,
                'deskripsi' => '<p>Didesain untuk kecepatan. "Velocity" sangat ringan dan responsif, membantu Anda mencapai performa lari terbaik.</p>',
                'galeri_gambar' => [
                    '/assets/produk/sneaker3-main.jpg',
                ]
            ],
        ];
    }
}