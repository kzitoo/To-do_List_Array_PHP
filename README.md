# ✅ To-do List Array PHP

Aplikasi **To-do List** berbasis web yang dibangun menggunakan **PHP** dengan penyimpanan data menggunakan **Session Array**. Dilengkapi tampilan modern menggunakan Bootstrap dan fitur-fitur manajemen tugas yang lengkap.

---

## ✨ Fitur

- **Tambah Tugas** — Input nama tugas, tingkat prioritas, dan tenggat waktu
- **Hapus Tugas** — Hapus tugas dengan konfirmasi dialog (SweetAlert2)
- **Edit Tugas** — Ubah detail tugas yang sudah dibuat
- **Tandai Selesai** — Centang tugas yang telah diselesaikan
- **Prioritas Tugas** — Tiga level prioritas dengan warna berbeda (Tinggi, Sedang, Rendah)
- **Status Tenggat** — Badge otomatis untuk menandai tugas yang mendekati atau melewati tenggat
- **Urutkan Tugas** — Pengurutan tugas berdasarkan kriteria tertentu
- **Notifikasi Alert** — Feedback visual menggunakan SweetAlert2

---

## 🖥️ Tampilan

| Fitur | Keterangan |
|-------|------------|
| 🔴 Prioritas Tinggi | Badge merah |
| 🟡 Prioritas Sedang | Badge kuning |
| 🔵 Prioritas Rendah | Badge biru |
| ~~Tugas Selesai~~ | Teks dicoret, warna hijau |

---

## 🚀 Cara Menjalankan

### Prasyarat
- **PHP 7.4** atau lebih baru
- **Web server** lokal: [XAMPP](https://www.apachefriends.org/), [Laragon](https://laragon.org/), atau sejenisnya

### Langkah-langkah

1. Clone repository ini ke folder `htdocs` (XAMPP) atau `www` (Laragon):
   ```bash
   git clone https://github.com/kzitoo/To-do_List_Array_PHP.git
   ```

2. Jalankan Apache melalui XAMPP/Laragon.

3. Buka browser dan akses:
   ```
   http://localhost/To-do_List_Array_PHP/
   ```

---

## 📁 Struktur File

| File | Deskripsi |
|------|-----------|
| `index.php` | Halaman utama, menampilkan daftar tugas |
| `tambah_tugas.php` | Proses penambahan tugas baru |
| `hapus_tugas.php` | Proses penghapusan tugas |
| `edit_tugas.php` | Form dan proses edit tugas |
| `selesai_tugas.php` | Proses menandai tugas sebagai selesai |
| `urutkan.php` | Logika pengurutan tugas |
| `functions.php` | Fungsi-fungsi pembantu (helper) |
| `alert.php` | Notifikasi SweetAlert2 |
| `style.css` | Custom styling tampilan |

---

## 🛠️ Teknologi

| Teknologi | Keterangan |
|-----------|------------|
| PHP | Backend & logika aplikasi (95.5%) |
| CSS | Custom styling (4.5%) |
| Bootstrap 5 | Framework CSS untuk UI responsif |
| Font Awesome 6 | Ikon antarmuka |
| SweetAlert2 | Dialog konfirmasi & notifikasi |
| Google Fonts (Montserrat) | Tipografi |
| PHP Session | Penyimpanan data tugas (Array) |

---

## 👨‍💻 Developer

Dibuat oleh **[Evan Oktavianus](https://github.com/kzitoo)**
