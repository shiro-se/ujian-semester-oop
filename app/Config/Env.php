<?php

/**
 * TUGAS: Buat class Env yang dapat membaca file .env
 *
 * REQUIREMENTS:
 * 1. Method static load($path) untuk membaca file .env
 * 2. Method static get($key, $default = null) untuk mengambil value
 * 3. Handle komentar (baris yang diawali #)
 * 4. Handle value dengan tanda petik
 * 5. Handle value kosong
 * 6. Trim whitespace
 */

namespace App\Config;

class Env
{
    // TODO: Implementasikan class ini!

    /**
     * HINT:
     * - Gunakan file() untuk membaca file per baris
     * - Gunakan explode('=', $line, 2) untuk memisahkan key dan value
     * - Gunakan trim() untuk membersihkan whitespace
     * - Simpan ke $_ENV[$key] = $value
     */
}
