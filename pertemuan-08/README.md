# Pertemuan 08 — Formulir dan Pengujian

## Proses pengerjaan

1. Memeriksa `index.php` untuk alur formulir Rencana Kegiatan dan Kontak.
2. Meninjau validasi sisi klien (JavaScript) dan sisi peladen (PHP).
3. Meninjau penyimpanan session, pola Post-Redirect-Get (PRG), dan penampilan data.
4. Memeriksa navigasi serta keberadaan fitur profil dari pertemuan sebelumnya.

## Hasil pemeriksaan

| Fitur | Hasil |
|---|---|
| Menu navigasi | **Perlu diperbaiki.** Tautan Kontak memiliki teks perintah terminal yang tersisip pada nilai `href`. Ada dua elemen dengan `id="contact"`. |
| Formulir Rencana Kegiatan | Formulir dan pemeriksaan input kosong tersedia di JavaScript dan PHP. **Belum diuji di browser.** |
| Pemrosesan POST Rencana Kegiatan | Kode menyimpan data valid ke session lalu mengarahkan kembali dengan PRG. **Belum diuji langsung.** |
| Penampilan data kegiatan | Data ditampilkan dengan `htmlspecialchars()`. **Belum diuji langsung.** |
| Formulir Kontak | **Belum berfungsi dengan baik:** handler menyimpan nama dari konstanta `$CITRAKIRANA` yang tidak didefinisikan. |
| Fitur sebelumnya | Profil dan data mahasiswa masih ada. Footer menggunakan variabel `$citra` yang tidak didefinisikan. |
| Pemeriksaan sintaks PHP | `php -l` **belum dijalankan**. |

## Catatan perbaikan sebelum pengujian ulang

- Ganti `$CITRAKIRANA` dengan nilai input nama yang sudah divalidasi.
- Hapus pemanggilan `session_start()` kedua.
- Ganti `$citra` pada footer dengan `$namaMahasiswa`.
- Perbaiki `href` menu Kontak dan hapus section Kontak placeholder yang duplikat.
- Hapus `}` sebelum tag `<script>` dan `});` setelah skrip.
- Pastikan penutup section HTML sesuai sebelum menjalankan pengujian.

## Pengujian lanjutan

Setelah perbaikan, jalankan `php -l index.php`, lalu uji menu, validasi input kosong, pengiriman data valid, hasil setelah redirect, refresh halaman, serta pengiriman formulir Kontak. Catat hasil aktual pengujian di README ini.

