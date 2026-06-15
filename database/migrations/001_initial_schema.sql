-- =====================================================
-- MIGRATION: Initial Schema
-- Database: ujian_semester
-- Description: Skema database awal untuk aplikasi blog
-- =====================================================

-- Hapus database jika sudah ada (HATI-HATI di production!)
-- DROP DATABASE IF EXISTS ujian_semester;
-- CREATE DATABASE ujian_semester CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE ujian_semester;

-- -----------------------------------------------------
-- Tabel: users
-- Deskripsi: Menyimpan data pengguna aplikasi
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL COMMENT 'Nama lengkap user',
    email VARCHAR(255) NOT NULL UNIQUE COMMENT 'Email user (unique)',
    password VARCHAR(255) NOT NULL COMMENT 'Password yang sudah di-hash',
    avatar VARCHAR(255) DEFAULT NULL COMMENT 'URL/path foto profil',
    role ENUM('admin', 'user') DEFAULT 'user' COMMENT 'Role user',
    status ENUM('active', 'inactive', 'banned') DEFAULT 'active' COMMENT 'Status akun',
    remember_token VARCHAR(255) DEFAULT NULL COMMENT 'Token untuk remember me',
    email_verified_at TIMESTAMP NULL COMMENT 'Waktu verifikasi email',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu dibuat',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu diupdate',

    INDEX idx_email (email),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel data pengguna';

-- -----------------------------------------------------
-- Tabel: password_resets
-- Deskripsi: Menyimpan token reset password
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL COMMENT 'Email yang request reset',
    token_hash VARCHAR(255) NOT NULL COMMENT 'Hash dari token (jangan simpan plaintext!)',
    expires_at TIMESTAMP NOT NULL COMMENT 'Waktu kadaluarsa token',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu dibuat',

    INDEX idx_email (email),
    INDEX idx_token_hash (token_hash),
    INDEX idx_expires_at (expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Token reset password';

-- -----------------------------------------------------
-- Tabel: posts
-- Deskripsi: Menyimpan data blog post
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL COMMENT 'ID pembuat post (FK ke users)',
    title VARCHAR(255) NOT NULL COMMENT 'Judul post',
    slug VARCHAR(255) NOT NULL UNIQUE COMMENT 'Slug untuk URL (unique)',
    excerpt TEXT COMMENT 'Ringkasan post',
    content LONGTEXT COMMENT 'Konten lengkap post',
    featured_image VARCHAR(255) DEFAULT NULL COMMENT 'Gambar utama post',
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft' COMMENT 'Status publikasi',
    published_at TIMESTAMP NULL COMMENT 'Waktu dipublikasikan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu dibuat',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu diupdate',
    deleted_at TIMESTAMP NULL COMMENT 'Waktu dihapus (soft delete)',

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_status (status),
    INDEX idx_slug (slug),
    INDEX idx_published_at (published_at),
    FULLTEXT INDEX idx_search (title, content) COMMENT 'Untuk full-text search'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel blog posts';

-- -----------------------------------------------------
-- Tabel: login_attempts
-- Deskripsi: Menyimpan percobaan login (untuk rate limiting)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL COMMENT 'IP address (support IPv6)',
    email VARCHAR(255) COMMENT 'Email yang dicoba login',
    attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu percobaan',

    INDEX idx_ip_address (ip_address),
    INDEX idx_attempted_at (attempted_at),
    INDEX idx_ip_time (ip_address, attempted_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Log percobaan login';

-- -----------------------------------------------------
-- Tabel: activity_logs (BONUS)
-- Deskripsi: Log aktivitas user
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL COMMENT 'ID user (NULL jika guest)',
    action VARCHAR(50) NOT NULL COMMENT 'Jenis aksi (login, logout, create_post, dll)',
    description TEXT COMMENT 'Deskripsi detail',
    ip_address VARCHAR(45) COMMENT 'IP address',
    user_agent TEXT COMMENT 'User agent browser',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu kejadian',

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_action (action),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Log aktivitas';

-- -----------------------------------------------------
-- SEED DATA: User Admin Default
-- Password: admin123 (GANTI SETELAH LOGIN!)
-- -----------------------------------------------------
INSERT INTO users (name, email, password, role, status, email_verified_at) VALUES
('Administrator', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'active', NOW());
-- Note: Password di atas adalah hash dari 'password' (contoh dari Laravel)
-- Untuk production, gunakan password_hash() dengan password yang kuat!

-- -----------------------------------------------------
-- SEED DATA: User Test
-- Password: user123 (GANTI SETELAH LOGIN!)
-- -----------------------------------------------------
INSERT INTO users (name, email, password, role, status, email_verified_at) VALUES
('Test User', 'user@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'active', NOW());

-- -----------------------------------------------------
-- SEED DATA: Sample Posts
-- -----------------------------------------------------
INSERT INTO posts (user_id, title, slug, excerpt, content, status, published_at) VALUES
(1, 'Selamat Datang di Blog Kami', 'selamat-datang-di-blog-kami',
 'Ini adalah post pertama di blog kami. Pelajari lebih lanjut tentang fitur-fitur yang tersedia.',
 'Selamat datang di aplikasi blog kami! Ini adalah contoh post yang dibuat untuk demonstrasi. Anda bisa membuat, mengedit, dan menghapus post melalui dashboard.

Fitur yang tersedia:
- CRUD Posts
- Autentikasi lengkap
- Dashboard dengan statistik
- Responsive design',
 'published', NOW()),

(1, 'Panduan Menggunakan Aplikasi', 'panduan-menggunakan-aplikasi',
 'Panduan lengkap untuk menggunakan aplikasi blog ini dengan efektif.',
 'Berikut adalah panduan untuk menggunakan aplikasi blog ini:

1. Login dengan akun Anda
2. Akses dashboard untuk melihat statistik
3. Buat post baru melalui menu Posts
4. Edit profil Anda di menu Profile

Selamat menggunakan!',
 'published', NOW()),

(2, 'Post Draft Contoh', 'post-draft-contoh',
 'Ini adalah contoh post yang masih dalam status draft.',
 'Konten dari post draft. Post ini belum dipublikasikan dan hanya bisa dilihat oleh pemiliknya.',
 'draft', NULL);

-- =====================================================
-- END OF MIGRATION
-- =====================================================
