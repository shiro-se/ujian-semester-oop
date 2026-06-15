<?php

/**
 * TUGAS: Buat halaman form tambah/edit post
 *
 * REQUIREMENTS:
 * 1. Form dengan field: judul, slug (auto-generate), konten, excerpt, status
 * 2. Rich text editor sederhana atau textarea (BONUS: TinyMCE/Quill)
 * 3. Validasi client-side
 * 4. Preview sebelum submit (BONUS)
 * 5. CSRF token
 * 6. Responsive design
 */
?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <a href="/posts" class="text-gray-500 hover:text-primary transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Post
        </a>
    </div>

    <h1 class="text-3xl font-bold text-gray-900 mb-8">
        <i class="fas fa-plus-circle text-success mr-2"></i>Tambah Post Baru
    </h1>

    <div class="bg-white rounded-xl shadow-md p-8">
        <form action="/posts" method="POST" class="space-y-6">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">

            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-heading mr-1 text-gray-400"></i>Judul Post
                </label>
                <input type="text" id="title" name="title" required maxlength="255"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                    placeholder="Masukkan judul post..."
                    value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
            </div>

            <!-- Slug (Auto-generate dari judul) -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-link mr-1 text-gray-400"></i>Slug (URL)
                </label>
                <input type="text" id="slug" name="slug" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition bg-gray-50"
                    placeholder="judul-post-anda"
                    value="<?= htmlspecialchars($_POST['slug'] ?? '') ?>">
                <p class="mt-1 text-sm text-gray-500">Slug akan otomatis terisi dari judul. Bisa diubah manual.</p>
            </div>

            <!-- Excerpt -->
            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-align-left mr-1 text-gray-400"></i>Ringkasan (Excerpt)
                </label>
                <textarea id="excerpt" name="excerpt" rows="3" maxlength="500"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                    placeholder="Ringkasan singkat tentang post ini..."><?= htmlspecialchars($_POST['excerpt'] ?? '') ?></textarea>
            </div>

            <!-- Konten -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-file-alt mr-1 text-gray-400"></i>Konten
                </label>
                <textarea id="content" name="content" rows="15" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition"
                    placeholder="Tulis konten post Anda di sini..."><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                <p class="mt-1 text-sm text-gray-500">Gunakan Markdown atau HTML sederhana untuk formatting.</p>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-toggle-on mr-1 text-gray-400"></i>Status
                </label>
                <select id="status" name="status"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition">
                    <option value="draft" <?= ($_POST['status'] ?? 'draft') === 'draft' ? 'selected' : '' ?>>Draft (Simpan sebagai draf)</option>
                    <option value="published" <?= ($_POST['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published (Publikasikan sekarang)</option>
                </select>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="/posts" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-blue-600 transition transform hover:scale-[1.02]">
                    <i class="fas fa-save mr-2"></i>Simpan Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Auto-generate slug dari judul
    document.getElementById('title').addEventListener('input', function(e) {
        const title = e.target.value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter spesial
            .replace(/\s+/g, '-') // Ganti spasi dengan dash
            .replace(/-+/g, '-'); // Hindari multiple dash
        document.getElementById('slug').value = slug;
    });
</script>
