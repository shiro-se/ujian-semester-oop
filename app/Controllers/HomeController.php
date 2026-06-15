<?php

/**
 * TUGAS: Buat HomeController untuk halaman publik
 *
 * REQUIREMENTS:
 * 1. Method index() - tampilkan halaman home dengan daftar post terbaru
 * 2. Method about() - tampilkan halaman about
 * 3. Method contact() - tampilkan dan proses form contact
 *
 * BONUS: Implementasikan caching untuk halaman home
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    public function index()
    {
        // TODO:
        // 1. Ambil 5 post terbaru
        // 2. Render view home/index.php
    }

    public function about()
    {
        // TODO: Render view home/about.php
    }

    public function contact()
    {
        // TODO:
        // GET: tampilkan form contact
        // POST: proses form, validasi, simpan ke database atau kirim email
    }
}
