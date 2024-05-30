<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            margin-right: 10px; /* Jarak antara gambar dan teks */
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form input[type="submit"] {
            margin-top: 20px;
            height: 30px;
            width: 150px;
            font-size: 14px;
        }
        form input[type="reset"] {
            margin-top: 20px;
            margin-bottom: 20px;
            height: 30px;
            width: 150px;
            font-size: 14px;
        }
        .hasil {
            min-height: 200px;
        }
        .footer {
            text-align: center;
            background-color: #dec9c5;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" style="background-color: #dec9c5;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/cartoon.png" alt="Logo" width="90" height="90" class="d-inline-block align-text-top">
                Perhitungan Nilai BMI
            </a>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <form action="" method="post" class="form_satu pt-3">
        <h2>Menghitung Nilai BMI</h2>
        <table class="table_satu mt-3">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td>Berat Badan (Kg)</td>
                <td>:</td>
                <td><input type="number" name="berat" id="berat"></td>
            </tr>
            <tr>
                <td>Tinggi Badan (cm)</td>
                <td>:</td>
                <td><input type="number" name="tinggi" id="tinggi"></td>
            </tr>
        </table>
        <input type="submit" value="Cek BMI" name="cekbmi">
        <input type="reset" value="Clear" onclick="window.location='?';" style="font-size: 15px;">

        <div class="hasil">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cekbmi'])) {
                // Mengambil data dari method POST
                $namaMahasiswa = isset($_POST['nama']) ? $_POST['nama'] : '';
                $berat_badan = isset($_POST['berat']) ? $_POST['berat'] : 0;
                $tinggi_badan = isset($_POST['tinggi']) ? $_POST['tinggi'] : 0;

                if ($tinggi_badan > 0) {
                    // Konversi tinggi badan dari cm ke meter
                    $tinggi_badan_m = $tinggi_badan / 100;

                    // Menghitung BMI
                    $bmi = $berat_badan / ($tinggi_badan_m * $tinggi_badan_m);

                    // Menentukan status BMI
                    function statusBMI($bmi) {
                        if ($bmi > 30.0) {
                            return "Obesitas";
                        } elseif ($bmi >= 25.0 && $bmi <= 29.9) {
                            return "Kegemukan";
                        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                            return "Normal";
                        } else {
                            return "Kurus";
                        }
                    }

                    $status = statusBMI($bmi);

                    echo "<h4>Hasil:</h4>";
                    echo "<table>";
                    echo "<tr><td>Nama</td><td>:</td><td>$namaMahasiswa</td></tr>";
                    echo "<tr><td>Berat Badan (Kg)</td><td>:</td><td>$berat_badan kg</td></tr>";
                    echo "<tr><td>Tinggi Badan (cm)</td><td>:</td><td>$tinggi_badan cm</td></tr>";
                    echo "<tr><td>BMI</td><td>:</td><td>" . number_format($bmi, 2) . "</td></tr>";
                    echo "<tr><td>Status BMI</td><td>:</td><td>$status</td></tr>";
                    echo "</table>";
                } else {
                    echo "<h3>Hasil:</h3>";
                    echo "<p>Data tinggi badan harus lebih dari 0 untuk menghitung BMI.</p>";
                }
            }
        ?>
        </div>
    </form>
    <!-- End Content -->

    <!-- Footer -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#dec9c5" fill-opacity="1" d="M0,96L40,106.7C80,117,160,139,240,128C320,117,400,75,480,64C560,53,640,75,720,90.7C800,107,880,117,960,106.7C1040,96,1120,64,1200,53.3C1280,43,1360,53,1400,58.7L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
    <footer class="footer p-3">
        <p>Create by Muhammad Satriyo Yuwono</p>
    </footer>
    <!-- End Footer -->
</body>
    <script src="js/bootstrap.js"></script>
</html>