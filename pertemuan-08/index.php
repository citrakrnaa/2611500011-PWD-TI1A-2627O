<?php
// 1. Inisialisasi Session untuk Pola PRG (Post-Redirect-Get)
session_start();

$errors = [];
$data_kegiatan = null;

// 2. Ambil data atau error dari session jika ada
if (isset($_SESSION['data_kegiatan'])) {
    $data_kegiatan = $_SESSION['data_kegiatan'];
    unset($_SESSION['data_kegiatan']); // Hapus session agar tidak terus tampil saat refresh
}

if (isset($_SESSION['form_errors'])) {
    $errors = $_SESSION['form_errors'];
    unset($_SESSION['form_errors']);
}

// 3. Pemrosesan data saat Formulir dikirim (Metode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_rencana'])) {
    // Normalisasi / Sanitasi Masukan (trim spasi berlebih)
    $nama      = trim($_POST['nama_kegiatan'] ?? '');
    $kategori  = trim($_POST['kategori_kegiatan'] ?? '');
    $tanggal   = trim($_POST['tanggal_pelaksanaan'] ?? '');
    $lokasi    = trim($_POST['lokasi_kegiatan'] ?? '');
    $deskripsi = trim($_POST['deskripsi_kegiatan'] ?? '');

    // Validasi Sisi Peladen (PHP Server-Side Validation)
    if (empty($nama)) {
        $errors[] = 'Nama Kegiatan wajib diisi.';
    }
    if (empty($kategori)) {
        $errors[] = 'Kategori Kegiatan wajib dipilih.';
    }
    if (empty($tanggal)) {
        $errors[] = 'Tanggal Pelaksanaan wajib diisi.';
    }
    if (empty($lokasi)) {
        $errors[] = 'Lokasi Kegiatan wajib diisi.';
    }
    if (empty($deskripsi)) {
        $errors[] = 'Deskripsi Kegiatan wajib diisi.';
    }

    // Jika validasi lolos
    if (empty($errors)) {
        $_SESSION['data_kegiatan'] = [
            'nama'      => $nama,
            'kategori'  => $kategori,
            'tanggal'   => $tanggal,
            'lokasi'    => $lokasi,
            'deskripsi' => $deskripsi
        ];

        // Pola Post-Redirect-Get (PRG)
        header('Location: ' . $_SERVER['PHP_SELF'] . '#rencana-kegiatan');
        exit;
    } else {
        // Simpan pesan error ke session jika validasi gagal
        $_SESSION['form_errors'] = $errors;
        header('Location: ' . $_SERVER['PHP_SELF'] . '#rencana-kegiatan');
        exit;
    }
}
?><?php
session_start();

// P7: Memproses data formulir dan menyimpannya ke dalam session.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$nama = trim((string) ($_POST["nama"] ?? ""));
	$email = trim((string) ($_POST["email"] ?? ""));
	$semesterForm = trim((string) ($_POST["semester"] ?? ""));
	$tanggal = trim((string) ($_POST["tanggal"] ?? ""));
	$jenisPesan = trim((string) ($_POST["jenis_pesan"] ?? ""));
	$minat = $_POST["minat"] ?? [];
	$prodi = trim((string) ($_POST["prodi"] ?? ""));
	$pesan = trim((string) ($_POST["pesan"] ?? ""));

	// Checkbox dapat mengirimkan lebih dari satu nilai.
	if (!is_array($minat)) {
		$minat = [];
	}

	// Menyimpan setiap nilai formulir ke dalam session secara terpisah.
	$_SESSION["nama"] = $CITRAKIRANA;
	$_SESSION["email"] = $email;
	$_SESSION["semester"] = $semesterForm;
	$_SESSION["tanggal"] = $tanggal;
	$_SESSION["jenis_pesan"] = $jenisPesan;
	$_SESSION["minat"] = $minat;
	$_SESSION["prodi"] = $prodi;
	$_SESSION["pesan"] = $pesan;

	// PRG: mencegah pengiriman POST berulang ketika halaman dimuat ulang.
	header("Location: index.php#contact");
	exit;
}

