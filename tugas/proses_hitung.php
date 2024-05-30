<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian BMI</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            font-family: Arial, sans-serif;
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
            height: 30px;
            width: 150px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Menghitung Nilai BMI</h2>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Berat Badan (Kg)</td>
                <td>:</td>
                <td><input type="number" name="berat" id="berat" value="<?php echo isset($_POST['berat']) ? $_POST['berat'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td>Tinggi Badan (cm)</td>
                <td>:</td>
                <td><input type="number" name="tinggi" id="tinggi" value="<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>" required></td>
            </tr>
        </table>
        <input type="submit" value="CEK BMI" name="cekbmi">
        <input type="reset" value="Reset" onclick="window.location='tugas_bmi.php';" style="font-size: 15px;">
    
    <?php
        // Mengambil data dari method POST
        $namaMahasiswa = $_POST['nama'];
        $berat_badan = $_POST['berat'];
        $tinggi_badan = $_POST['tinggi'];

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

        if (isset($_POST['cekbmi'])) {
            echo "<h2>Hasil:</h2>";
            echo "<table>";
            echo "<tr><td>Nama</td><td>:</td><td>$namaMahasiswa</td></tr>";
            echo "<tr><td>Berat Badan (Kg)</td><td>:</td><td>$berat_badan kg</td></tr>";
            echo "<tr><td>Tinggi Badan (cm)</td><td>:</td><td>$tinggi_badan cm</td></tr>";
            echo "<tr><td>BMI</td><td>:</td><td>" . number_format($bmi, 2) . "</td></tr>";
            echo "<tr><td>Status BMI</td><td>:</td><td>$status</td></tr>";
            echo "</table>";
        }
    ?>
    </form>

</body>
</html>
