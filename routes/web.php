<?php

/**
 * TUGAS: Definisikan semua route aplikasi di sini
 *
 * REQUIREMENTS:
 * 1. Route publik (tidak perlu login):
 *    - GET /           -> HomeController@index
 *    - GET /about      -> HomeController@about
 *    - GET /contact    -> HomeController@contact
 *    - POST /contact   -> HomeController@contact
 *
 * 2. Route autentikasi:
 *    - GET /login              -> AuthController@showLogin
 *    - POST /login             -> AuthController@login
 *    - GET /register           -> AuthController@showRegister
 *    - POST /register          -> AuthController@register
 *    - POST /logout            -> AuthController@logout
 *    - GET /forgot-password    -> AuthController@showForgotPassword
 *    - POST /forgot-password   -> AuthController@forgotPassword
 *    - GET /reset-password/{token}  -> AuthController@showResetPassword
 *    - POST /reset-password/{token} -> AuthController@resetPassword
 *
 * 3. Route yang memerlukan autentikasi (gunakan middleware):
 *    - GET /dashboard          -> DashboardController@index
 *    - GET /dashboard/profile  -> DashboardController@profile
 *    - POST /dashboard/profile -> DashboardController@updateProfile
 *
 * 4. Route CRUD Post (memerlukan autentikasi):
 *    - GET /posts              -> PostController@index
 *    - GET /posts/create       -> PostController@create
 *    - POST /posts             -> PostController@store
 *    - GET /posts/{id}         -> PostController@show
 *    - GET /posts/{id}/edit    -> PostController@edit
 *    - POST /posts/{id}        -> PostController@update  (gunakan PUT jika bisa)
 *    - POST /posts/{id}/delete -> PostController@delete  (gunakan DELETE jika bisa)
 *
 * BONUS:
 * - Implementasikan route group untuk middleware
 * - Implementasikan named routes
 * - Implementasikan route untuk API (prefix /api)
 */

use App\Core\Router;

/** @var Router $router */

// === ROUTE PUBLIK ===
// TODO: Definisikan route publik di sini

// $router->get('/', [App\Controllers\HomeController::class, 'index']);
// $router->get('/about', [App\Controllers\HomeController::class, 'about']);
// $router->get('/contact', [App\Controllers\HomeController::class, 'contact']);
// $router->post('/contact', [App\Controllers\HomeController::class, 'contact']);

// === ROUTE AUTENTIKASI ===
// TODO: Definisikan route autentikasi di sini

// $router->get('/login', [App\Controllers\AuthController::class, 'showLogin']);
// $router->post('/login', [App\Controllers\AuthController::class, 'login']);
// $router->get('/register', [App\Controllers\AuthController::class, 'showRegister']);
// $router->post('/register', [App\Controllers\AuthController::class, 'register']);
// $router->post('/logout', [App\Controllers\AuthController::class, 'logout']);
// $router->get('/forgot-password', [App\Controllers\AuthController::class, 'showForgotPassword']);
// $router->post('/forgot-password', [App\Controllers\AuthController::class, 'forgotPassword']);
// $router->get('/reset-password/{token}', [App\Controllers\AuthController::class, 'showResetPassword']);
// $router->post('/reset-password/{token}', [App\Controllers\AuthController::class, 'resetPassword']);

// === ROUTE DASHBOARD (MEMERLUKAN AUTH) ===
// TODO: Definisikan route dashboard dengan middleware auth

// $router->get('/dashboard', [App\Controllers\DashboardController::class, 'index'], ['auth']);
// $router->get('/dashboard/profile', [App\Controllers\DashboardController::class, 'profile'], ['auth']);
// $router->post('/dashboard/profile', [App\Controllers\DashboardController::class, 'updateProfile'], ['auth']);

// === ROUTE POSTS CRUD (MEMERLUKAN AUTH) ===
// TODO: Definisikan route CRUD posts dengan middleware auth

// $router->get('/posts', [App\Controllers\PostController::class, 'index'], ['auth']);
// $router->get('/posts/create', [App\Controllers\PostController::class, 'create'], ['auth']);
// $router->post('/posts', [App\Controllers\PostController::class, 'store'], ['auth']);
// $router->get('/posts/{id}', [App\Controllers\PostController::class, 'show']);
// $router->get('/posts/{id}/edit', [App\Controllers\PostController::class, 'edit'], ['auth']);
// $router->post('/posts/{id}', [App\Controllers\PostController::class, 'update'], ['auth']);
// $router->post('/posts/{id}/delete', [App\Controllers\PostController::class, 'delete'], ['auth']);

/**
 * HINT:
 * - Gunakan closure atau array [ClassName::class, 'methodName'] untuk callback
 * - Parameter dinamis: {id} akan di-capture sebagai parameter method
 * - Middleware: tambahkan parameter ke-3 sebagai array middleware
 * - Untuk PUT/DELETE: gunakan method spoofing dengan _method di form
 */