// Mengamankan data sebelum ditampilkan kembali ke halaman HTML.
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2611500011";
$namaMahasiswa = "Citra Kirana";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "satpamal";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {

	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	
}
?>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Profil Mahasiswa</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<div class="header-top">
			<h1>Profil Mahasiswa</h1>

			<button
				class="nav-toggle"
				id="navToggle"
				type="button"
				aria-label="Buka navigasi"
				aria-controls="navMenu"
				aria-expanded="false">
				&#9776;
			</button>
		</div>

		<nav>
			<ul id="navMenu">
				<li><a href="#home">Beranda</a></li>
				<li><a href="#about">Tentang</a></li>
				<li><a href="#rencana-kegiatan">rencana kegiatan</a></li>
				<li><a href="#contact				php -l .\pertemuan-08\index.php				php -l .\pertemuan-08\index.php">Kontak</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<section id="home">
			<h2>Selamat Datang</h2>
			<p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>

			<img src="img/foto-profil.jpeg" alt="Foto profil Nama Mahasiswa" />
		</section>

		<section id="about">
			<h2>Tentang Saya</h2>

			<article>
				<h3>Profil Singkat</h3>
				<p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
				<p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
				<p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
				<p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
				<p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
				<p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
				<p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
				<p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

				<h3>Target Belajar (Perulangan for)</h3>
				<ol>
					<?php
					// Perulangan for tanpa array; materi larik dibahas pada P9.
					for ($i = 1; $i <= 5; $i++) {
						echo "<li>Target belajar ke-" . $i . ": ";
						switch ($i) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
								break;
						}
						echo "</li>";
					}
					?>
				</ol>

				<h3>Semester (Perulangan while):</h3>
				<ol>
					<?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++; // operator penugasan
					}
					?>
				</ol>
			</article>


		<!-- ================= SECTION RENCANA KEGIATAN MAHASISWA ================= -->
