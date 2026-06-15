# 🎓 TUGAS UJIAN SEMESTER - APLIKASI BLOG OOP MVC PDO

> **Mata Pelajaran**: Pemrograman Web Lanjut
> **Topik**: Object-Oriented Programming (OOP), MVC Architecture, PDO Database
> **Tenggat**: 14 Juli 2026

---

## 📋 DAFTAR ISI

1. [Deskripsi Tugas](#-deskripsi-tugas)
2. [Persyaratan Teknis](#-persyaratan-teknis)
3. [Struktur Folder](#-struktur-folder)
4. [Skema Database](#-skema-database)
5. [Fitur yang Harus Dibuat](#-fitur-yang-harus-dibuat)
6. [File yang Harus Dikerjakan](#-file-yang-harus-dikerjakan)
7. [Kriteria Penilaian](#-kriteria-penilaian)
8. [Checklist Keamanan](#-checklist-keamanan)
9. [Konsep OOP yang Harus Diterapkan](#-konsep-oop-yang-harus-diterapkan)
10. [Panduan Pengumpulan](#-panduan-pengumpulan)
11. [FAQ & Troubleshooting](#-faq--troubleshooting)
12. [Bonus Challenges](#-bonus-challenges)

---

## 🎯 DESKRIPSI TUGAS

Anda diminta untuk membangun sebuah **Aplikasi Blog Sederhana** dari nol menggunakan konsep **Object-Oriented Programming (OOP)**, arsitektur **Model-View-Controller (MVC)**, dan koneksi database menggunakan **PDO (PHP Data Objects)**.

**TIDAK BOLEH** menggunakan framework PHP apapun (Laravel, CodeIgniter, Symfony, dll). Semua kode harus ditulis manual untuk membuktikan pemahaman konsep.

Aplikasi harus memiliki:

- Sistem autentikasi lengkap (login, register, logout, forgot password)
- CRUD (Create, Read, Update, Delete) untuk Post/Blog
- Dashboard dengan statistik
- Halaman publik untuk menampilkan blog
- Keamanan yang memadai (CSRF, XSS, SQL Injection prevention)
- Tampilan modern menggunakan **Tailwind CSS**

---

## 🔧 PERSYARATAN TEKNIS

### Environment Minimum

PHP >= 8.0
MySQL >= 5.7 atau PostgreSQL >= 12
Apache/Nginx dengan mod_rewrite enabled
Composer (opsional, untuk autoloading jika ingin)

### Konfigurasi Apache (.htaccess)

File `.htaccess` di root sudah disediakan untuk redirect ke folder `public/`.

### Konfigurasi Database

1. Buat database baru: `ujian_semester`
2. Import skema SQL yang ada di folder `database/migrations/`
3. Copy file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database

---

## 📁 STRUKTUR FOLDER

tugas_ujian_semester/
├── .env.example # Konfigurasi environment
├── .htaccess # Redirect ke public/
├── README.md # Dokumentasi lengkap
│
├── app/
│ ├── Config/
│ │ ├── Database.php # Low Priority # Singleton PDO (TODO)
│ │ └── Env.php # Low Priority # Environment loader (TODO)
│ │
│ ├── Controllers/
│ │ ├── AuthController.php # Highest Priority # Auth lengkap (HARUS DI-IMPROVE)
│ │ ├── DashboardController.php # Medium Priority # Dashboard (TODO)
│ │ ├── HomeController.php # Medium Priority # Home publik (TODO)
│ │ └── PostController.php # Medium Priority # CRUD Posts (TODO)
│ │
│ ├── Core/
│ │ ├── Controller.php # Medium Priority # Base Controller (TODO)
│ │ ├── Model.php # Highest Priority # Base Model + Query Builder (TODO)
│ │ ├── Router.php # Highest Priority # HTTP Router dengan parameter dinamis (TODO)
│ │ └── View.php # BONUS: Template engine
│ │
│ ├── Helpers/
│ │ └── functions.php # BONUS: Helper functions
│ │
│ ├── Middleware/
│ │ ├── AuthMiddleware.php # Medium Priority # Cek login (TODO)
│ │ └── GuestMiddleware.php # Medium Priority # Cek guest (TODO)
│ │
│ ├── Models/
│ │ ├── PasswordReset.php # BONUS: Token reset
│ │ ├── Post.php # Medium Priority # Model Post (TODO)
│ │ └── User.php # Medium Priority # Model User (TODO)
│ │
│ └── Views/ # ✅ Sudah lengkap dengan Tailwind CSS
│ ├── auth/
│ │ ├── forgot-password.php
│ │ ├── login.php
│ │ ├── register.php
│ │ └── reset-password.php
│ ├── dashboard/
│ │ ├── index.php
│ │ └── profile.php
│ ├── home/
│ │ └── index.php
│ ├── layouts/
│ │ └── main.php
│ └── posts/
│ ├── create.php
│ ├── index.php
│ └── show.php
│
├── database/
│ ├── migrations/
│ │ └── 001_initial_schema.sql # ✅ Skema database lengkap
│ └── seeds/
│ └── UserSeeder.php # BONUS: Database seeder
│
├── public/
│ ├── .htaccess
│ ├── assets/ # Folder untuk CSS/JS/Images
│ └── index.php # ✅ Entry point (sudah ada)
│
├── routes/
│ └── web.php # Medium Priority # Definisikan semua route (TODO)
│
└── tests/ # Folder untuk unit test (BONUS)

**Keterangan:**

- Priority = Tingkat kesulitan: Low (rendah), Medium (sedang), Highest(paling penting)
- File yang sudah ada di folder berarti **view/layout sudah disediakan**, tapi controller/model-nya harus dibuat

---

## 🗄️ SKEMA DATABASE

### 1. Tabel `users`

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
    remember_token VARCHAR(255) DEFAULT NULL,
    email_verified_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### 2. Tabel `password_resets`

```sql
CREATE TABLE password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token_hash VARCHAR(255) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Tabel `posts`

```sql
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    featured_image VARCHAR(255) DEFAULT NULL,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### 4. Tabel `login_attempts` (untuk rate limiting)

```sql
CREATE TABLE login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    email VARCHAR(255),
    attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 5. Tabel `activity_logs` (bonus)

```sql
CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    action VARCHAR(50) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);
```

---

## ✨ FITUR YANG HARUS DIBUAT

### A. Autentikasi (AUTH) - **PRIORITAS TERTINGGI**

| Fitur           | Method | URL                       | Keterangan                         |
| --------------- | ------ | ------------------------- | ---------------------------------- |
| Login Form      | GET    | `/login`                  | Tampilkan form login               |
| Proses Login    | POST   | `/login`                  | Validasi, session, rate limiting   |
| Register Form   | GET    | `/register`               | Tampilkan form registrasi          |
| Proses Register | POST   | `/register`               | Validasi, hash password, insert DB |
| Logout          | POST   | `/logout`                 | Hapus session, redirect            |
| Forgot Password | GET    | `/forgot-password`        | Form email                         |
| Kirim Token     | POST   | `/forgot-password`        | Generate token, simulasi email     |
| Reset Password  | GET    | `/reset-password/{token}` | Form password baru                 |
| Proses Reset    | POST   | `/reset-password/{token}` | Validasi token, update password    |

**Validasi Registrasi:**

- Nama: required, min 3 karakter, max 100
- Email: required, format valid, unique di database
- Password: required, min 8 karakter, harus mengandung huruf besar, huruf kecil, dan angka
- Konfirmasi Password: harus sama dengan password

**Validasi Login:**

- Email: required, format valid
- Password: required
- Rate limiting: max 5x percobaan gagal per IP per 15 menit

### B. Dashboard

| Fitur         | Method | URL                  | Middleware |
| ------------- | ------ | -------------------- | ---------- |
| Dashboard     | GET    | `/dashboard`         | auth       |
| Profil        | GET    | `/dashboard/profile` | auth       |
| Update Profil | POST   | `/dashboard/profile` | auth       |

### C. Posts (CRUD)

| Fitur       | Method | URL                  | Middleware                         |
| ----------- | ------ | -------------------- | ---------------------------------- |
| List Posts  | GET    | `/posts`             | auth (opsional: publik bisa lihat) |
| Create Form | GET    | `/posts/create`      | auth                               |
| Store Post  | POST   | `/posts`             | auth                               |
| Show Post   | GET    | `/posts/{id}`        | - (publik)                         |
| Edit Form   | GET    | `/posts/{id}/edit`   | auth + owner                       |
| Update Post | POST   | `/posts/{id}`        | auth + owner                       |
| Delete Post | POST   | `/posts/{id}/delete` | auth + owner                       |

**Authorization:** Hanya pemilik post yang boleh edit/delete post miliknya.

### D. Halaman Publik

| Fitur   | Method   | URL        |
| ------- | -------- | ---------- |
| Home    | GET      | `/`        |
| About   | GET      | `/about`   |
| Contact | GET/POST | `/contact` |

---

## 📄 FILE YANG HARUS DIKERJAKAN

### Priority 1: Core System (WAJIB)

#### 1. `app/Config/Env.php`

**Tugas:** Buat class untuk membaca file `.env`

**Requirements:**

- Method static `load($path)` untuk membaca file `.env`
- Method static `get($key, $default = null)` untuk mengambil value
- Handle komentar (baris yang diawali `#`)
- Handle value dengan tanda petik
- Handle value kosong
- Trim whitespace
- Simpan ke `$_ENV` dan `$_SERVER`

**Hint:**

```php
// Gunakan file() untuk membaca file per baris
// Gunakan explode('=', $line, 2) untuk memisahkan key dan value
// Gunakan trim() untuk membersihkan whitespace
```

### 2. `app/Config/Database.php`

**Tugas:** Buat class Database menggunakan PDO dengan Singleton Pattern

**Requirements:**

- Gunakan PDO untuk koneksi ke MySQL/PostgreSQL
- Implementasikan Singleton Pattern (hanya 1 instance database)
- Method static `getInstance()` untuk mengambil instance
- Method `getConnection()` untuk mengambil PDO connection
- Handle error dengan try-catch
- Set PDO error mode ke `PDO::ERRMODE_EXCEPTION`
- Set charset sesuai konfigurasi .env

**Bonus:** Implementasikan method `query()`, `prepare()`, dan `lastInsertId()`

**Hint:**

```php
private static $instance = null;
private $connection;

private function __construct() {
    // Ambil konfigurasi dari Env::get()
    // Buat koneksi PDO dengan try-catch
}

public static function getInstance() {
    if (self::$instance === null) {
        self::$instance = new self();
    }
    return self::$instance;
}
```

### 3. `app/Core/Router.php`

**Tugas:** Buat Router sederhana yang menangani routing HTTP

**Requirements:**

- Method `get($route, $callback, $middleware = [])` - handle GET request
- Method `post($route, $callback, $middleware = [])` - handle POST request
- Method `put($route, $callback, $middleware = [])` - handle PUT request
- Method `delete($route, $callback, $middleware = [])` - handle DELETE request
- Method `dispatch()` - proses request dan jalankan callback
- Support parameter dinamis: `/user/{id}`
- Support middleware pada route
- Handle 404 Not Found

**Bonus:** Implementasikan named routes dan route groups

**Hint untuk dispatch():**

```php
    Ambil REQUEST_URI dan REQUEST_METHOD
    Parse URL untuk menghilangkan query string
    Loop routes untuk mencocokkan pattern
    Jika cocok, ekstrak parameter dan jalankan callback
    Jika tidak cocok, return 404
```

**Hint untuk parameter dinamis:**

```php
    Convert /user/{id} ke regex: #^/user/([a-zA-Z0-9_-]+)$#
    Gunakan preg_match() untuk matching
```

### 4. `app/Core/Model.php`

**Tugas:** Buat Abstract Base Model untuk semua model

**Requirements:**

- Abstract class yang menggunakan PDO dari Database singleton
- Property protected `$table` dan `$primaryKey`
- Method `find($id)` - cari berdasarkan primary key
- Method `all()` - ambil semua data
- Method `where($column, $value)` - query dengan WHERE (support chaining)
- Method `create($data)` - insert data
- Method `update($id, $data)` - update data
- Method `delete($id)` - hapus data
- Method `first()` - ambil data pertama
- Method `get()` - eksekusi query dan return hasil

**Bonus:** Implementasikan query builder sederhana (select, where, orderBy, limit)

**Hint:**

```php
protected $query = '';
protected $bindings = [];
protected $whereAdded = false;

// Method where() harus bisa chaining:
// $model->where('a', 1)->where('b', 2)->get()

// Gunakan PDO prepare() dan execute() untuk keamanan SQL Injection
```

### 5. `app/Core/Controller.php`

**Tugas:** Buat Base Controller yang akan di-extend oleh semua controller

**Requirements:**

- Method `view($view, $data = [])` - render view dengan data
- Method `redirect($url)` - redirect ke URL lain
- Method `json($data, $statusCode = 200)` - return JSON response
- Method `validate($rules, $data)` - validasi input sederhana
- Method `session($key, $value = null)` - getter/setter session
- Method `flash($key, $value = null)` - flash message
- Method `csrf()` - generate CSRF token
- Method `verifyCsrf($token)` - verifikasi CSRF token

**Bonus:** Implementasikan method `middleware()` untuk menjalankan middleware

**Hint:**

```php
// view(): extract($data); require $viewPath . $view . '.php';
// redirect(): header('Location: ' . $url); exit;
// json(): header('Content-Type: application/json'); echo json_encode($data);
// validate(): loop $rules, check required, email, min, max, numeric, dll
// csrf(): $_SESSION['_token'] = bin2hex(random_bytes(32));
```

---

### Priority 2: Controllers

#### 6. `app/Controllers/AuthController.php`

**TUGAS: IMPROVE AuthController ini! Ini adalah bagian TERPENTING.**

**Requirements Wajib:**

**A. Registrasi User dengan Validasi:**

- Nama: required, min 3 karakter, max 100
- Email: required, format email valid, unique
- Password: required, min 8 karakter, harus mengandung huruf besar, huruf kecil, dan angka
- Konfirmasi Password: harus sama dengan password

**B. Login dengan Keamanan:**

- Validasi email dan password
- Rate limiting (maksimal 5x percobaan login gagal per IP per 15 menit)
- Session management yang aman
- Remember me functionality (optional)

**C. Logout yang Aman:**

- Hapus session
- Hapus cookie remember me
- Regenerate session ID

**D. Forgot Password:**

- Kirim email dengan token reset (simulasi dengan log file)
- Token expired dalam 1 jam
- Validasi password baru

**E. Middleware Check:**

- Redirect ke login jika belum login
- Redirect ke dashboard jika sudah login

**Bonus:**

- Implementasi OAuth (Google/GitHub) dengan konsep **Strategy Pattern**
- Two-Factor Authentication (2FA) dengan TOTP
- Activity logging (log semua aktivitas login/logout)
- Account lockout setelah 5x gagal login

**Hint Keamanan:**

- Selalu gunakan `password_hash()` untuk hashing
- Selalu gunakan `password_verify()` untuk verifikasi
- Selalu regenerate session ID setelah login
- Gunakan prepared statements untuk query database
- Escape output untuk mencegah XSS
- Rate limiting: simpan failed attempts di session atau database
- Token reset: simpan **hash token** di DB, jangan plaintext

---

#### 7. `app/Controllers/PostController.php`

**Tugas:** Buat PostController dengan CRUD lengkap

**Requirements:**

1. `index()` - tampilkan semua post (dengan pagination)
2. `show($id)` - tampilkan detail post
3. `create()` - tampilkan form tambah post
4. `store()` - proses tambah post
5. `edit($id)` - tampilkan form edit post
6. `update($id)` - proses update post
7. `delete($id)` - proses hapus post
8. Implementasikan **authorization** (hanya pemilik post yang bisa edit/delete)

**Bonus:**

- Implementasikan soft delete
- Implementasikan search dan filter
- Implementasikan sorting
- Upload gambar untuk post

---

#### 8. `app/Controllers/DashboardController.php`

**Tugas:** Buat DashboardController yang menampilkan data dashboard

**Requirements:**

1. `index()` - tampilkan dashboard dengan statistik
2. `profile()` - tampilkan dan edit profil user
3. `updateProfile()` - proses update profil
4. Gunakan middleware auth untuk semua method

**Bonus:** Implementasikan API endpoint untuk data dashboard (JSON)

---

#### 9. `app/Controllers/HomeController.php`

**Tugas:** Buat HomeController untuk halaman publik

**Requirements:**

1. `index()` - tampilkan halaman home dengan daftar post terbaru
2. `about()` - tampilkan halaman about
3. `contact()` - tampilkan dan proses form contact

**Bonus:** Implementasikan caching untuk halaman home

---

### Priority 3: Models

#### 10. `app/Models/User.php`

**Tugas:** Buat Model User yang lengkap

**Requirements:**

1. Extend dari `App\Core\Model`
2. Property `$table = 'users'`
3. `findByEmail($email)` - cari user berdasarkan email
4. `create($data)` - override create untuk hash password otomatis
5. `updatePassword($id, $password)` - update password dengan hash
6. `verifyPassword($password, $hash)` - verifikasi password
7. `generateToken($userId, $type)` - generate token reset password
8. `findByToken($token, $type)` - cari user berdasarkan token
9. `deleteToken($userId, $type)` - hapus token

**Bonus:**

- Implementasikan relationship dengan Post (hasMany)
- Implementasikan scopes (active, verified, dll)
- Implementasikan accessor/mutator

**Hint:**

```php
// findByEmail: SELECT * FROM users WHERE email = ?
// create: hash password dengan password_hash() sebelum insert
// generateToken: buat token random, simpan hash-nya di DB, return plaintext token
// findByToken: SELECT * FROM users WHERE reset_token_hash = ? AND reset_token_expires_at > NOW()
```

11. app/Models/Post.php

**Tugas:** Buat Model Post yang lengkap

**Requirements:**

1. Extend dari `App\Core\Model`
2. Property `$table = 'posts'`
3. `getByUser($userId)` - ambil post berdasarkan user
4. `getPublished()` - ambil post yang status = published
5. `search($keyword)` - cari post berdasarkan keyword
6. `getWithUser($id)` - ambil post dengan data user (JOIN)
7. `getLatest($limit = 5)` - ambil post terbaru
8. `getPaginated($page, $perPage)` - ambil post dengan pagination

**Bonus:**

- Implementasikan soft delete (deleted_at column)
- Implementasikan relationship dengan User (belongsTo)
- Implementasikan tags relationship (many-to-many)

**Hint:**

```php
// getByUser: SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC
// getPublished: SELECT * FROM posts WHERE status = 'published' AND published_at <= NOW()
// search: SELECT * FROM posts WHERE title LIKE ? OR content LIKE ?
// getWithUser: SELECT posts.*, users.name, users.email FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?
// getPaginated: SELECT * FROM posts LIMIT ? OFFSET ?
```

---

### Priority 4: Routes & Middleware

#### 12. `routes/web.php`

**Tugas:** Definisikan semua route aplikasi

**Route Publik (tidak perlu login):**

- `GET /` -> `HomeController@index`
- `GET /about` -> `HomeController@about`
- `GET /contact` -> `HomeController@contact`
- `POST /contact` -> `HomeController@contact`

**Route Autentikasi:**

- `GET /login` -> `AuthController@showLogin`
- `POST /login` -> `AuthController@login`
- `GET /register` -> `AuthController@showRegister`
- `POST /register` -> `AuthController@register`
- `POST /logout` -> `AuthController@logout`
- `GET /forgot-password` -> `AuthController@showForgotPassword`
- `POST /forgot-password` -> `AuthController@forgotPassword`
- `GET /reset-password/{token}` -> `AuthController@showResetPassword`
- `POST /reset-password/{token}` -> `AuthController@resetPassword`

**Route dengan Middleware Auth:**

- `GET /dashboard` -> `DashboardController@index`
- `GET /dashboard/profile` -> `DashboardController@profile`
- `POST /dashboard/profile` -> `DashboardController@updateProfile`

**Route CRUD Posts (dengan Middleware Auth):**

- `GET /posts` -> `PostController@index`
- `GET /posts/create` -> `PostController@create`
- `POST /posts` -> `PostController@store`
- `GET /posts/{id}` -> `PostController@show`
- `GET /posts/{id}/edit` -> `PostController@edit`
- `POST /posts/{id}` -> `PostController@update`
- `POST /posts/{id}/delete` -> `PostController@delete`

**Hint:**

- Gunakan closure atau array `[ClassName::class, 'methodName']` untuk callback
- Parameter dinamis: `{id}` akan di-capture sebagai parameter method
- Middleware: tambahkan parameter ke-3 sebagai array middleware
- Untuk PUT/DELETE: gunakan method spoofing dengan `_method` di form

---

#### 13. `app/Middleware/AuthMiddleware.php`

**Tugas:** Buat middleware untuk memeriksa autentikasi

**Requirements:**

- Method `handle()` - cek apakah user sudah login
- Jika belum login, redirect ke `/login`
- Jika sudah login, lanjutkan ke request berikutnya
- Support redirect back setelah login (simpan intended URL di session)

**Bonus:** Implementasikan role-based middleware (admin, user, dll)

---

#### 14. `app/Middleware/GuestMiddleware.php`

**Tugas:** Buat middleware untuk memeriksa guest (belum login)

**Requirements:**

- Method `handle()` - cek apakah user BELUM login
- Jika sudah login, redirect ke `/dashboard`
- Jika belum login, lanjutkan ke request berikutnya
- Gunakan middleware ini untuk route login dan register agar user yang sudah login tidak bisa akses halaman login lagi

---

## 🔒 CHECKLIST KEAMANAN WAJIB

- [ ] **Password Hashing**: Gunakan `password_hash()` dan `password_verify()`
- [ ] **CSRF Protection**: Token di setiap form POST/PUT/DELETE
- [ ] **XSS Prevention**: `htmlspecialchars()` saat output ke browser
- [ ] **SQL Injection**: Gunakan PDO prepared statements (JANGAN concat string SQL)
- [ ] **Session Security**: `session_regenerate_id()` setelah login
- [ ] **Rate Limiting**: Max 5x login gagal per IP per 15 menit, untuk pengetesan jangan menggunakan limit terlebih dahulu
- [ ] **Token Security**: Hash token reset password di database, jangan simpan plaintext
- [ ] **Input Validation**: Validasi semua input user sebelum diproses
- [ ] **Authorization**: Cek ownership sebelum edit/delete data
- [ ] **Error Handling**: Jangan expose error detail ke user (gunakan generic message)

---

## 🏗️ KONSEP OOP YANG HARUS DITERAPKAN

| Konsep                   | Implementasi                                | Contoh                                              |
| ------------------------ | ------------------------------------------- | --------------------------------------------------- |
| **Encapsulation**        | Private/protected properties, getter/setter | `$db` private di Model                              |
| **Inheritance**          | Child extends parent                        | `User extends Model`                                |
| **Polymorphism**         | Override methods di child class             | `User::create()` override `Model::create()`         |
| **Abstraction**          | Abstract class                              | `abstract class Model`, `abstract class Controller` |
| **Singleton**            | Hanya 1 instance                            | `Database::getInstance()`                           |
| **Dependency Injection** | (Bonus) Inject model ke controller          | `__construct(User $userModel)`                      |
| **Strategy Pattern**     | (Bonus) OAuth providers                     | `GoogleAuthStrategy`, `GithubAuthStrategy`          |

---

## 📤 PANDUAN PENGUMPULAN

### Format Pengumpulan

1. **ZIP file** dengan nama: `NIM_Nama_Lengkap_UjianSemester.zip`
2. **Database dump** (`.sql`) disertakan di folder `database/`
3. **Screenshot** aplikasi yang berjalan (minimal 5 screenshot)
4. **Video demo** (opsional, max 2 menit) - nilai tambah

---

## ❓ FAQ & TROUBLESHOOTING

### Q: Kenapa muncul error "Class not found"?

**A:** Pastikan autoloading di `public/index.php` sudah benar. Gunakan `spl_autoload_register()` dengan namespace yang sesuai.

### Q: Kenapa route tidak berfungsi (404)?

**A:** Cek:

1. Apache mod_rewrite sudah aktif
2. File `.htaccess` ada di root dan folder `public/`
3. AllowOverride di httpd.conf sudah di-set ke `All`

### Q: Bagaimana cara test tanpa browser?

**A:** Gunakan Postman atau cURL untuk test API endpoint. Contoh:

```bash
curl -X POST http://localhost/login -d "email=test@test.com&password=123456"
```

### Q: Password hash tidak berfungsi?

**A:** Pastikan:

1. Menggunakan `password_hash($password, PASSWORD_BCRYPT)`
2. Verifikasi dengan `password_verify($input, $hash)`
3. Kolom database cukup besar (VARCHAR 255)

### Q: CSRF token selalu invalid?

**A:** Pastikan:

1. Token di-generate di session saat load form
2. Token di-include di form sebagai hidden input
3. Token diverifikasi saat submit
4. Token di-regenerate setelah validasi (one-time use)

### Q: Tailwind CSS tidak berfungsi?

**A:** Pastikan:

1. CDN link ada di layout: `https://cdn.tailwindcss.com`
2. Tidak ada adblocker yang memblokir CDN
3. Koneksi internet aktif (Tailwind CDN online)

---

## 🚀 BONUS CHALLENGES (Poin Tambahan)

| Challenge              | Deskripsi                                                         |
| ---------------------- | ----------------------------------------------------------------- |
| **Query Builder**      | Method chaining: `$model->where()->orderBy()->get()`              |
| **Template Engine**    | Layout system dengan `yield`, `section`, `extend`                 |
| **Soft Delete**        | Kolom `deleted_at`, method `withTrashed()`, `restore()`           |
| **API JSON**           | Endpoint `/api/posts`, `/api/users` dengan proper JSON response   |
| **OAuth Strategy**     | Pattern Strategy untuk Google/GitHub login                        |
| **2FA dengan TOTP**    | Google Authenticator integration                                  |
| **File Upload**        | Upload avatar/gambar post dengan validasi (type, size, dimension) |
| **Unit Testing**       | PHPUnit tests untuk model dan controller                          |
| **Email Integration**  | Kirim email real menggunakan PHPMailer/SwiftMailer                |
| **Database Migration** | Sistem migration seperti Laravel (up/down)                        |
| **Caching**            | File-based caching untuk query yang sering dijalankan             |
| **Search Engine**      | Full-text search dengan MySQL MATCH AGAINST                       |

---

## 💡 TIPS DAN TRIK

### 1. Mulai dari Core System

Kerjakan dalam urutan: **Env → Database → Model → Controller → Router → Middleware → Controllers → Routes**

### 2. Test Incremental

Setiap kali selesai 1 file, test sebelum lanjut ke file berikutnya. Jangan tunggu semua selesai baru test.

### 3. Gunakan var_dump() untuk Debug

```php
var_dump($data); die(); // Quick debug
```

### 4. Error Logging

```php
error_log($message); // Simpan error ke log file
```

### 5. Gunakan Git (Opsional tapi Direkomendasikan)

```bash
git init
git add .
git commit -m "feat: implementasi router"
```

⚠️ LARANGAN

- TIDAK BOLEH menggunakan framework PHP (Laravel, CodeIgniter, Symfony, dll)
- TIDAK BOLEH menggunakan ORM (Eloquent, Doctrine, dll)
- TIDAK BOLEH menggunakan query builder library
- TIDAK BOLEH menggunakan template engine library (Blade, Twig, dll)
- TIDAK BOLEH copy-paste kode dari internet tanpa pemahaman
- TIDAK BOLEH menggunakan mysql\_\* functions (deprecated)
- TIDAK BOLEH menyimpan password dalam plaintext
- TIDAK BOLEH menyimpan token dalam plaintext
