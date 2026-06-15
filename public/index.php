<?php

/**
 * Entry Point Aplikasi
 *
 * TUGAS: Jelaskan fungsi file ini dan bagaimana alur bootstrapping aplikasi!
 */

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Autoload classes
spl_autoload_register(function ($class) {
    $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load environment variables
require_once BASE_PATH . '/app/Config/Env.php';
App\Config\Env::load(BASE_PATH . '/.env');

// Start session
session_name($_ENV['SESSION_NAME'] ?? 'ujian_semester_session');
session_start();

// Initialize database
require_once BASE_PATH . '/app/Config/Database.php';

// Initialize router and handle request
$router = new App\Core\Router();
require_once BASE_PATH . '/routes/web.php';
$router->dispatch();
