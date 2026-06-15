<?php

/**
 * TUGAS: IMPROVE AuthController ini!
 *
 * REQUIREMENTS WAJIB:
 * 1. Implementasikan registrasi user dengan validasi:
 *    - Nama: required, min 3 karakter, max 100
 *    - Email: required, format email valid, unique
 *    - Password: required, min 8 karakter, harus mengandung huruf besar, huruf kecil, dan angka
 *    - Konfirmasi Password: harus sama dengan password
 *
 * 2. Implementasikan login dengan:
 *    - Validasi email dan password
 *    - Rate limiting (maksimal 5x percobaan login gagal per IP per 15 menit)
 *    - Session management yang aman
 *    - Remember me functionality (optional)
 *
 * 3. Implementasikan logout yang aman:
 *    - Hapus session
 *    - Hapus cookie remember me
 *    - Regenerate session ID
 *
 * 4. Implementasikan forgot password:
 *    - Kirim email dengan token reset (simulasi dengan log file)
 *    - Token expired dalam 1 jam
 *    - Validasi password baru
 *
 * 5. Implementasikan middleware check:
 *    - Redirect ke login jika belum login
 *    - Redirect ke dashboard jika sudah login
 *
 * BONUS:
 * - Implementasi OAuth (Google/GitHub) dengan konsep Strategy Pattern
 * - Two-Factor Authentication (2FA) dengan TOTP
 * - Activity logging (log semua aktivitas login/logout)
 * - Account lockout setelah 5x gagal login
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        // TODO: Jika sudah login, redirect ke dashboard
        // TODO: Render view auth/login.php
    }

    /**
     * Proses login
     */
    public function login()
    {
        // TODO:
        // 1. Validasi input (email, password)
        // 2. Cek rate limiting
        // 3. Cari user berdasarkan email
        // 4. Verifikasi password dengan password_verify()
        // 5. Set session dengan data user
        // 6. Regenerate session ID untuk keamanan
        // 7. Redirect ke dashboard
        // 8. Jika gagal, increment failed attempts dan return error
    }

    /**
     * Tampilkan halaman registrasi
     */
    public function showRegister()
    {
        // TODO: Render view auth/register.php
    }

    /**
     * Proses registrasi
     */
    public function register()
    {
        // TODO:
        // 1. Validasi input (nama, email, password, password_confirmation)
        // 2. Cek email sudah terdaftar atau belum
        // 3. Hash password dengan password_hash()
        // 4. Simpan user ke database
        // 5. Set flash message success
        // 6. Redirect ke halaman login
    }

    /**
     * Proses logout
     */
    public function logout()
    {
        // TODO:
        // 1. Hapus semua session data
        // 2. Destroy session
        // 3. Hapus cookie remember me jika ada
        // 4. Redirect ke halaman login
    }

    /**
     * Tampilkan halaman forgot password
     */
    public function showForgotPassword()
    {
        // TODO: Render view auth/forgot-password.php
    }

    /**
     * Kirim token reset password
     */
    public function forgotPassword()
    {
        // TODO:
        // 1. Validasi email
        // 2. Cari user berdasarkan email
        // 3. Generate token random (bin2hex(random_bytes(32)))
        // 4. Simpan token ke database dengan expired time
        // 5. Simulasikan kirim email (simpan ke log file)
        // 6. Return message (jangan tunjukkan apakah email ada atau tidak - security)
    }

    /**
     * Tampilkan halaman reset password
     */
    public function showResetPassword($token)
    {
        // TODO:
        // 1. Validasi token
        // 2. Cek token belum expired
        // 3. Render view auth/reset-password.php dengan token
    }

    /**
     * Proses reset password
     */
    public function resetPassword($token)
    {
        // TODO:
        // 1. Validasi token
        // 2. Validasi password baru
        // 3. Update password user
        // 4. Hapus token dari database
        // 5. Redirect ke login dengan pesan sukses
    }

    /**
     * HINT KEAMANAN:
     * - Selalu gunakan password_hash() untuk hashing
     * - Selalu gunakan password_verify() untuk verifikasi
     * - Selalu regenerate session ID setelah login
     * - Gunakan prepared statements untuk query database
     * - Escape output untuk mencegah XSS
     * - Rate limiting: simpan failed attempts di session atau database
     * - Token reset: simpan hash token di DB, jangan plaintext
     */
}
