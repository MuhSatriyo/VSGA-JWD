<?php
    $daftarJenisKelamin = array("Laki-laki", "Perempuan");
    $daftarGolongan = ["I", "II", "III"];

    // Mengambil Data dari File JSON
    $fileDataKaryawan = "data/data_karyawan.json";
    $isiDataKaryawan = file_get_contents($fileDataKaryawan);

    $daftarKaryawan = array();
    // Mengubah isi data karyawan ke array associative
    $daftarKaryawan = json_decode($isiDataKaryawan, true);

    // Jika button simpan di klik maka get data dengan method POST
    if(isset($_POST['btn-simpan'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama-karyawan'];
        $jenisKelamin = $_POST['jenis-kelamin'];
        $golongan = $_POST['golongan'];

        $dataKaryawan = array(
            "nik" => $nik,
            "nama" => $nama,
            "jenisKelamin" => $jenisKelamin,
            "golongan" => $golongan
        );

        // Input array data karyawan yang baru, ke daftar karyawan sebelumnya
        array_push($daftarKaryawan, $dataKaryawan);

        // Mengubah array daftar karyawan ke Json Format
        $dataYangInginDitulisKeFile = json_encode($daftarKaryawan, JSON_PRETTY_PRINT);
    
        // Tulis ke file data_karyawan.json
        file_put_contents($fileDataKaryawan, $dataYangInginDitulisKeFile);
    }

    // Jika button hapus di klik maka get data dengan method POST
    if (isset($_POST['btn-hapus'])) {
        $nik = $_POST['nik'];

        // Menghapus data karyawan berdasarkan NIK
        foreach ($daftarKaryawan as $key => $karyawan) {
            if ($karyawan['nik'] == $nik) {
                unset($daftarKaryawan[$key]);
            }
        }

        // Mengubah array daftar karyawan ke Json Format
        $dataYangInginDitulisKeFile = json_encode(array_values($daftarKaryawan), JSON_PRETTY_PRINT);

        // Tulis ke file data_karyawan.json
        file_put_contents($fileDataKaryawan, $dataYangInginDitulisKeFile);

        // Refresh halaman setelah menghapus
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" style="background-color:#c4c3c3;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/cowok.png" alt="Logo" width="70" height="70" class="img" style="margin-left:100px;">
            </a>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <div class="container pt-2">
        <h3>Aplikasi Data Karyawan</h3>
        <hr>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama-karyawan" class="form-label">Nama Karyawan</label>
                <input type="text" name="nama-karyawan" id="nama-karyawan" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis-kelamin" id="jenis-kelamin" class="form-select">
                    <?php
                    for ($jk = 0; $jk < count($daftarJenisKelamin); $jk++) {
                        echo "<option value='$daftarJenisKelamin[$jk]'>$daftarJenisKelamin[$jk]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="golongan" class="form-label">Golongan</label>
                <select name="golongan" id="golongan" class="form-select">
                    <?php
                    foreach($daftarGolongan as $gol) {
                        echo "<option value='$gol'> $gol </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="btn-simpan" id="btn-simpan">Simpan</button>
            </div>
        </form>
        <hr>
        <table class="table table-sm">
            <thead>
                <tr>
                    <td>Nik</td>
                    <td>Nama Karyawan</td>
                    <td>Jenis Kelamin</td>
                    <td>Golongan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($daftarKaryawan as $karyawan) {
                    echo "<tr>";
                    echo "<td>" . $karyawan['nik'] . "</td>";
                    echo "<td>" . $karyawan['nama'] . "</td>";
                    echo "<td>" . $karyawan['jenisKelamin'] . "</td>";
                    echo "<td>" . $karyawan['golongan'] . "</td>";
                    echo "<td>
                        <form action='#' method='post' style='display:inline-block;'>
                            <input type='hidden' name='nik' value='" . $karyawan['nik'] . "'>
                            <button type='submit' class='btn btn-danger btn-sm' name='btn-hapus'>Hapus</button>
                        </form>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <div class="card" style="background-color:#c4c3c3;">
        <div class="card-header">
            Create by Muhammad Satriyo Yuwono
        </div>
    </div>
    <!-- End Footer -->

    <!-- Call JS -->
    <script src="js/bootstrap.js"></script>
    <!-- End call JS -->
</body>
</html>