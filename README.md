# Inventaris.Barang.io 

**License:** CodeIgniter Bootstrap / MIT

## Deskripsi Produk

Inventaris.Barang.io adalah boilerplate aplikasi web berbasis **PHP** yang disesuaikan untuk sistem inventaris sederhana . Dirancang untuk membantu mahasiswa atau developer cepat membuat prototype tugas akhir atau aplikasi inventaris berlaku di lingkungan kampus/organisasi.

Dengan ini Anda bisa fokus ke fitur inti — penambahan barang, peminjaman, pengembalian, laporan — tanpa harus menulis konfigurasi dasar dan autentikasi dari nol.

---

## 🚀 Fitur Utama

1. **Arsitektur Modern & Struktur Terorganisir**

   * Struktur yang memudahkan pengembangan dan deployment

2. **Autentikasi**

   * Login
   * Role `admin` 
   * Session

3. **CRUD Inventaris (Barang)**

   * Tambah / ubah / hapus / lihat barang
   * Validasi form terintegrasi
   * Upload foto barang (opsional)

4. **Transaksi Peminjaman & Pengembalian**

   * Modul peminjaman barang
   * Modul pengembalian & status barang
   * Riwayat transaksi

5. **Desain Responsif**

   * Bootstrap 5
   * Layout yang bersih, modern, dan responsif
   * Font Awesome untuk ikon

---

## 🛠️ Prasyarat

* PHP 8.1+ (direkomendasikan)
* MySQL / MariaDB
* Web server (Apache / Nginx) atau built-in server (`php spark serve`)

---

## Langkah Instalasi

1. Clone repository

```bash
git clone https://github.com/hidaist/Inventaris.Barang.io.git
cd Inventaris.Barang.io
```


2. Buat database 

```
Berada di Folder database  import => inventaris.sql
```

3. Jalankan server

```
start (rekomendasi pakai Laragon => user friendly)
```

4. Buka aplikasi di browser: `http://localhost` (atau port yang tertera)

---

## 👤 Akun Demo (default)

* **Admin**

  * Username: `admin`
  * Password: `admin`

> (Silakan ubah password setelah instalasi atau gunakan seeders untuk menyesuaikan akun)

---

## 📁 Struktur Proyek (ringkasan)

```
admstr/
├─ control/
│  ├─ barang.control.php
│  ├─ barangKembali.control.php
│  ├─ controlfile.php
│  ├─ pinjamBarang.control.php
│  ├─ ruang.control.php
│  └─ useradmin.control.php
├─ forms/
│  ├─ barang.forms.php
│  ├─ barangKembali.forms.php
│  ├─ forms.file.php
│  ├─ pinjamBarang.forms.php
│  ├─ ruang.forms.php
│  └─ useradmin.forms.php
├─ grafik/
│  ├─ grapich5tahunan.php
│  ├─ grapichkondisiasset.php
│  ├─ grapichtahunan.php
│  └─ grapichunion.php
├─ images/
│  ├─ file image
│  └─ file image
├─ librari/
│  └─ inc.koneksi.php
└─ lightbox/
|  └─ file2 source pendukung
└─ view/
   ├─ barang.views.php
   ├─ barangBaikDetail.views.php
   ├─ barangDetail.views.php
   ├─ barangRusakBeratDetail.views.php
   ├─ barangRusakRinganDetail.views.php
   ├─ graph5tahunan.views.php
   ├─ graphKondisiAset.views.php
   ├─ graphTahunan.views.php
   ├─ pengembalianBarang.views.php
   ├─ pengembalianBarangRekap.views.php
   ├─ pinjamBarang.views.php
   ├─ pinjamBarangRekap.views.php
   ├─ ruang.views.php
   ├─ ruangDetail.views.php
   ├─ useradmin.views.php
   └─ viewsfile.views.php


```

---

## 🎯 Fitur yang Tersedia

* Autentikasi & Otorisasi (login, logout)
* Dashboard statistik singkat
* Manajemen barang (CRUD)
* Manajemen peminjaman & pengembalian
* Validasi form & flash messages


---



## 📄 Lisensi

Distribusi di bawah MIT License. Lihat file `LICENSE` untuk detail.

---

## 📞 Support

Untuk masalah teknis, buka *Issues* di repository GitHub.

---
📧 Email: [dhaisimam.s@gmail.com] 🐛 Issues: GitHub Issues 🙏 Acknowledgments PHP - PHP framework by DMZ Bootstrap  - CSS framework Font Awesome - Icons.
