<?php

/**
 * TUGAS: Buat halaman registrasi yang menarik dengan Tailwind CSS
 */
?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-500 to-teal-600 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-2xl">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 bg-success rounded-full flex items-center justify-center">
                <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Buat Akun Baru</h2>
            <p class="mt-2 text-sm text-gray-600">
                Sudah punya akun?
                <a href="/login" class="font-medium text-primary hover:text-blue-500">Masuk di sini</a>
            </p>
        </div>

        <form class="mt-8 space-y-6" action="/register" method="POST">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-user mr-1 text-gray-400"></i>Nama Lengkap
                    </label>
                    <input id="name" name="name" type="text" required minlength="3" maxlength="100"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="John Doe">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-envelope mr-1 text-gray-400"></i>Email
                    </label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="nama@email.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-lock mr-1 text-gray-400"></i>Password
                    </label>
                    <input id="password" name="password" type="password" required minlength="8"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="Minimal 8 karakter">
                    <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div id="password-strength" class="h-full transition-all duration-300 w-0"></div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Password harus mengandung huruf besar, huruf kecil, dan angka</p>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-check-circle mr-1 text-gray-400"></i>Konfirmasi Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="Ulangi password">
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-success hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-success transition transform hover:scale-[1.02]">
                <i class="fas fa-user-plus mr-2 mt-1"></i>Daftar
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('password').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthBar = document.getElementById('password-strength');
        let strength = 0;

        if (password.length >= 8) strength += 25;
        if (password.match(/[a-z]+/)) strength += 25;
        if (password.match(/[A-Z]+/)) strength += 25;
        if (password.match(/[0-9]+/)) strength += 25;

        strengthBar.style.width = strength + '%';

        if (strength <= 25) strengthBar.className = 'h-full transition-all duration-300 bg-red-500';
        else if (strength <= 50) strengthBar.className = 'h-full transition-all duration-300 bg-yellow-500';
        else if (strength <= 75) strengthBar.className = 'h-full transition-all duration-300 bg-blue-500';
        else strengthBar.className = 'h-full transition-all duration-300 bg-green-500';
    });
</script>
