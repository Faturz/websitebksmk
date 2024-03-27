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

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from form submission
    $id = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $prestasi = $_POST['prestasi'];

    // Query to update data in the database based on ID
    $sql = "UPDATE siswa_berprestasi SET nama_siswa='$nama_siswa', prestasi='$prestasi' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Redirect user back to the main page or display a success message
        header("Location: siswa_berprestasi.php");
        exit();
    } else {
        // If there is an error in updating the data, redirect user back to the main page or display an error message
        echo "Error updating record: " . $conn->error;
    }
} else {
    // If form is not submitted, redirect user back to the main page or display an error message
    header("Location: siswa_berprestasi.php");
    exit();
}
?>
