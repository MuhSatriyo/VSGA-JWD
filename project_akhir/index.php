<?php
    // Daftar Jenis Kelamin
    $daftarJenisKelamin = ["Laki-Laki", "Perempuan"];
    // Daftar Agama
    $daftarAgama = ["Islam", "Kristen", "Katolik", "Hindu", "Buddha", "Konghuchu"];
    // Daftar Jurusan
    $daftarJurusan = ["Teknik Elektro", "Teknik Metalurgi", "Teknik Mesin", "Teknik Sipil", "Teknik Kimia", "Teknik Industri"];
    // Matakuliah
    $daftarMatakuliah = ["Dasar Teknik Elektro", "Dasar Teknik Metalurgi", "Dasar Teknik Mesin", "Dasar Teknik Sipil", "Dasar Teknik Kimia", "Dasar Teknik Industri", "Matematika Teknik", "Ekonomi Teknik", "Kalkulus", "Motor Listrik", "Metodologi Penelitian"];

    // mengambil data file json
    $fileDataMahasiswa = "data/data_mahasiswa.json";
    $isiDataMahasiswa = file_get_contents($fileDataMahasiswa);

    $daftarMahasiswa = array();
    // mengubah data mahasiswa menjadi ke array associative
    $daftarMahasiswa = json_decode($isiDataMahasiswa, true);

    if(isset($_POST['btn-simpan'])) { // jika btn-simpan di klik

        // get data dari post
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $tempatLahir = $_POST['tempat-lahir'];
        $tanggal = $_POST['tanggal'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $tanggalLahir = sprintf('%02d-%02d-%04d', $tanggal, $bulan, $tahun);
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $noTelepon = $_POST['no-telepon'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];
        $mataKuliah = $_POST['mataKuliah'];
        $nilai = $_POST['nilai'];
        $nilaiMutu = hitungNilai($nilai);
        $lulus = kelulusan($nilai);
        
        // data mahasiswa yang diinput ke dalam array
        $dataMahasiswa = array(
            "nim" => $nim,
            "nama" => $nama,
            "jenisKelamin" => $jenisKelamin,
            "tempatLahir" => $tempatLahir,
            "tanggalLahir" => $tanggalLahir,
            "agama" => $agama,
            "alamat" => $alamat,
            "noTelepon" => $noTelepon,
            "email" => $email,
            "jurusan" => $jurusan,
            "mataKuliah" => $mataKuliah,
            "nilai" => $nilai,
            "nilaiMutu" => $nilaiMutu,
            "lulus" => $lulus
        );

        // memasukkan array data mahasiswa yang baru, ke daftar mahasiswa sebelumnya
        array_push($daftarMahasiswa, $dataMahasiswa);

        // mengubah array data mahasiswa ke json format
        $dataYangInginDitulisKeFile = json_encode($daftarMahasiswa, JSON_PRETTY_PRINT);

        // tulis ke file data ke json
        file_put_contents($fileDataMahasiswa, $dataYangInginDitulisKeFile);

        // redirect ke halaman index.php
        header("Location: index.php");
        exit();
    }


    function hitungNilai($nilai) {
        if ($nilai >= 91 && $nilai <= 100) {
            return "A";
        } else if ($nilai >= 81 && $nilai <= 90) {
            return "B";
        } else if ($nilai >= 71 && $nilai <= 80) {
            return "C";
        } else if ($nilai >= 61 && $nilai <= 70) {
            return "D";
        } else if ($nilai >= 0 && $nilai <= 60) {
            return "E";
        } else {
            return "Nilai tidak valid";
        }
    }
    
    function kelulusan($nilai) {
        if ($nilai >= 71 && $nilai <= 100) {
            return "Lulus";
        } else if ($nilai >= 0 && $nilai <= 70) {
            return "Tidak Lulus";
        } else {
            return "Nilai tidak valid";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Akhir VSGA</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="index.php">
        <!-- Navbar -->
        <?php include "layout/navbar.php" ?>
        <!-- End Navbar -->
        
        <!-- Content -->
        <?php include "layout/content.php" ?>
        <!-- End Content -->
    </form>

    <!-- Footer -->
    <?php include "layout/footer.php" ?>
    <!-- End Footer -->

    <!-- Call JS -->
    <script src="js/bootstrap.js"></script>
    <!-- End Call JS -->
</body>
</html>