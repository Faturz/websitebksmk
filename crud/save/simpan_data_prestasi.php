<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "htmlyu"; // Ganti dengan password database Anda
$dbname = "data_siswa"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama_siswa = $_POST['nama_siswa'];
$prestasi = $_POST['prestasi'];

// Menyimpan data ke database
$sql = "INSERT INTO siswa_berprestasi (nama_siswa, prestasi) VALUES ('$nama_siswa', '$prestasi')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
