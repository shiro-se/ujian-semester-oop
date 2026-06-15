<?php

/**
 * TUGAS: Buat Router sederhana yang menangani routing HTTP
 *
 * REQUIREMENTS:
 * 1. Method get($route, $callback) - handle GET request
 * 2. Method post($route, $callback) - handle POST request
 * 3. Method put($route, $callback) - handle PUT request
 * 4. Method delete($route, $callback) - handle DELETE request
 * 5. Method dispatch() - proses request dan jalankan callback
 * 6. Support parameter dinamis: /user/{id}
 * 7. Support middleware pada route
 * 8. Handle 404 Not Found
 *
 * BONUS: Implementasikan named routes dan route groups
 */

namespace App\Core;

class Router
{
    protected $routes = [];
    protected $params = [];
    protected $middlewares = [];

    /**
     * TODO: Implementasikan method-method berikut:
     */

    // public function get($route, $callback, $middleware = []) { ... }
    // public function post($route, $callback, $middleware = []) { ... }
    // public function put($route, $callback, $middleware = []) { ... }
    // public function delete($route, $callback, $middleware = []) { ... }
    // public function dispatch() { ... }

    /**
     * HINT untuk dispatch():
     * 1. Ambil REQUEST_URI dan REQUEST_METHOD
     * 2. Parse URL untuk menghilangkan query string
     * 3. Loop routes untuk mencocokkan pattern
     * 4. Jika cocok, ekstrak parameter dan jalankan callback
     * 5. Jika tidak cocok, return 404
     *
     * HINT untuk parameter dinamis:
     * - Convert /user/{id} ke regex: #^/user/([a-zA-Z0-9_-]+)$#
     * - Gunakan preg_match() untuk matching
     */
}
