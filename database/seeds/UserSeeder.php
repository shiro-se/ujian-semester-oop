<?php

/**
 * TUGAS (BONUS): Buat Database Seeder
 *
 * REQUIREMENTS:
 * 1. Class untuk mengisi database dengan data dummy
 * 2. Method run() untuk eksekusi seeding
 * 3. Generate data dummy untuk users dan posts
 */

namespace Database\Seeds;

use App\Config\Database;

class UserSeeder
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function run()
    {
        // TODO: Implementasikan seeder
        // 1. Insert 10 dummy users
        // 2. Insert 20 dummy posts (random user)
        // 3. Gunakan password_hash() untuk password dummy
    }

    public function truncate()
    {
        // TODO: Hapus semua data dari tabel
    }
}
