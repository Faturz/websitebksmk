<?php
    include("admin.php")
?>
<body>
<div class="container">
    <div class="headProfile">
        <h2 class="textProfile">Profil Siswa</h2>
        <div class="formProfile">
            <form method="GET" action="">
                <input type="text" name="keyword" placeholder="Cari berdasarkan nama siswa...">
                <button type="submit">
                    <i class='bx bx-search-alt-2'></i>
                </button>
            </form>
        </div>
    </div>
    <div class="tableProfile" style="overflow-x: auto;">
        <table>
            <tr>
                <th>Nama Siswa</th>
                <th>Alamat Orang Tua</th>
                <th>Pekerjaan Orang Tua</th>
                <th>Pendidikan Orang Tua</th>
                <th>Pendapatan Orang Tua</th>
                <th>Nomor Handphone Orang Tua</th>
                <th>Pihak yang Membiayai Sekolah</th>
                <th>Riwayat Penyakit</th>
                <th>Riwayat Pendidikan</th>
                <th>Nomor Handphone Siswa</th>
                <th>Alamat / Tempat Tinggal</th>
                <th>Teman Terdekat / Sahabat</th>
                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                <th>Aksi</th>
            </tr>
                <?php
                $servername = "localhost"; 
                $username = "root"; 
                $password = "htmlyu"; 
                $dbname = "data_siswa";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $nama_siswa = isset($_GET['nama_siswa']) ? $_GET['nama_siswa'] : '';

                $sql = "SELECT * FROM siswa WHERE nama_siswa LIKE '%$nama_siswa%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo"<tr>";
                    echo "<td>" . $row["nama_siswa"] . "</td>";
                    echo "<td>" . $row["alamat_orangtua"] . "</td>";
                    echo "<td>" . $row["pekerjaan_orangtua"] . "</td>";
                    echo "<td>" . $row["pendidikan_orangtua"] . "</td>";
                    echo "<td>" . $row["pendapatan_orangtua"] . "</td>";
                    echo "<td>" . $row["nomor_hp_orangtua"] . "</td>";
                    echo "<td>" . $row["biaya_sekolah"] . "</td>";
                    echo "<td>" . $row["riwayat_penyakit"] . "</td>";
                    echo "<td>" . $row["riwayat_pendidikan"] . "</td>";
                    echo "<td>" . $row["nomor_hp_siswa"] . "</td>";
                    echo "<td>" . $row["tinggal_dengan"] . " - " . $row["jarak_rumah_ke_sekolah"] . " - " . $row["transportasi"] . "</td>";
                    echo "<td>" . $row["teman_terdekat"] . "</td>";
                 // Tambahkan kolom lainnya sesuai kebutuhan
                    echo "<td>";
                    echo "<form method='POST' action='../crud/edit/edit.php'>";
                    echo "<input type='hidden' name='siswa_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' class='edit-btn' name='edit'><i class='bx bx-edit' ></i></button>";
                    echo "</form>";
                    echo "<form method='POST' action='../crud/delete.php'>";
                    echo "<input type='hidden' name='siswa_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' class='delete-btn' name='delete' onclick='return confirmDelete()'><i class='bx bx-trash'></i></button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<div class='alertProfile'><tr><td colspan='13'>Data siswa tidak ditemukan.</td></tr></div>";
            }
            $conn->close();
        ?>

</body>
</html>