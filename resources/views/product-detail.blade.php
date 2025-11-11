<x-layout :linkWA="$linkWA">

    <x-slot:title>
        Sneaky | {{ $produk->nama }}
    </x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">

            {{-- Galeri Gambar Produk --}}
            <div class="w-full">
                {{-- Gambar Utama --}}
                <img src="{{ $produk->galeri_gambar[0] }}" alt="{{ $produk->nama }}"
                    class="bg-primary w-full h-auto md:h-[500px] object-cover rounded-lg shadow-lg">

                {{-- Thumbnail (jika ada lebih dari 1 gambar) --}}
                @if(count($produk->galeri_gambar) > 1)
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        @foreach($produk->galeri_gambar as $gambar)
                            <img src="{{ $gambar }}" alt="thumbnail"
                                class="bg-primary h-24 w-full object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-primary">
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Info Produk & Tombol Aksi --}}
            <div class="w-full">
                <h1 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-3">
                    {{ $produk->nama }}
                </h1>

                <p class="text-3xl font-bold text-primary dark:text-primary-light mb-6">
                    Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                {{-- Stok Produk --}}
                <div class="mb-6">
                    @if($produk->stok > 0)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Stok Tersedia: {{ $produk->stok }}
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            Stok Habis
                        </span>
                    @endif
                </div>

                {{-- Tombol Pesan via WhatsApp --}}
                @php
                    $pesanProduk = "Halo, saya tertarik dengan produk '{$produk->nama}' (Harga: Rp. " . number_format($produk->harga, 0, ',', '.') . "). Apakah stoknya masih ada?";
                    $linkWAPesanan = $linkWA ?? "https://wa.me/6281234567890?text=" . urlencode($pesanProduk);
                @endphp
                <a href="{{ $linkWAPesanan }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center justify-center w-full px-10 py-4 bg-green-500 hover:bg-green-600 text-white text-xl font-bold rounded-full shadow-md transition-transform transform hover:scale-105">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.451-4.43-9.887-9.886-9.887-5.452 0-9.887 4.434-9.889 9.886-.001 2.225.651 4.315 1.849 6.039l-1.218 4.439 4.542-1.192z" />
                    </svg>

                    Pesan via WhatsApp
                </a>

                {{-- Deskripsi Lengkap Produk --}}
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-dark dark:text-white mb-4">Deskripsi Produk</h2>
                    <div class="prose prose-lg dark:prose-invert text-gray-700 dark:text-gray-300">
                        {!! $produk->deskripsi !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layout>
