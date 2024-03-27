<?php
// Ambil ID data yang akan diedit dari URL
$id = $_GET["id"];

// Jika ID tidak ada, redirect kembali ke halaman minat_dan_bakat.php
if (!$id) {
    header("Location: minat&bakat.php");
    exit;
}

// Periksa apakah form disubmit untuk menyimpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang diinput dari form
    $nama = $_POST['nama'];
    $hobi = $_POST['hobi'];
    $cita_cita = $_POST['cita_cita'];

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

    // Query untuk menyimpan perubahan ke database
    $sql = "UPDATE minat_bakat SET nama_siswa='$nama', hobi='$hobi', cita_cita='$cita_cita' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman minat_dan_bakat.php setelah menyimpan perubahan
        header("Location: minat&bakat.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}

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

// Query untuk mengambil data yang akan diedit dari database berdasarkan ID
$sql = "SELECT * FROM minat_bakat WHERE id='$id'";
$result = $conn->query($sql);

// Jika data ditemukan, tampilkan formulir untuk mengedit data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Minat dan Bakat Siswa</title>
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
    <div class="container">
        <h2>Edit Data Minat dan Bakat Siswa</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <label for="nama">Nama Siswa:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama_siswa']; ?>" required><br><br>

            <label for="hobi">Hobi:</label><br>
            <input type="text" id="hobi" name="hobi" value="<?php echo $row['hobi']; ?>" required><br><br>

            <label for="cita_cita">Cita-cita:</label><br>
            <input type="text" id="cita_cita" name="cita_cita" value="<?php echo $row['cita_cita']; ?>" required><br><br>

            <input type="submit" value="Simpan Perubahan">
        </form>
    </div>
</body>
</html>
<?php
} else {
    echo "Data tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
