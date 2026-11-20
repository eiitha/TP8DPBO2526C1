
# Tugas Praktikum 8 - Desain Pemrograman Berbasis Objek (MVC)

## Janji
Saya Jillena Surbakti dengan NIM 2501485 mengerjakan Tugas Praktikum 8 pada Mata Kuliah Desain dan Pemrograman Berbasis Objek (DPBO) untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## Fitur Utama

Aplikasi manajemen akademik berbasis web ini dibangun menggunakan bahasa pemrograman PHP dengan pola arsitektur Model-View-Controller (MVC). Sistem menyediakan operasi CRUD (Create, Read, Update, Delete) penuh untuk tiga entitas utama:

- **CRUD Lecturers:** Menambah, menampilkan, memperbarui, dan menghapus data dosen.
- **CRUD Courses:** Menambah, menampilkan, memperbarui, dan menghapus data mata kuliah.
- **CRUD Schedules:** Menambah, menampilkan, memperbarui, dan menghapus data jadwal perkuliahan yang menghubungkan dosen dan mata kuliah.

### Diagram 

<img width="1366" height="335" alt="diagram" src="https://github.com/user-attachments/assets/02c350ef-ed00-4c86-8016-c253b187328b" />


### Relasi Database
- **Lecturers ke Schedules (1-N):** Satu dosen dapat terdaftar pada banyak jadwal perkuliahan.
- **Courses ke Schedules (1-N):** Satu mata kuliah dapat diselenggarakan pada banyak jadwal perkuliahan.

---

## Struktur Arsitektur MVC

Proyek ini memisahkan logika aplikasi ke dalam tiga komponen utama (Model, View, Controller) beserta konfigurasi dan router utama:

- **`Project/index.php` (Router Utama / Front Controller)**
  - Berperan sebagai titik masuk utama untuk seluruh permintaan (request) dari pengguna.
  - Membaca parameter routing dari URL, kemudian memuat Controller yang sesuai serta mengeksekusi method (action) yang diminta.

- **`Project/config/` (Konfigurasi Database)**
  - `database.php`: Mengatur kredensial dan koneksi antara aplikasi PHP dengan server database MySQL secara terpusat.

- **`Project/models/` (Model)**
  - Bertanggung jawab menangani logika data dan berinteraksi langsung dengan database MySQL.
  - `Lecturer.php`: Mengelola query SQL untuk operasi CRUD pada tabel `lecturers`.
  - `Course.php`: Mengelola query SQL untuk operasi CRUD pada tabel `courses`.
  - `Schedule.php`: Mengelola query SQL untuk operasi CRUD pada tabel `schedules`, termasuk menggabungkan (JOIN) data dari tabel `lecturers` dan `courses`.

- **`Project/controllers/` (Controller)**
  - Bertindak sebagai penghubung antara Model dan View serta mengatur alur logika bisnis.
  - `LecturerController.php`: Menangani alur proses tampil, tambah, ubah, dan hapus data dosen.
  - `CourseController.php`: Menangani alur proses CRUD mata kuliah.
  - `ScheduleController.php`: Menangani alur proses CRUD jadwal perkuliahan sekaligus mengambil daftar dosen dan mata kuliah untuk kebutuhan pilihan pada formulir.

- **`Project/views/` (View)**
  - Bertanggung jawab menyajikan antarmuka pengguna (UI) berbasis HTML dan Bootstrap secara dinamis.
  - `layouts/header.php` & `layouts/footer.php`: Template kerangka utama halaman (navigasi, pemanggilan file CSS Bootstrap, dan script JavaScript).
  - `lecturers/`, `courses/`, `schedules/`: Masing-masing modul memiliki folder tampilan yang memuat:
    1. `index.php` (Halaman tabel daftar data)
    2. `create.php` (Halaman formulir penambahan data baru)
    3. `edit.php` (Halaman formulir pembaruan data)

---

## Alur Program

1. **Permintaan Pengguna (Request):** Pengguna mengakses halaman atau mengirimkan aksi melalui browser yang diarahkan ke `Project/index.php`.
2. **Pemrosesan Controller:** `index.php` meneruskan permintaan ke Controller terkait (`LecturerController`, `CourseController`, atau `ScheduleController`).
3. **Manipulasi Data (Model):** Controller memanggil method pada Model yang bersesuaian (`Lecturer`, `Course`, atau `Schedule`) untuk menjalankan query ke database `db_tp8`.
4. **Penyajian Tampilan (View):** Data hasil pemrosesan dari Model dikembalikan ke Controller, lalu Controller merender file View (`index.php`, `create.php`, atau `edit.php`) beserta layout `header.php` dan `footer.php` kepada pengguna.

---

## Dokumentasi
### Lecturer CRUD


https://github.com/user-attachments/assets/6ad49e5a-7eaf-4076-bfd4-94478ebb3f5c

#### Course CRUD


https://github.com/user-attachments/assets/9b5134f9-d462-4152-82b1-5c518fbf447c


### Schedule CRUD



https://github.com/user-attachments/assets/a8945e21-2d66-4f54-95f1-ac762087876c




## Struktur Proyek

Susunan direktori dan file pada repositori ini adalah sebagai berikut:

```text
TP8DPBO2526C1/
├── Dokumentasi/
│   ├── diagram.png
│   ├── Course-CRUD.mp4
│   ├── Lecturer-CRUD.mp4
│   └── Schedule-CRUD.mp4
│
├── Project/
│   ├── assets/
│   │   ├── css/
│   │   │   └── bootstrap.min.css
│   │   └── js/
│   │       ├── bootstrap.bundle.min.js
│   │       ├── bootstrap.min.js
│   │       ├── jquery.min.js
│   │       └── popper.min.js
│   │
│   ├── config/
│   │   └── database.php
│   │
│   ├── controllers/
│   │   ├── CourseController.php
│   │   ├── LecturerController.php
│   │   └── ScheduleController.php
│   │
│   ├── models/
│   │   ├── Course.php
│   │   ├── Lecturer.php
│   │   └── Schedule.php
│   │
│   ├── views/
│   │   ├── courses/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   └── index.php
│   │   ├── layouts/
│   │   │   ├── footer.php
│   │   │   └── header.php
│   │   ├── lecturers/
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   └── index.php
│   │   └── schedules/
│   │       ├── create.php
│   │       ├── edit.php
│   │       └── index.php
│   │
│   └── index.php
│
├── db_tp8.sql
└── README.md
