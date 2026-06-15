<?php

/**
 * TUGAS: Buat PostController dengan CRUD lengkap
 *
 * REQUIREMENTS:
 * 1. Method index() - tampilkan semua post (dengan pagination)
 * 2. Method show($id) - tampilkan detail post
 * 3. Method create() - tampilkan form tambah post
 * 4. Method store() - proses tambah post
 * 5. Method edit($id) - tampilkan form edit post
 * 6. Method update($id) - proses update post
 * 7. Method delete($id) - proses hapus post
 * 8. Implementasikan authorization (hanya pemilik post yang bisa edit/delete)
 *
 * BONUS:
 * - Implementasikan soft delete
 * - Implementasikan search dan filter
 * - Implementasikan sorting
 * - Upload gambar untuk post
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class PostController extends Controller
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
        // TODO: Middleware auth
    }

    /**
     * Tampilkan semua post dengan pagination
     */
    public function index()
    {
        // TODO:
        // 1. Ambil parameter page dari query string
        // 2. Hitung offset berdasarkan page dan limit (misal 10 per page)
        // 3. Ambil data post dari model dengan pagination
        // 4. Render view posts/index.php
    }

    /**
     * Tampilkan detail post
     */
    public function show($id)
    {
        // TODO:
        // 1. Cari post berdasarkan ID
        // 2. Jika tidak ditemukan, return 404
        // 3. Render view posts/show.php
    }

    /**
     * Tampilkan form tambah post
     */
    public function create()
    {
        // TODO: Render view posts/create.php
    }

    /**
     * Proses tambah post
     */
    public function store()
    {
        // TODO:
        // 1. Validasi input (title, content, status)
        // 2. Set user_id dari session
        // 3. Simpan ke database
        // 4. Redirect ke posts/index dengan pesan sukses
    }

    /**
     * Tampilkan form edit post
     */
    public function edit($id)
    {
        // TODO:
        // 1. Cari post berdasarkan ID
        // 2. Cek authorization (user_id == session user_id)
        // 3. Render view posts/edit.php
    }

    /**
     * Proses update post
     */
    public function update($id)
    {
        // TODO:
        // 1. Validasi input
        // 2. Cek authorization
        // 3. Update di database
        // 4. Redirect dengan pesan sukses
    }

    /**
     * Proses hapus post
     */
    public function delete($id)
    {
        // TODO:
        // 1. Cek authorization
        // 2. Hapus dari database (atau soft delete)
        // 3. Redirect dengan pesan sukses
    }
}
