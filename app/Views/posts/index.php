<?php

/**
 * TUGAS: Buat halaman daftar post (CRUD Index)
 *
 * REQUIREMENTS:
 * 1. Tabel daftar post dengan kolom: judul, status, penulis, tanggal, aksi
 * 2. Pagination
 * 3. Search dan filter (BONUS)
 * 4. Tombol tambah post
 * 5. Konfirmasi hapus dengan JavaScript
 * 6. Responsive design
 */
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            <i class="fas fa-newspaper text-primary mr-2"></i>Daftar Post
        </h1>
        <a href="/posts/create" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Post
        </a>
    </div>

    <!-- Search & Filter (BONUS) -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
        <form action="/posts" method="GET" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" placeholder="Cari post..."
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
            </div>
            <div>
                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    <option value="">Semua Status</option>
                    <option value="published" <?= ($_GET['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
                    <option value="draft" <?= ($_GET['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
        </form>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($post['title']) ?></div>
                                    <div class="text-sm text-gray-500"><?= htmlspecialchars(substr($post['excerpt'] ?? $post['content'], 0, 50)) ?>...</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    <?= $post['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                        <?= ucfirst($post['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= htmlspecialchars($post['user_name'] ?? 'Unknown') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d M Y H:i', strtotime($post['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/posts/<?= $post['id'] ?>" class="text-primary hover:text-blue-700 mr-3" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php if (($post['user_id'] ?? null) === ($_SESSION['user']['id'] ?? null)): ?>
                                        <a href="/posts/<?= $post['id'] ?>/edit" class="text-warning hover:text-yellow-700 mr-3" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="/posts/<?= $post['id'] ?>/delete" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                                            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
                                            <button type="submit" class="text-danger hover:text-red-700" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2"></i>
                                <p>Belum ada post. <a href="/posts/create" class="text-primary">Buat post pertama</a></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
        <div class="mt-6 flex justify-center">
            <nav class="flex items-center space-x-2">
                <!-- Pagination links sama seperti di home -->
            </nav>
        </div>
    <?php endif; ?>
</div>
