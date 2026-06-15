<?php

/**
 * TUGAS: Buat halaman home yang menarik
 *
 * REQUIREMENTS:
 * 1. Hero section dengan welcome message
 * 2. Daftar post terbaru (card layout)
 * 3. Pagination jika post banyak
 * 4. Responsive design dengan Tailwind
 * 5. Search bar (BONUS)
 */
?>
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">
            Selamat Datang di <span class="text-yellow-300">UjianSemester</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-blue-100">
            Platform blog sederhana dengan konsep OOP, MVC, dan PDO
        </p>
        <div class="flex justify-center gap-4">
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="/register" class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition transform hover:scale-105">
                    <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                </a>
                <a href="/login" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-primary transition">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            <?php else: ?>
                <a href="/dashboard" class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition">
                    <i class="fas fa-tachometer-alt mr-2"></i>Ke Dashboard
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">
            <i class="fas fa-star text-warning mr-2"></i>Fitur Unggulan
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-primary text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">OOP & MVC</h3>
                <p class="text-gray-600">Dibangun dengan konsep Object-Oriented Programming dan Model-View-Controller yang terstruktur.</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="h-16 w-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-success text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Keamanan</h3>
                <p class="text-gray-600">Dilengkapi dengan CSRF protection, password hashing, dan session management yang aman.</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="h-16 w-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-paint-brush text-purple-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Modern UI</h3>
                <p class="text-gray-600">Tampilan modern dan responsif menggunakan Tailwind CSS dengan desain yang menarik.</p>
            </div>
        </div>
    </div>
</div>

<!-- Latest Posts Section -->
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">
            <i class="fas fa-newspaper text-primary mr-2"></i>Post Terbaru
        </h2>

        <!-- BONUS: Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <form action="/" method="GET" class="relative">
                <input type="text" name="search" placeholder="Cari post..."
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                    class="w-full px-6 py-4 pl-14 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-primary focus:border-primary text-lg">
                <i class="fas fa-search absolute left-5 top-5 text-gray-400 text-xl"></i>
                <button type="submit" class="absolute right-2 top-2 bg-primary text-white px-6 py-2 rounded-full hover:bg-blue-600 transition">
                    Cari
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-image text-white text-4xl"></i>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="px-2 py-1 bg-blue-100 text-primary text-xs font-semibold rounded-full">
                                    <?= ucfirst($post['status'] ?? 'draft') ?>
                                </span>
                                <span class="ml-2 text-sm text-gray-500">
                                    <i class="far fa-calendar mr-1"></i><?= date('d M Y', strtotime($post['created_at'])) ?>
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                <?= htmlspecialchars($post['title']) ?>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                <?= htmlspecialchars($post['excerpt'] ?? substr($post['content'], 0, 150) . '...') ?>
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 bg-primary rounded-full flex items-center justify-center text-white text-xs font-bold mr-2">
                                        <?= strtoupper(substr($post['user_name'] ?? 'A', 0, 1)) ?>
                                    </div>
                                    <span class="text-sm text-gray-700"><?= htmlspecialchars($post['user_name'] ?? 'Anonymous') ?></span>
                                </div>
                                <a href="/posts/<?= $post['id'] ?>" class="text-primary hover:text-blue-700 font-medium">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500">Belum ada post yang dipublikasikan.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (BONUS) -->
        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <?php if ($pagination['current_page'] > 1): ?>
                        <a href="?page=<?= $pagination['current_page'] - 1 ?>" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                        <a href="?page=<?= $i ?>" class="px-4 py-2 border rounded-lg transition <?= $i === $pagination['current_page'] ? 'bg-primary text-white border-primary' : 'border-gray-300 hover:bg-gray-100' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                        <a href="?page=<?= $pagination['current_page'] + 1 ?>" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>
