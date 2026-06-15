<?php

/**
 * TUGAS: Buat halaman profil user
 *
 * REQUIREMENTS:
 * 1. Tampilkan dan edit data profil (nama, email, avatar)
 * 2. Form update password terpisah
 * 3. Validasi client-side
 * 4. Tampilkan error/success message
 * 5. Responsive design
 */
?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">
        <i class="fas fa-user-circle text-primary mr-2"></i>Profil Saya
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <div class="relative inline-block">
                    <img src="<?= htmlspecialchars($user['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($user['name'] ?? 'User')) ?>"
                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-primary"
                        alt="Profile">
                    <button class="absolute bottom-0 right-0 bg-primary text-white p-2 rounded-full hover:bg-blue-600 transition">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <h3 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($user['name'] ?? '') ?></h3>
                <p class="text-gray-500"><?= htmlspecialchars($user['email'] ?? '') ?></p>
                <div class="mt-4">
                    <span class="px-3 py-1 bg-blue-100 text-primary rounded-full text-sm font-medium">
                        <?= ucfirst($user['role'] ?? 'user') ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-edit text-primary mr-2"></i>Edit Profil
                </h2>

                <form action="/dashboard/profile" method="POST" class="space-y-4">
                    <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </form>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-lock text-warning mr-2"></i>Ganti Password
                </h2>

                <form action="/dashboard/password" method="POST" class="space-y-4">
                    <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="new_password" required minlength="8"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-warning focus:border-warning">
                    </div>

                    <button type="submit" class="bg-warning text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-key mr-2"></i>Ganti Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
