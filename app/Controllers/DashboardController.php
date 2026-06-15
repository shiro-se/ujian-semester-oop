<?php

/**
 * TUGAS: Buat DashboardController yang menampilkan data dashboard
 *
 * REQUIREMENTS:
 * 1. Method index() - tampilkan dashboard dengan statistik
 * 2. Method profile() - tampilkan dan edit profil user
 * 3. Method updateProfile() - proses update profil
 * 4. Gunakan middleware auth untuk semua method
 *
 * BONUS: Implementasikan API endpoint untuk data dashboard (JSON)
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Post; // Asumsi ada model Post

class DashboardController extends Controller
{
    protected $userModel;
    protected $postModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->postModel = new Post();
        // TODO: Implementasikan middleware auth
        // Jika user belum login, redirect ke /login
    }

    /**
     * Tampilkan halaman dashboard
     */
    public function index()
    {
        // TODO:
        // 1. Ambil data user dari session
        // 2. Hitung statistik (jumlah post, jumlah user, dll)
        // 3. Render view dashboard/index.php dengan data

        $data = [
            'title' => 'Dashboard',
            'user' => $_SESSION['user'] ?? null,
            // 'stats' => [...]
        ];

        // $this->view('dashboard/index', $data);
    }

    /**
     * Tampilkan halaman profil
     */
    public function profile()
    {
        // TODO: Render view dashboard/profile.php dengan data user
    }

    /**
     * Proses update profil
     */
    public function updateProfile()
    {
        // TODO:
        // 1. Validasi input
        // 2. Update data user di database
        // 3. Update session data
        // 4. Return success/error message
    }
}
