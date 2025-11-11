@php
  // Style untuk link Desktop (md ke atas)
  $baseDesktop = 'block py-2 px-3 md:p-0 rounded md:bg-transparent';
  // Aktif: Warna aksen (light) / Putih (dark)
  $activeDesktop = 'text-primary md:dark:text-primary-light';
  // Inaktif: Abu-abu (light) / Putih (dark)
  $inactiveDesktop = 'text-gray-700 hover:text-primary md:hover:text-primary dark:text-light dark:hover:text-primary-light md:dark:hover:bg-transparent';

  // Style untuk link Mobile (di dalam dropdown)
  $baseMobile = 'block py-2 px-3 rounded';
  // Aktif: Aksen (light) / Putih (dark)
  $activeMobile = 'text-primary bg-gray-100 dark:text-primary-light dark:bg-dark';
  // Inaktif: Abu-abu (light) / Putih (dark)
  $inactiveMobile = 'text-gray-700 hover:bg-gray-100 dark:text-light dark:hover:bg-primary-dark/50'; 
@endphp

<nav x-data="{ open: false }"
  class="bg-white dark:bg-dark fixed w-full z-20 top-0 start-0 border-b border-gray-100 dark:border-gray-600 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    {{-- 1. Logo --}}
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary dark:text-light">Sneaky</span>
    </a>

    {{-- 2. Grup Tombol Kanan (CTA & Hamburger) --}}
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

      {{-- Tombol "Get started" (CTA) - Tidak perlu diubah --}}
      <a href="{{ $linkWA ?? '#' }}" target="_blank" rel="noopener noreferrer"
        class="text-dark bg-accent hover:brightness-90 focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-accent dark:hover:brightness-90 dark:focus:ring-accent hidden md:block">
        Hubungi Kami
      </a>

      {{-- Hamburger Mobile (Logika Alpine.js) --}}
      <button @click="open = !open" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-primary rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-light dark:hover:bg-dark-light"
        aria-controls="navbar-menu" :aria-expanded="open">
        <span class="sr-only">Open main menu</span>

        <svg x-show="!open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>

        <svg x-show="open" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    {{-- 3. Menu Navigasi (Desktop) --}}
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-menu-desktop">
      <ul
        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
        <li>
          <a href="/" class="{{ $baseDesktop }} {{ request()->is('/') ? $activeDesktop : $inactiveDesktop }}"
            aria-current="{{ request()->is('/') ? 'page' : 'false' }}">Beranda</a>
        </li>
        <li>
          <a href="/product"
            class="{{ $baseDesktop }} {{ request()->is('product*') ? $activeDesktop : $inactiveDesktop }}"
            aria-current="{{ request()->is('product*') ? 'page' : 'false' }}">Produk</a>
        </li>
        <li>
          <a href="/about" class="{{ $baseDesktop }} {{ request()->is('about') ? $activeDesktop : $inactiveDesktop }}"
            aria-current="{{ request()->is('about') ? 'page' : 'false' }}">Tentang Kami</a>
        </li>
      </ul>
    </div>

  </div>

  {{-- 4. Menu Navigasi (Mobile Dropdown) --}}
  <div x-show="open" x-transition class="md:hidden" id="navbar-menu-mobile">
    <ul class="flex flex-col p-4 font-medium bg-white dark:bg-dark border-t border-gray-200 dark:border-gray-600">
      <li>
        <a href="/" class="{{ $baseMobile }} {{ request()->is('/') ? $activeMobile : $inactiveMobile }}"
          aria-current="{{ request()->is('/') ? 'page' : 'false' }}">Beranda</a>
      </li>
      <li>
        <a href="/product" class="{{ $baseMobile }} {{ request()->is('product*') ? $activeMobile : $inactiveMobile }}"
          aria-current="{{ request()->is('product*') ? 'page' : 'false' }}">Produk</a>
      </li>
      <li>
        <a href="/about" class="{{ $baseMobile }} {{ request()->is('about') ? $activeMobile : $inactiveMobile }}"
          aria-current="{{ request()->is('about') ? 'page' : 'false' }}">Tentang Kami</a>
      </li>
      <li>
        <a href="#call-to-action"
          class="block w-full mt-2 text-dark bg-accent hover:brightness-90 focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-sm px-4 py-2 text-center">
          Hubungi Kami
        </a>
    </ul>
  </div>

</nav>