<?php

/**
 * TUGAS: Buat halaman dashboard yang menarik
 *
 * REQUIREMENTS:
 * 1. Tampilkan statistik (jumlah post, jumlah user, dll)
 * 2. Tampilkan post terbaru
 * 3. Tampilkan informasi user
 * 4. Gunakan Tailwind CSS untuk styling
 * 5. Responsive design
 *
 * BONUS: Chart/statistik dengan Chart.js atau canvas
 */
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            <i class="fas fa-tachometer-alt text-primary mr-2"></i>Dashboard
        </h1>
        <p class="mt-2 text-gray-600">Selamat datang kembali, <?= htmlspecialchars($user['name'] ?? 'User') ?>!</p>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Posts -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-primary hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Posts</p>
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['total_posts'] ?? 0 ?></p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-newspaper text-primary text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Published Posts -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-success hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Published</p>
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['published_posts'] ?? 0 ?></p>
                </div>
                <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check-circle text-success text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Draft Posts -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-warning hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Draft</p>
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['draft_posts'] ?? 0 ?></p>
                </div>
                <div class="h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-edit text-warning text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900"><?= $stats['total_users'] ?? 0 ?></p>
                </div>
                <div class="h-12 w-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-purple-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900">
                <i class="fas fa-clock text-primary mr-2"></i>Post Terbaru
            </h2>
            <a href="/posts/create" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-sm">
                <i class="fas fa-plus mr-1"></i>Tambah Post
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($recent_posts)): ?>
                        <?php foreach ($recent_posts as $post): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($post['title']) ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    <?= $post['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                        <?= ucfirst($post['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d M Y', strtotime($post['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/posts/<?= $post['id'] ?>" class="text-primary hover:text-blue-700 mr-3">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/posts/<?= $post['id'] ?>/edit" class="text-warning hover:text-yellow-700 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/posts/<?= $post['id'] ?>/delete" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
                                        <button type="submit" class="text-danger hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2"></i>
                                <p>Belum ada post. <a href="/posts/create" class="text-primary">Buat post pertama</a></p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
