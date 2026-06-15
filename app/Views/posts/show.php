<?php

/**
 * TUGAS: Buat halaman detail post
 *
 * REQUIREMENTS:
 * 1. Tampilkan judul, konten, penulis, tanggal
 * 2. Tombol edit dan hapus (hanya untuk pemilik)
 * 3. Navigasi kembali
 * 4. Responsive design
 * 5. Share buttons (BONUS)
 */
?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="/posts" class="text-gray-500 hover:text-primary transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Post
        </a>
    </div>

    <?php if (!empty($post)): ?>
        <article class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Featured Image Placeholder -->
            <div class="h-64 bg-gradient-to-br from-blue-400 to-purple-600 flex items-center justify-center">
                <i class="fas fa-newspaper text-white text-6xl"></i>
            </div>

            <div class="p-8">
                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="px-3 py-1 <?= $post['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?> rounded-full text-sm font-medium">
                        <?= ucfirst($post['status']) ?>
                    </span>
                    <span class="text-gray-500 text-sm">
                        <i class="far fa-calendar mr-1"></i><?= date('d M Y', strtotime($post['created_at'])) ?>
                    </span>
                    <span class="text-gray-500 text-sm">
                        <i class="far fa-user mr-1"></i><?= htmlspecialchars($post['user_name'] ?? 'Unknown') ?>
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    <?= htmlspecialchars($post['title']) ?>
                </h1>

                <!-- Excerpt -->
                <?php if (!empty($post['excerpt'])): ?>
                    <div class="bg-blue-50 border-l-4 border-primary p-4 mb-6 rounded-r-lg">
                        <p class="text-gray-700 italic"><?= htmlspecialchars($post['excerpt']) ?></p>
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </div>

                <!-- Actions -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <?php if (($post['user_id'] ?? null) === ($_SESSION['user']['id'] ?? null)): ?>
                            <a href="/posts/<?= $post['id'] ?>/edit" class="bg-warning text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                            <form action="/posts/<?= $post['id'] ?>/delete" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                                <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
                                <button type="submit" class="bg-danger text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                    <i class="fas fa-trash mr-2"></i>Hapus
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <!-- BONUS: Share Buttons -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Bagikan:</span>
                        <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode($_SERVER['HTTP_HOST'] . '/posts/' . $post['id']) ?>"
                            target="_blank" class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($_SERVER['HTTP_HOST'] . '/posts/' . $post['id']) ?>"
                            target="_blank" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://wa.me/?text=<?= urlencode($post['title'] . ' - ' . $_SERVER['HTTP_HOST'] . '/posts/' . $post['id']) ?>"
                            target="_blank" class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    <?php else: ?>
        <div class="text-center py-16">
            <i class="fas fa-exclamation-circle text-6xl text-gray-300 mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Post tidak ditemukan</h2>
            <p class="text-gray-500 mb-6">Post yang Anda cari mungkin telah dihapus atau tidak pernah ada.</p>
            <a href="/posts" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Post
            </a>
        </div>
    <?php endif; ?>
</div>
