# Dokumentasi Perubahan — Sarana Berbagi

Tanggal: 31 Agustus 2026

## Ringkasan

Dokumen ini merangkum seluruh perubahan sejak commit `b8a4019` (Refactor Code):
perbaikan setup dependency, pemulihan route halaman publik, dan fitur baru
halaman **Berita** (`/berita`).

---

## 1. Perbaikan Dependency (Composer)

**File:** `fullstack/composer.json`, `fullstack/composer.lock`

- Ubah constraint `filament/filament` dari `4.0` (versi terkunci) menjadi `^4.0`.
  - Alasan: Composer 2.9 memblokir instalasi karena 4 security advisory pada
    Filament 4.0.0 (MFA recovery code reuse, timing-based user enumeration,
    unauthorized file upload pada auth page). Semua sudah di-patch di 4.11.5+.
  - Sekarang terpasang Filament 4.12.x (bebas advisory keamanan).
- Jalankan ulang `composer update` agar dependency kompatibel dengan PHP 8.3
  (lock file lama dibuat dengan PHP 8.4 — paket Symfony terkunci di versi yang
  butuh PHP >= 8.4.1).

## 2. Pemulihan Route Halaman Publik

**File:** `fullstack/routes/web.php`

Commit "Refactor Code" sebelumnya menghapus semua route publik dan menggantinya
dengan redirect ke `/auth/login`. Route dipulihkan sesuai versi asli:

- `GET /` — halaman Home / Tentang Kami (`resources/views/app.blade.php`)
- `GET /program` — halaman Program
- `GET /kabar` — halaman Kabar
- `GET /karir` — halaman Karir
- `GET /digital-collaborators` — halaman Digital Collaborators
- `GET /donasi` + `POST /donasi/step2|step3|konfirmasi` — alur donasi 4 langkah
  (`DonasiController`, nama route: `donasi.step1` s.d. `donasi.konfirmasi`)
- Catch-all: URL tidak dikenal diarahkan ke Home
- **Baru:** `GET /berita` — lihat bagian 4

**File:** `fullstack/public/img/` (9 file dipulihkan dari git history)

- `PROPERTY (2).png` (logo), `photo_4_2026-04-10_15-51-29.jpg` (foto hero),
  `banner-karir.png`, dan 6 gambar metode pembayaran di `img/donasi/`
  (bni, bri, bsi, mandiri, muamalat, QR-CODE). File-file ini ikut terhapus
  saat refactor; semua view merujuk ke sana.

## 3. Login & Akun Admin

- Panel admin tetap di `/berbagi` (Filament), login via `/auth/login`
  (panel `auth`), register via `/auth/register`.
- `DatabaseSeeder` kini juga memanggil `BeritaSeeder`.

> Catatan: akun admin dibuat manual di environment lokal
> (`admin@saranaberbagi.test`) dan TIDAK ikut ter-commit.

## 4. Fitur Baru: Halaman Berita (`/berita`)

Halaman baru yang menggabungkan desain dari `frontend_backup/code.html`
dengan konten dinamis dari database.

**File baru:**

- `fullstack/app/Http/Controllers/BeritaController.php`
  - Query post `type=news` (Kabar Terbaru) dan `type=blog` (Blog & Edukasi),
    hanya `status=published`, urut `published_at` terbaru.
  - Dukungan pencarian via `?q=` (judul & konten).
  - Menyiapkan data popup detail artikel (render `berita/_popup`).
- `fullstack/resources/views/berita.blade.php`
  - Hero "Wawasan & Inspirasi" + search bar (dari code.html).
  - Section "Kabar Terbaru": grid kartu berita.
  - Section "Blog & Edukasi" (dari code.html): featured card horizontal +
    grid 3 kolom + filter tag pills interaktif.
  - Popup detail artikel dengan CTA Donasi (pola sama dengan halaman Kabar).
  - Navbar & footer identik dengan halaman publik lain.
- `fullstack/resources/views/berita/_popup.blade.php`
  - Template isi popup detail artikel.
- `fullstack/database/seeders/BeritaSeeder.php`
  - Data contoh: 5 kategori konten, 5 tag, 3 post `news`, 4 post `blog`.
- `frontend_backup/code.html`
  - File desain sumber halaman Berita (referensi).

**File yang dimodifikasi (navbar):**

Link **Berita** ditambahkan di navbar semua halaman publik:
`app.blade.php`, `program.blade.php`, `kabar.blade.php`,
`karir/index.blade.php`, `digital-collaborators/index.blade.php`,
serta 4 halaman donasi (`step1`, `step2`, `step3`, `konfirmasi`).

## 5. Asset Filament (publish ulang)

**File:** `fullstack/public/js/filament/**`, `fullstack/public/css/filament/**`,
`fullstack/public/fonts/filament/**`

Hasil `php artisan filament:upgrade` setelah upgrade Filament 4.0 → 4.12.x.

---

## Cara Menjalankan

```bash
cd fullstack
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Buka `http://127.0.0.1:8000` (Home) atau `/berita` (Berita),
`/auth/login` untuk masuk ke panel admin `/berbagi`.
