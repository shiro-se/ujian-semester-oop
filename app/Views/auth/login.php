<?php

/**
 * TUGAS: Buat halaman login yang menarik dengan Tailwind CSS
 */
?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 to-purple-600 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-2xl">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-primary rounded-full flex items-center justify-center">
                <i class="fas fa-lock text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Masuk ke Akun</h2>
            <p class="mt-2 text-sm text-gray-600">
                Belum punya akun?
                <a href="/register" class="font-medium text-primary hover:text-blue-500">Daftar sekarang</a>
            </p>
        </div>

        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <div class="flex">
                    <i class="fas fa-exclamation-triangle text-red-500 mt-1 mr-3"></i>
                    <div>
                        <?php foreach ($errors as $error): ?>
                            <p class="text-sm text-red-700"><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="/login" method="POST">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-envelope mr-1 text-gray-400"></i>Email
                    </label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="nama@email.com"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-lock mr-1 text-gray-400"></i>Password
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-4 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox"
                        class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                </div>
                <div class="text-sm">
                    <a href="/forgot-password" class="font-medium text-primary hover:text-blue-500">Lupa password?</a>
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition transform hover:scale-[1.02]">
                <i class="fas fa-sign-in-alt mr-2 mt-1"></i>Masuk
            </button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>
