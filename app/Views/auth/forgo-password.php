<?php

/**
 * TUGAS: Buat halaman forgot password
 *
 * REQUIREMENTS:
 * 1. Form dengan field email
 * 2. Validasi client-side
 * 3. Tampilkan pesan sukses/error
 * 4. CSRF token
 * 5. Link kembali ke login
 */
?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-400 to-red-500 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-2xl">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-warning rounded-full flex items-center justify-center">
                <i class="fas fa-key text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Lupa Password?</h2>
            <p class="mt-2 text-sm text-gray-600">
                Masukkan email Anda dan kami akan kirimkan link reset password.
            </p>
        </div>

        <form class="mt-8 space-y-6" action="/forgot-password" method="POST">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-warning focus:border-warning transition"
                    placeholder="nama@email.com">
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-warning hover:bg-yellow-600 transition">
                <i class="fas fa-paper-plane mr-2 mt-1"></i>Kirim Link Reset
            </button>
        </form>

        <div class="text-center">
            <a href="/login" class="text-sm text-primary hover:text-blue-500">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
            </a>
        </div>
    </div>
</div>
