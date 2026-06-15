## ✅ Checklist Sprint 1

### Environment & Database

- [ ] `Env::load()` berhasil membaca file `.env`
- [ ] `Database::getInstance()` mengembalikan koneksi PDO yang valid

### Model

- [ ] `Model::find(1)` mengembalikan data berdasarkan ID
- [ ] `Model::all()` mengembalikan seluruh data dari database

### Controller & View

- [ ] `Controller::view('home.index', ['title' => 'Home'])` berhasil me-render view

### Routing

- [ ] `Router::get('/', [HomeController::class, 'index'])` berfungsi dengan baik

### Pengujian Halaman

- [ ] `http://localhost/` menampilkan halaman Home
- [ ] `http://localhost/about` menampilkan halaman About
- [ ] `http://localhost/contact` menampilkan halaman Contact

### Validasi Akhir

- [ ] Tidak ada error fatal pada browser
