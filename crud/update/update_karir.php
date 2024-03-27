<?php
// Koneksi ke database (ganti dengan informasi koneksi sesuai dengan database Anda)
$servername = "localhost";
$username = "root";
$password = "htmlyu";
$database = "data_siswa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang dikirim dari form
    $id = $_POST['id'];
    $nama_siswa = $_POST['nama'];
    $perencanaan_karir = $_POST['perencanaan'];

    // Menyiapkan query SQL untuk menyimpan perubahan ke database
    $sql = "UPDATE karir_siswa SET nama_siswa='$nama_siswa', perencanaan_karir='$perencanaan_karir' WHERE id='$id'";

    // Menjalankan query dan memeriksa apakah penyimpanan berhasil
    if ($conn->query($sql) === TRUE) {
        echo "Perubahan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
