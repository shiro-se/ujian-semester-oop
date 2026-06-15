<?php

/**
 * TUGAS: Buat Model Post yang lengkap
 *
 * REQUIREMENTS:
 * 1. Extend dari App\Core\Model
 * 2. Property $table = 'posts'
 * 3. Method getByUser($userId) - ambil post berdasarkan user
 * 4. Method getPublished() - ambil post yang status = published
 * 5. Method search($keyword) - cari post berdasarkan keyword
 * 6. Method getWithUser($id) - ambil post dengan data user (JOIN)
 * 7. Method getLatest($limit = 5) - ambil post terbaru
 * 8. Method getPaginated($page, $perPage) - ambil post dengan pagination
 *
 * BONUS:
 * - Implementasikan soft delete (deleted_at column)
 * - Implementasikan relationship dengan User (belongsTo)
 * - Implementasikan tags relationship (many-to-many)
 */

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'title', 'slug', 'content', 'excerpt', 'featured_image', 'status', 'published_at'];

    /**
     * TODO: Implementasikan method-method berikut:
     */

    // public function getByUser($userId) { ... }
    // public function getPublished() { ... }
    // public function search($keyword) { ... }
    // public function getWithUser($id) { ... }
    // public function getLatest($limit = 5) { ... }
    // public function getPaginated($page, $perPage = 10) { ... }

    /**
     * HINT:
     * - getByUser: SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC
     * - getPublished: SELECT * FROM posts WHERE status = 'published' AND published_at <= NOW()
     * - search: SELECT * FROM posts WHERE title LIKE ? OR content LIKE ?
     * - getWithUser: SELECT posts.*, users.name, users.email FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?
     * - getPaginated: SELECT * FROM posts LIMIT ? OFFSET ?
     */
}
