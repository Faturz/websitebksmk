<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulir Profil Siswa</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
    }
    .container {
        width: 80%;
        margin: auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
    }
    h2 {
        text-align: center;
    }
    form {
        padding: 20px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="tel"],
    select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background: #45a049;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Formulir Profil Siswa</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" id="nama_siswa" name="nama_siswa">
        <h3>Latar Belakang Keluarga</h3>
        <label for="alamat_orangtua">Alamat Orangtua:</label>
        <input type="text" id="alamat_orangtua" name="alamat_orangtua">

        <label for="pekerjaan_orangtua">Pekerjaan Orangtua:</label>
        <input type="text" id="pekerjaan_orangtua" name="pekerjaan_orangtua">

        <label for="pendidikan_orangtua">Pendidikan Orangtua:</label>
        <input type="text" id="pendidikan_orangtua" name="pendidikan_orangtua">

        <label for="pendapatan_orangtua">Pendapatan Orangtua:</label>
        <input type="text" id="pendapatan_orangtua" name="pendapatan_orangtua">

        <label for="nomor_hp_orangtua">Nomor Handphone Orangtua:</label>
        <input type="tel" id="nomor_hp_orangtua" name="nomor_hp_orangtua">

        <label for="biaya_sekolah">Pihak yang membiayai sekolah:</label>
        <input type="text" id="biaya_sekolah" name="biaya_sekolah">

        <h3>Riwayat Penyakit</h3>
        <label for="riwayat_penyakit">Pernah di rawat di Rumah Sakit:</label>
        <input type="text" id="riwayat_penyakit" name="riwayat_penyakit">

        <h3>Riwayat Pendidikan</h3>
        <label for="riwayat_pendidikan">Riwayat Pendidikan:</label>
        <input type="text" id="riwayat_pendidikan" name="riwayat_pendidikan">

        <label for="nomor_hp_siswa">Nomor Handphone Siswa:</label>
        <input type="tel" id="nomor_hp_siswa" name="nomor_hp_siswa">

        <h3>Alamat / Tempat Tinggal</h3>
        <label for="tinggal_dengan">Tinggal Dengan:</label>
        <input type="text" id="tinggal_dengan" name="tinggal_dengan">

        <label for="jarak_rumah_ke_sekolah">Jarak Rumah ke Sekolah:</label>
        <input type="text" id="jarak_rumah_ke_sekolah" name="jarak_rumah_ke_sekolah">

        <label for="transportasi">Transportasi yang digunakan:</label>
        <input type="text" id="transportasi" name="transportasi">

        <h3>Teman Terdekat/ Sahabat</h3>
        <label for="teman_terdekat">Teman terdekat/ Sahabat:</label>
        <input type="text" id="teman_terdekat" name="teman_terdekat">

        <input type="submit" name="submit" value="Submit">
    </form>

    
    <div class="siswa-container">
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            
            $servername = "localhost"; 
            $username = "root"; 
            $password = "htmlyu"; 
            $dbname = "data_siswa"; 

            
            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
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

            
            $sql = "INSERT INTO siswa (nama_siswa, alamat_orangtua, pekerjaan_orangtua, pendidikan_orangtua, pendapatan_orangtua, nomor_hp_orangtua, biaya_sekolah, riwayat_penyakit, riwayat_pendidikan, nomor_hp_siswa, tinggal_dengan, jarak_rumah_ke_sekolah, transportasi, teman_terdekat)
            VALUES ('$nama_siswa', '$alamat_orangtua', '$pekerjaan_orangtua', '$pendidikan_orangtua', '$pendapatan_orangtua', '$nomor_hp_orangtua', '$biaya_sekolah', '$riwayat_penyakit', '$riwayat_pendidikan', '$nomor_hp_siswa', '$tinggal_dengan', '$jarak_rumah_ke_sekolah', '$transportasi', '$teman_terdekat')";

            if ($conn->query($sql) === TRUE) {
                echo "Data siswa berhasil disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            
            $conn->close();
        }
        ?>
    </div>
</div>

</body>
</html>
