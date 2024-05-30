<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian BMI</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 65vh;
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
    <form action="proses_hitung.php" method="post">
        <h2>Menghitung Nilai BMI</h2>
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
                <td>Tinggi Badan (cm)</td>
                <td>:</td>
                <td><input type="number" name="tinggi" id="tinggi"></td>
            </tr>
        </table>
        <input type="submit" value="CEK BMI" name="cekbmi">
        <input type="reset" value="Reset" onclick="window.location='?';" style="font-size: 15px;">
        
    </form>

</body>
</html>