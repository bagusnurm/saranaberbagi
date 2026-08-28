# Frontend (placeholder)

Instruksi singkat integrasi dengan Laravel backend:

- Bangun (build) frontend ke `frontend/dist`.
- Buat symlink (atau salin) `frontend/dist` ke `backend/public/frontend` agar dapat diakses oleh Laravel.

Contoh perintah (Windows PowerShell):

```powershell
Remove-Item -Force -Recurse backend\public\frontend
New-Item -ItemType SymbolicLink -Path backend\public\frontend -Target frontend\dist
```

Jika mau, saya bisa otomatis membuat symlink dan/atau konfigurasi build setelah Anda memberi tahu framework frontend yang dipakai.

Catatan untuk integrasi Laravel:

- Tampilan frontend sekarang disajikan oleh Laravel di rute root. Tampilan Blade ada di `backend/resources/views/app.blade.php`.
- Tempatkan aset frontend yang dibangun di bawah `frontend/dist` dan kemudian salin atau symlink ke `backend/public/frontend` agar tersedia di `/frontend/`.
- Logo proyek `frontend/img/sarana_berbagi_logo.png` telah disalin ke `backend/public/img/sarana_berbagi_logo.png` dan dirujuk oleh tampilan Blade.

Contoh PowerShell untuk membuat symlink ke frontend yang dibangun:

```powershell
Remove-Item -Force -Recurse backend\public\frontend
New-Item -ItemType SymbolicLink -Path backend\public\frontend -Target frontend\dist
```
Atau cukup salin isi `frontend/dist` ke `backend/public/frontend`.

Jika mau, saya bisa otomatis membuat symlink dan/atau konfigurasi build setelah Anda memberi tahu framework frontend yang dipakai.
