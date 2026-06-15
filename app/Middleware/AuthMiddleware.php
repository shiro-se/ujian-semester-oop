<?php

/**
 * TUGAS: Buat AuthMiddleware untuk memeriksa autentikasi
 *
 * REQUIREMENTS:
 * 1. Method handle() - cek apakah user sudah login
 * 2. Jika belum login, redirect ke /login
 * 3. Jika sudah login, lanjutkan ke request berikutnya
 * 4. Support redirect back setelah login (simpan intended URL di session)
 *
 * BONUS:
 * - Implementasikan role-based middleware (admin, user, dll)
 * - Implementasikan permission-based middleware
 */

namespace App\Middleware;

class AuthMiddleware
{
    /**
     * Handle incoming request
     *
     * @return bool|void Return false atau redirect jika tidak lolos
     */
    public function handle()
    {
        // TODO:
        // 1. Cek apakah session 'user' ada
        // 2. Jika tidak ada, simpan intended URL ke session
        // 3. Redirect ke /login
        // 4. Jika ada, return true atau lanjutkan

        if (!isset($_SESSION['user'])) {
            $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
            header('Location: /login');
            exit;
        }

        return true;
    }

    /**
     * HINT:
     * - Gunakan $_SESSION['user'] untuk cek login
     * - Gunakan $_SERVER['REQUEST_URI'] untuk intended URL
     * - Middleware bisa di-chain: auth -> role -> dll
     */
}
