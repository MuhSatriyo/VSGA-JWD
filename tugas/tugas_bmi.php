<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian BMI</title>
</head>
<body>
    <form action="proses_hitung.php" method="post">
        <table>
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
                <td>Tinggi Badan (m)</td>
                <td>:</td>
                <td><input type="number" name="tinggi" id="tinggi"></td>
            </tr>
            <tr>
                <td><input type="submit" value="cek"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
    
</body>
</html>