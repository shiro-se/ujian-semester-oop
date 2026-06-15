<?php

/**
 * TUGAS (BONUS): Buat Model PasswordReset
 *
 * REQUIREMENTS:
 * 1. Method createToken($email) - buat token baru
 * 2. Method findByToken($token) - cari berdasarkan token
 * 3. Method deleteByEmail($email) - hapus semua token untuk email
 * 4. Method isValid($token) - cek token belum expired
 */

namespace App\Models;

use App\Core\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';

    // TODO: Implementasikan class ini!
}
