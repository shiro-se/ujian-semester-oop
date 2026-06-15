<?php

/**
 * TUGAS: Buat class Database menggunakan PDO dengan konsep Singleton Pattern
 *
 * REQUIREMENTS:
 * 1. Gunakan PDO untuk koneksi ke MySQL/PostgreSQL
 * 2. Implementasikan Singleton Pattern (hanya 1 instance database)
 * 3. Method static getInstance() untuk mengambil instance
 * 4. Method getConnection() untuk mengambil PDO connection
 * 5. Handle error dengan try-catch
 * 6. Set PDO error mode ke EXCEPTION
 * 7. Set charset sesuai konfigurasi .env
 *
 * BONUS: Implementasikan method query(), prepare(), dan lastInsertId()
 */

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        // TODO: Ambil konfigurasi dari Env::get()
        // Buat koneksi PDO dengan try-catch
    }

    public static function getInstance()
    {
        // TODO: if (self::$instance === null) { self::$instance = new self(); }
    }

    public function getConnection()
    {
        // TODO: Return PDO connection
    }

    private function __clone() {}
    public function __wakeup() {}
}
