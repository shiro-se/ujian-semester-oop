<?php

/**
 * TUGAS (BONUS): Buat Helper Functions
 *
 * Helper functions global yang bisa digunakan di seluruh aplikasi.
 * Gunakan namespace App\Helpers atau buat sebagai function global.
 *
 * REQUIREMENTS:
 * 1. dd() - Dump and die (debug)
 * 2. env() - Get environment variable
 * 3. old() - Get old input value
 * 4. redirect() - Redirect helper
 * 5. back() - Redirect back
 * 6. asset() - Get asset URL
 * 7. route() - Get route URL by name (BONUS)
 * 8. auth() - Get current authenticated user (BONUS)
 * 9. csrf_token() - Get CSRF token
 * 10. session() - Get/set session value
 */

namespace App\Helpers;

/**
 * Dump and Die - Debug helper
 *
 * @param mixed $data
 * @return void
 */
function dd($data)
{
    // TODO: Implementasikan dd()
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();
}

/**
 * Get environment variable
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null)
{
    // TODO: Implementasikan env()
    // return \App\Config\Env::get($key, $default);
}

/**
 * Get old input value
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function old($key, $default = '')
{
    // TODO: Implementasikan old()
    // return $_SESSION['old_input'][$key] ?? $default;
}

/**
 * Generate CSRF token
 *
 * @return string
 */
function csrf_token()
{
    // TODO: Implementasikan csrf_token()
    // return $_SESSION['_token'] ?? '';
}

/**
 * Get CSRF field (hidden input)
 *
 * @return string
 */
function csrf_field()
{
    // TODO: Implementasikan csrf_field()
    // return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
}

/**
 * Get/set session value
 *
 * @param string $key
 * @param mixed $value
 * @return mixed
 */
function session($key = null, $value = null)
{
    // TODO: Implementasikan session()
    // if ($key === null) return $_SESSION;
    // if ($value === null) return $_SESSION[$key] ?? null;
    // $_SESSION[$key] = $value;
}

/**
 * Flash message helper
 *
 * @param string $key
 * @param mixed $value
 * @return mixed
 */
function flash($key, $value = null)
{
    // TODO: Implementasikan flash()
    // if ($value !== null) {
    //     $_SESSION['flash'][$key] = $value;
    // }
    // return $_SESSION['flash'][$key] ?? null;
}

/**
 * Redirect helper
 *
 * @param string $url
 * @return void
 */
function redirect($url)
{
    // TODO: Implementasikan redirect()
    // header('Location: ' . $url);
    // exit;
}

/**
 * Redirect back
 *
 * @return void
 */
function back()
{
    // TODO: Implementasikan back()
    // redirect($_SERVER['HTTP_REFERER'] ?? '/');
}

/**
 * Get asset URL
 *
 * @param string $path
 * @return string
 */
function asset($path)
{
    // TODO: Implementasikan asset()
    // return '/assets/' . ltrim($path, '/');
}

/**
 * BONUS: Get authenticated user
 *
 * @return array|null
 */
function auth()
{
    // TODO: Implementasikan auth()
    // return $_SESSION['user'] ?? null;
}

/**
 * BONUS: Check if user is authenticated
 *
 * @return bool
 */
function authenticated()
{
    // TODO: Implementasikan authenticated()
    // return isset($_SESSION['user']);
}

/**
 * BONUS: Check if user is guest
 *
 * @return bool
 */
function guest()
{
    // TODO: Implementasikan guest()
    // return !authenticated();
}
