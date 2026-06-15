<?php

/**
 * TUGAS: Buat Abstract Base Model untuk semua model
 *
 * REQUIREMENTS:
 * 1. Abstract class yang menggunakan PDO dari Database singleton
 * 2. Property protected $table dan $primaryKey
 * 3. Method find($id) - cari berdasarkan primary key
 * 4. Method all() - ambil semua data
 * 5. Method where($column, $value) - query dengan WHERE
 * 6. Method create($data) - insert data
 * 7. Method update($id, $data) - update data
 * 8. Method delete($id) - hapus data
 * 9. Method first() - ambil data pertama
 * 10. Method get() - eksekusi query dan return hasil
 *
 * BONUS: Implementasikan query builder sederhana (select, where, orderBy, limit)
 */

namespace App\Core;

use App\Config\Database;
use PDO;

abstract class Model
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    // Query builder properties
    protected $query = '';
    protected $bindings = [];
    protected $whereAdded = false;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * TODO: Implementasikan method-method berikut:
     */

    // public function find($id) { ... }
    // public function all() { ... }
    // public function where($column, $value) { ... }
    // public function create($data) { ... }
    // public function update($id, $data) { ... }
    // public function delete($id) { ... }
    // public function first() { ... }
    // public function get() { ... }

    /**
     * HINT untuk Query Builder:
     * - Gunakan $this->query untuk menyimpan string SQL
     * - Gunakan $this->bindings untuk menyimpan parameter binding
     * - Method where() harus bisa chaining: $model->where('a', 1)->where('b', 2)->get()
     * - Gunakan PDO prepare() dan execute() untuk keamanan SQL Injection
     */
}
