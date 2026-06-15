<?php

/**
 * TUGAS: Buat Model User yang lengkap
 *
 * REQUIREMENTS:
 * 1. Extend dari App\Core\Model
 * 2. Property $table = 'users'
 * 3. Method findByEmail($email) - cari user berdasarkan email
 * 4. Method create($data) - override create untuk hash password otomatis
 * 5. Method updatePassword($id, $password) - update password dengan hash
 * 6. Method verifyPassword($password, $hash) - verifikasi password
 * 7. Method generateToken($userId, $type) - generate token reset password
 * 8. Method findByToken($token, $type) - cari user berdasarkan token
 * 9. Method deleteToken($userId, $type) - hapus token
 *
 * BONUS:
 * - Implementasikan relationship dengan Post (hasMany)
 * - Implementasikan scopes (active, verified, dll)
 * - Implementasikan accessor/mutator
 */

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * Kolom yang boleh diisi (fillable)
     */
    protected $fillable = ['name', 'email', 'password', 'avatar', 'role', 'status'];

    /**
     * Kolom yang disembunyikan (hidden)
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * TODO: Implementasikan method-method berikut:
     */

    // public function findByEmail($email) { ... }
    // public function create($data) { ... }
    // public function updatePassword($id, $password) { ... }
    // public function verifyPassword($password, $hash) { ... }
    // public function generateToken($userId, $type = 'reset') { ... }
    // public function findByToken($token, $type = 'reset') { ... }
    // public function deleteToken($userId, $type = 'reset') { ... }

    /**
     * HINT:
     * - findByEmail: SELECT * FROM users WHERE email = ?
     * - create: hash password dengan password_hash() sebelum insert
     * - generateToken: buat token random, simpan hash-nya di DB, return plaintext token
     * - findByToken: SELECT * FROM users WHERE reset_token_hash = ? AND reset_token_expires_at > NOW()
     */
}
