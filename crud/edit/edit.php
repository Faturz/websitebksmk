<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Detail Siswa</title>
<style>
body {
    font-family: Arial, sans-serif;
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

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
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
    <h2>Edit Detail Siswa</h2>
    <?php
    
    $siswa_id = isset($_POST['siswa_id']) ? $_POST['siswa_id'] : '';

    
    $servername = "localhost"; 
    $username = "root"; 
    $password = "htmlyu"; 
    $dbname = "data_siswa";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM siswa WHERE id = $siswa_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo "<form method='POST' action='update.php'>";
        echo "<input type='hidden' name='siswa_id' value='".$row["id"]."'>";
        echo "<label for='nama_siswa'>Nama Siswa:</label>";
        echo "<input type='text' id='nama_siswa' name='nama_siswa' value='".$row["nama_siswa"]."'>";
        echo "<label for='alamat_orangtua'>Alamat Orang Tua:</label>";
        echo "<input type='text' id='alamat_orangtua' name='alamat_orangtua' value='".$row["alamat_orangtua"]."'>";
        echo "<label for='pekerjaan_orangtua'>Pekerjaan Orang Tua:</label>";
        echo "<input type='text' id='pekerjaan_orangtua' name='pekerjaan_orangtua' value='".$row["pekerjaan_orangtua"]."'>";
        echo "<label for='pendidikan_orangtua'>Pendidikan Orang Tua:</label>";
        echo "<input type='text' id='pendidikan_orangtua' name='pendidikan_orangtua' value='".$row["pendidikan_orangtua"]."'>";
        echo "<label for='pendapatan_orangtua'>Pendapatan Orang Tua:</label>";
        echo "<input type='text' id='pendapatan_orangtua' name='pendapatan_orangtua' value='".$row["pendapatan_orangtua"]."'>";
        echo "<label for='nomor_hp_orangtua'>Nomor Handphone Orang Tua:</label>";
        echo "<input type='text' id='nomor_hp_orangtua' name='nomor_hp_orangtua' value='".$row["nomor_hp_orangtua"]."'>";
        
        
        echo "<label for='biaya_sekolah'>Pihak yang membiayai sekolah:</label>";
        echo "<input type='text' id='biaya_sekolah' name='biaya_sekolah' value='".$row["biaya_sekolah"]."'>";
        echo "<label for='riwayat_penyakit'>Pernah di rawat di Rumah Sakit:</label>";
        echo "<input type='text' id='riwayat_penyakit' name='riwayat_penyakit' value='".$row["riwayat_penyakit"]."'>";
        echo "<label for='riwayat_pendidikan'>Riwayat Pendidikan:</label>";
        echo "<input type='text' id='riwayat_pendidikan' name='riwayat_pendidikan' value='".$row["riwayat_pendidikan"]."'>";
        echo "<label for='nomor_hp_siswa'>Nomor Handphone Siswa:</label>";
        echo "<input type='text' id='nomor_hp_siswa' name='nomor_hp_siswa' value='".$row["nomor_hp_siswa"]."'>";
        echo "<label for='tinggal_dengan'>Tinggal Dengan:</label>";
        echo "<input type='text' id='tinggal_dengan' name='tinggal_dengan' value='".$row["tinggal_dengan"]."'>";
        echo "<label for='jarak_rumah_ke_sekolah'>Jarak Rumah ke Sekolah:</label>";
        echo "<input type='text' id='jarak_rumah_ke_sekolah' name='jarak_rumah_ke_sekolah' value='".$row["jarak_rumah_ke_sekolah"]."'>";
        echo "<label for='transportasi'>Transportasi yang digunakan:</label>";
        echo "<input type='text' id='transportasi' name='transportasi' value='".$row["transportasi"]."'>";
        echo "<label for='teman_terdekat'>Teman terdekat/ Sahabat:</label>";
        echo "<input type='text' id='teman_terdekat' name='teman_terdekat' value='".$row["teman_terdekat"]."'>";
        // ...
        echo "<input type='submit' value='Simpan Perubahan'>";
        echo "</form>";
    } else {
        echo "Data siswa tidak ditemukan.";
    }

    
    $conn->close();
    ?>
</div>

</body>
</html>
