import './bootstrap';

import Alpine from 'alpinejs';

// --------------------------------------------------
// KONFIGURASI NOMOR WHATSAPP
// --------------------------------------------------
const NOMOR_WA = '6281234567890'; // ⬅️ GANTI DENGAN NOMOR WA ANDA

// --------------------------------------------------
// STORE CART ALPINE.JS
// --------------------------------------------------
Alpine.store('cart', {
    items: [],

    // Init store, ambil data dari localStorage jika ada
    init() {
        const storedItems = localStorage.getItem('_cart_items');
        this.items = storedItems ? JSON.parse(storedItems) : [];

        // Auto save setiap ada perubahan
        Alpine.effect(() => {
            localStorage.setItem('_cart_items', JSON.stringify(this.items));
        });
    },

    // Total jumlah item
    totalCount() {
        return this.items.reduce((total, item) => total + item.quantity, 0);
    },

    totalPrice() {
        return this.items.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    },

    addItem(newItem) {
        const existingItem = this.items.find(item => item.id === newItem.id);

        // Ambil quantity yang dikirim, jika tidak ada, default-nya 1
        const qtyToAdd = newItem.quantity || 1;

        if (existingItem) {
            // Tambahkan quantity yang ada dengan yang baru
            existingItem.quantity += qtyToAdd;
        } else {
            // Jika newItem.quantity tidak ada, atur ke 1
            if (!newItem.quantity) {
                newItem.quantity = 1;
            }
            this.items.push(newItem);
        }

        // Beri tahu pengguna berapa banyak yang ditambahkan
        alert(`${qtyToAdd} produk ditambahkan ke keranjang!`);
    },

    // Hapus item
    removeItem(id) {
        this.items = this.items.filter(item => item.id !== id);
    },

    // Update quantity
    updateQuantity(id, newQuantity) {
        const item = this.items.find(item => item.id === id);
        if (item) {
            item.quantity = Number(newQuantity) < 1 ? 1 : Number(newQuantity);
        }
    },

    generateWhatsAppLink() {
        let message = "Halo, saya mau pesan barang berikut:\n\n";

        // Helper untuk format mata uang
        const formatCurrency = (value) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
        };

        this.items.forEach(item => {
            message += `*${item.name}*\n`;
            message += `Jumlah: ${item.quantity}\n`;
            // Gunakan helper untuk memformat harga item
            message += `Harga: ${formatCurrency(item.price)}\n\n`;
        });

        const formattedTotal = formatCurrency(this.totalPrice());
        message += `*Total Estimasi: ${formattedTotal}*`;

        // Encode pesan untuk URL
        return `https://wa.me/${NOMOR_WA}?text=${encodeURIComponent(message)}`;
    }
});

// --------------------------------------------------
// START ALPINE.JS
// --------------------------------------------------
window.Alpine = Alpine;
Alpine.start();
