
Nama : Muhammad Arkhamullah Rifai Asshidiq

Nim : 312410545

Kelas : TI.24.A.5

## Laporan Praktikum

### Lagkah-langkah Praktikum

1. Buat file baru dengan nama `header.php`

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contoh Modularisasi</title>
    <link href="style.css" rel="stylesheet" type="text/stylesheet" media="screen" />
</head>
<body>
    <div class="container">
        <header>
            <h1>Modularisasi Menggunakan Require</h1>
        </header>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">Tentang</a>
            <a href="kontak.php">Kontak</a>
        </nav>
```

![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20214854.png?raw=true)

2. Buat file baru dengan nama `footer.php`

```
        <footer>
            <p>&copy; 2021, Informatika, Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```

![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20214906.png?raw=true)

3. Buat file baru dengan nama `home.php`

```
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman Home</h2>
    <p>Ini adalah bagian content dari halaman.</p>
</div>

<?php require('footer.php'); ?>
```

![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20214913.png?raw=true)

4. Buat file baru dengan nama `about.php`

```
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman About</h2>
    <p>Ini adalah bagian content dari halaman.</p>
</div>

<?php require('footer.php'); ?>
```

![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20214920.png?raw=true)

## Pertanyaan dan Tugas 
Implementasikan konsep modularisasi pada kode program praktikum 8 tentang database, sehingga setiap halamannya memiliki template tampilan yang sama. Dan terapkan penggunaan Routing agar project menjadi lebih modular. Gunakan struktur direktory seperti berikut: 

📂 Struktur Direktori
Struktur folder dibuat modular memisahkan logika (modules), tampilan (views), konfigurasi (config), dan aset (assets).

```

lab9_php_modular/
├── assets/
│   ├── css/
│   │   └── style.css       # File desain (Styling)
│   └── js/
├── config/
│   └── database.php        # Konfigurasi koneksi ke database
├── gambar/                 # Folder penyimpanan gambar upload
├── modules/
│   ├── auth/
│   │   ├── login.php       # Form dan Logika Login
│   │   └── logout.php      # Proses Logout
│   └── user/
│       ├── add.php         # Form Tambah Data
│       ├── delete.php      # Proses Hapus Data
│       ├── edit.php        # Form Ubah Data
│       └── list.php        # Tabel Daftar Data Barang
├── views/
│   ├── dashboard.php       # Halaman Utama (Home)
│   ├── footer.php          # Template Bawah
│   └── header.php          # Template Atas (Navigasi)
└── index.php               # FILE UTAMA (Router)
```
## Langkah-Langkah Praktikum
### 1. Konfigurasi Database
Membuat file config/database.php untuk menghubungkan aplikasi dengan database latihan1.

### 2. Membuat Layout (Templating)
Memecah tampilan HTML menjadi bagian-bagian kecil agar dapat digunakan kembali (reusable):

views/header.php: Berisi tag pembuka HTML, head, link CSS, dan Navigasi Menu.

views/footer.php: Berisi penutup container, copyright, dan tag penutup HTML.

assets/css/style.css: Memberikan styling agar tampilan rapi, responsif, dan profesional.

### 3. Implementasi Routing
File index.php berfungsi sebagai Router. File ini membaca parameter URL (?page=...) dan menentukan modul mana yang akan dimuat. Logika ini menggantikan cara lama di mana setiap halaman diakses langsung.

Snippet kode Routing:
```
PHP

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home': include("views/dashboard.php"); break;
    case 'user/list': include("modules/user/list.php"); break;
    // ... routing lainnya
}
```
### 4. Implementasi Modul Data Barang
Memindahkan logika CRUD dari Praktikum 8 ke dalam folder modules/user/.

File di dalam folder ini tidak lagi memiliki tag HTML lengkap (<html>, <head>), melainkan hanya berisi konten inti (Tabel/Form) karena kerangka utamanya sudah ditangani oleh header.php dan footer.php.

### 5. Fitur Login & Session 
Menambahkan logika keamanan sederhana:

User harus login terlebih dahulu untuk mengakses Dashboard dan Data Barang.

Menggunakan``` session_start()``` untuk menyimpan status login.

Menu navigasi berubah dinamis (tombol Login berubah jadi Logout jika sudah login).

### 📸 Screenshot Hasil
Berikut adalah tampilan antarmuka aplikasi setelah selesai dikerjakan:

### 1. Halaman Login
User diwajibkan login terlebih dahulu sebelum masuk ke sistem. (Gambar form login dengan username dan password)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20211549.png?raw=true)
### 2. Halaman Dashboard (Home)
Halaman utama setelah berhasil login. (Tampilan selamat datang dengan layout modular)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20212003.png?raw=true)
### 3. Halaman Data Barang (List)
Menampilkan data dari database dengan fitur Edit dan Hapus. Layout menggunakan tabel yang rapi. (Tabel data barang dengan tombol aksi)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20213634.png?raw=true)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20213641.png?raw=true)
### 4. Halaman Tambah Data
Form untuk menambahkan data barang baru beserta upload gambar. (Form input data barang)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20212025.png?raw=true)
![gambar](https://github.com/MuhammadArkham/Lab9Web/blob/main/Screenshot/Screenshot%202025-12-03%20212051.png?raw=true)
