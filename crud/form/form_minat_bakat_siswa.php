<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Minat dan Bakat Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Form Minat dan Bakat Siswa</h2>
    <?php
    // Konfigurasi database
    $host = 'localhost';
    $user = 'root'; // Ganti dengan username database Anda
    $password = 'htmlyu'; // Ganti dengan password database Anda
    $database = 'data_siswa'; // Ganti dengan nama database Anda

    // Koneksi ke database
    $conn = new mysqli($host, $user, $password, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Inisialisasi variabel untuk menyimpan pesan hasil operasi
    $pesan = "";

    // Periksa apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $hobi = $_POST['hobi'];
        $cita_cita = $_POST['cita_cita'];

        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO minat_bakat (nama_siswa, hobi, cita_cita) VALUES ('$nama', '$hobi', '$cita_cita')";

        if ($conn->query($sql) === TRUE) {
            $pesan = "Data berhasil disimpan.";
        } else {
            $pesan = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
    ?>

    <!-- Form input -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nama">Nama Siswa:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="hobi">Hobi:</label><br>
        <input type="text" id="hobi" name="hobi" required><br><br>

        <label for="cita_cita">Cita-cita:</label><br>
        <input type="text" id="cita_cita" name="cita_cita" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Menampilkan pesan hasil operasi -->
    <?php echo $pesan; ?>
</body>
</html>
