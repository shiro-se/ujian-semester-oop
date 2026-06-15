<?php

/**
 * TUGAS: Buat GuestMiddleware untuk memeriksa guest (belum login)
 *
 * REQUIREMENTS:
 * 1. Method handle() - cek apakah user BELUM login
 * 2. Jika sudah login, redirect ke /dashboard
 * 3. Jika belum login, lanjutkan ke request berikutnya
 *
 * Gunakan middleware ini untuk route login dan register
 * agar user yang sudah login tidak bisa akses halaman login lagi
 */

namespace App\Middleware;

class GuestMiddleware
{
    public function handle()
    {
        // TODO: Implementasikan middleware ini
        // Jika $_SESSION['user'] ada, redirect ke /dashboard
    }
}