<section id="rencana-kegiatan" class="contact-section">
    <div class="container">
        <h2>Rencana Kegiatan Mahasiswa</h2>

        <!-- Tampilkan Pesan Error Server-Side (PHP) Jika Validasi Gagal -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 20px;">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Tempat Pesan Error Client-Side (JavaScript) -->
        <div id="js-error-message" style="display: none; color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;"></div>

        <!-- Formulir Rencana Kegiatan -->
        <form id="form-rencana-kegiatan" action="" method="POST">
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan:</label>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" placeholder="Masukkan nama kegiatan">
            </div>

            <div class="form-group">
                <label for="kategori_kegiatan">Kategori Kegiatan:</label>
                <select id="kategori_kegiatan" name="kategori_kegiatan" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Non-Akademik">Non-Akademik</option>
                    <option value="Organisasi">Organisasi</option>
                    <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
                <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" class="form-control">
            </div>

            <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" class="form-control" placeholder="Masukkan lokasi kegiatan">
            </div>

            <div class="form-group">
                <label for="deskripsi_kegiatan">Deskripsi Kegiatan:</label>
                <textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan" class="form-control" rows="4" placeholder="Tuliskan deskripsi singkat kegiatan"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" name="submit_rencana" class="btn btn-primary">Kirim</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </div>
        </form>

        <!-- Penampilan Data Hasil Input setelah Proses PRG (Sanitasi Output XSS) -->
        <?php if ($data_kegiatan): ?>
            <div class="result-box" style="margin-top: 30px; padding: 20px; border: 1px solid #c3e6cb; background-color: #d4edda; color: #155724; border-radius: 5px;">
                <h3>Data Rencana Kegiatan Berhasil Disimpan!</h3>
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #c3e6cb;">Nama Kegiatan</th>
                        <td style="padding: 8px; border-bottom: 1px solid #c3e6cb;"><?= htmlspecialchars($data_kegiatan['nama'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #c3e6cb;">Kategori</th>
                        <td style="padding: 8px; border-bottom: 1px solid #c3e6cb;"><?= htmlspecialchars($data_kegiatan['kategori'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #c3e6cb;">Tanggal Pelaksanaan</th>
                        <td style="padding: 8px; border-bottom: 1px solid #c3e6cb;"><?= htmlspecialchars($data_kegiatan['tanggal'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #c3e6cb;">Lokasi</th>
                        <td style="padding: 8px; border-bottom: 1px solid #c3e6cb;"><?= htmlspecialchars($data_kegiatan['lokasi'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; border-bottom: 1px solid #c3e6cb;">Deskripsi</th>
                        <td style="padding: 8px; border-bottom: 1px solid #c3e6cb;"><?= nl2br(htmlspecialchars($data_kegiatan['deskripsi'], ENT_QUOTES, 'UTF-8')) ?></td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Section Contact Tetap Berada di Bawahnya -->
<section id="contact">
    <!-- Isi section contact bawaan -->
</section>
		</section>

		<section id="contact">
			<h2>Kontak</h2>

			<p>
				Kunjungi
				<a target="_blank" href="https://github.com/citrakrnaa<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
			</p>

			<form id="contactForm" class="js-contact-form" data-validation="contact" action="index.php" method="post" novalidate>
				<div class="form-group">
					<label for="nama">Nama Lengkap</label><br />

					<input
						class="input-form"
						type="text"
						id="nama"
						name="nama"
						placeholder="Masukkan nama lengkap"
						minlength="3"
						maxlength="50"
						required />
				</div>

				<div class="form-group">
					<label for="email">2611500011@mahasiswa.atmaluhur.ac.id</label><br />

					<input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com" required />
				</div>

				<div class="form-group">
					<label for="semester">1</label><br />

					<input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal Kunjungan</label><br />

					<input class="input-form" type="date" id="tanggal" name="tanggal" required />
				</div>

				<div class="form-group">
					<p>Jenis Pesan</p>

					<input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
					<label for="pertanyaan">Pertanyaan</label>

					<input type="radio" id="saran" name="jenis_pesan" value="saran" />
					<label for="saran">Saran</label>
				</div>

				<div class="form-group">
					<p>Topik yang Diminati</p>

					<input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
					<label for="minat-html">HTML</label>

					<input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
					<label for="minat-css">CSS</label>
				</div>

				<div class="form-group">
					<label for="prodi">Program Studi</label><br />

					<select class="input-form" id="prodi" name="prodi" required>
				
						<option value="TI">Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pesan">Pesan</label><br />

					<textarea
						class="input-form"
						id="pesan"
						name="pesan"
						maxlength="300"
						placeholder="Tulis pesan Anda"
						required></textarea>
				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
				<p class="form-feedback" data-form-feedback aria-live="polite"></p>


			</form>

			<?php if (isset($_SESSION["nama"])): ?>
				<article id="hasilKontak" class="submission-result" aria-live="polite">
					<h3>Data Formulir yang Dikirim</h3>
					<p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($_SESSION["nama"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION["email"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Semester:</strong> <?= htmlspecialchars($_SESSION["semester"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($_SESSION["tanggal"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Jenis Pesan:</strong> <?= htmlspecialchars($_SESSION["jenis_pesan"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Topik yang Diminati:</strong>
						<?= htmlspecialchars(implode(", ", $_SESSION["minat"] ?? []), ENT_QUOTES, "UTF-8") ?>
					</p>
					<p><strong>Program Studi:</strong> <?= htmlspecialchars($_SESSION["prodi"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Pesan:</strong> <?= nl2br(htmlspecialchars($_SESSION["pesan"] ?? "", ENT_QUOTES, "UTF-8")) ?></p>
				</article>
			<?php endif; ?>
		</section>
	</main>

	<footer>
		<p>&copy; <?= date("Y") ?> <?php echo $citra; ?> [<?= $nim ?>]</p>
	</footer>
	<script src="script.js"></script>
    }<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form-rencana-kegiatan');
    const errorBox = document.getElementById('js-error-message');

    if (form) {
        form.addEventListener('submit', function(e) {
            let errors = [];

            // Regresi data input
            const nama = document.getElementById('nama_kegiatan').value.trim();
            const kategori = document.getElementById('kategori_kegiatan').value;
            const tanggal = document.getElementById('tanggal_pelaksanaan').value;
            const lokasi = document.getElementById('lokasi_kegiatan').value.trim();
            const deskripsi = document.getElementById('deskripsi_kegiatan').value.trim();

            // Validasi input kosong
            if (nama === '') {
                errors.push('Nama Kegiatan wajib diisi.');
            }
            if (kategori === '') {
                errors.push('Kategori Kegiatan wajib dipilih.');
            }
            if (tanggal === '') {
                errors.push('Tanggal Pelaksanaan wajib diisi.');
            }
            if (lokasi === '') {
                errors.push('Lokasi Kegiatan wajib diisi.');
            }
            if (deskripsi === '') {
                errors.push('Deskripsi Kegiatan wajib diisi.');
            }

            // Tampilkan error jika validasi JS gagal
            if (errors.length > 0) {
                e.preventDefault(); // Batalkan pengiriman form
                errorBox.style.display = 'block';
                errorBox.innerHTML = '<ul style="margin:0; padding-left:20px;">' + 
                    errors.map(err => `<li>${err}</li>`).join('') + 
                    '</ul>';
            } else {
                errorBox.style.display = 'none';
            }
        });
    }
});</script>
});
</body>

</html>