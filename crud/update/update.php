<?php
$servername = "localhost";
$username = "root";
$password = "htmlyu";
$dbname = "data_siswa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$siswa_id = $_POST['siswa_id'];
$nama_siswa = $_POST['nama_siswa'];
$alamat_orangtua = $_POST['alamat_orangtua'];
$pekerjaan_orangtua = $_POST['pekerjaan_orangtua'];
$pendidikan_orangtua = $_POST['pendidikan_orangtua'];
$pendapatan_orangtua = $_POST['pendapatan_orangtua'];
$nomor_hp_orangtua = $_POST['nomor_hp_orangtua'];
$biaya_sekolah = $_POST['biaya_sekolah'];
$riwayat_penyakit = $_POST['riwayat_penyakit'];
$riwayat_pendidikan = $_POST['riwayat_pendidikan'];
$nomor_hp_siswa = $_POST['nomor_hp_siswa'];
$tinggal_dengan = $_POST['tinggal_dengan'];
$jarak_rumah_ke_sekolah = $_POST['jarak_rumah_ke_sekolah'];
$transportasi = $_POST['transportasi'];
$teman_terdekat = $_POST['teman_terdekat'];

$sql_update = "UPDATE siswa SET 
                nama_siswa='$nama_siswa', 
                alamat_orangtua='$alamat_orangtua', 
                pekerjaan_orangtua='$pekerjaan_orangtua', 
                pendidikan_orangtua='$pendidikan_orangtua', 
                pendapatan_orangtua='$pendapatan_orangtua', 
                nomor_hp_orangtua='$nomor_hp_orangtua', 
                biaya_sekolah='$biaya_sekolah', 
                riwayat_penyakit='$riwayat_penyakit', 
                riwayat_pendidikan='$riwayat_pendidikan', 
                nomor_hp_siswa='$nomor_hp_siswa', 
                tinggal_dengan='$tinggal_dengan', 
                jarak_rumah_ke_sekolah='$jarak_rumah_ke_sekolah', 
                transportasi='$transportasi', 
                teman_terdekat='$teman_terdekat' 
                WHERE id=$siswa_id";

if ($conn->query($sql_update) === TRUE) {
    echo "<script>alert('Data siswa berhasil diperbarui');</script>";
    echo "<script>window.location.href = 'admin.php';</script>";
} else {
    echo "<script>alert('Error saat memperbarui data: " . $conn->error . "');</script>";
}
$conn->close();
?>
