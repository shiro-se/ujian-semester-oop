<?php

/**
 * TUGAS: Buat Base Controller yang akan di-extend oleh semua controller
 *
 * REQUIREMENTS:
 * 1. Method view($view, $data = []) - render view dengan data
 * 2. Method redirect($url) - redirect ke URL lain
 * 3. Method json($data, $statusCode = 200) - return JSON response
 * 4. Method validate($rules, $data) - validasi input sederhana
 * 5. Method session($key, $value = null) - getter/setter session
 * 6. Method flash($key, $value = null) - flash message
 * 7. Method csrf() - generate CSRF token
 * 8. Method verifyCsrf($token) - verifikasi CSRF token
 *
 * BONUS: Implementasikan method middleware() untuk menjalankan middleware
 */

namespace App\Core;

abstract class Controller
{
    protected $viewPath = BASE_PATH . '/app/Views/';

    /**
     * TODO: Implementasikan method-method berikut:
     */

    // protected function view($view, $data = []) { ... }
    // protected function redirect($url) { ... }
    // protected function json($data, $statusCode = 200) { ... }
    // protected function validate($rules, $data) { ... }
    // protected function session($key, $value = null) { ... }
    // protected function flash($key, $value = null) { ... }
    // protected function csrf() { ... }
    // protected function verifyCsrf($token) { ... }

    /**
     * HINT:
     * - view(): extract($data); require $viewPath . $view . '.php';
     * - redirect(): header('Location: ' . $url); exit;
     * - json(): header('Content-Type: application/json'); echo json_encode($data);
     * - validate(): loop $rules, check required, email, min, max, numeric, dll
     * - csrf(): $_SESSION['_token'] = bin2hex(random_bytes(32));
     */
}
