<?php

/**
 * TUGAS: Buat halaman reset password
 *
 * REQUIREMENTS:
 * 1. Form dengan field password baru dan konfirmasi
 * 2. Validasi password (min 8, huruf besar, huruf kecil, angka)
 * 3. Tampilkan error validation
 * 4. CSRF token
 * 5. Hidden input untuk token
 */
?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-500 to-pink-500 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-2xl">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-purple-600 rounded-full flex items-center justify-center">
                <i class="fas fa-redo text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Reset Password</h2>
            <p class="mt-2 text-sm text-gray-600">Buat password baru untuk akun Anda.</p>
        </div>

        <form class="mt-8 space-y-6" action="/reset-password/<?= htmlspecialchars($token ?? '') ?>" method="POST">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">

            <div class="space-y-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input id="password" name="password" type="password" required minlength="8"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                        placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                        placeholder="Ulangi password baru">
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 transition">
                <i class="fas fa-save mr-2 mt-1"></i>Simpan Password Baru
            </button>
        </form>
    </div>
</div>
